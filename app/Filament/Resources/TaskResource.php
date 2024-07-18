<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\ServiceRequest;
use App\Models\Task;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class TaskResource extends Resource
{
    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->isManager()) {

            return static::getModel()::count();
        }
        return null;
    }
    protected static ?string $model = Task::class;
    protected static ?string $navigationIcon = 'heroicon-s-cog';
    protected static ?string $navigationGroup = 'Services & Tasks';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make("Task Details")
                    ->schema([
                        Forms\Components\Select::make('service_request_id')
                            ->required()
                            ->label("Service Requests")
                            ->options(
                                function () {
                                    return DB::table('service_requests')
                                        ->leftJoin('tasks', 'service_requests.id', "=", "tasks.service_request_id")
                                        ->select('service_requests.id', DB::raw("CONCAT(service_requests.name) AS display"))
                                        ->whereNull("tasks.service_request_id")
                                        ->get()
                                        ->pluck('display', 'id');
                                }

                            )
                            ->searchable(),
                        Forms\Components\Select::make('user_id')
                            ->options(User::pluck("name", "id"))
                            ->searchable()
                            ->required(),

                    ]),
                Fieldset::make("Performance Details")
                    ->schema([

                        Forms\Components\Toggle::make('status')
                            ->label("Completed")
                            ->disabled(),
                        Forms\Components\TextInput::make('comments')
                            ->maxLength(255)
                            ->readOnly()
                            ->default('Not Performed'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('userTask.name')
                    ->label("Technician Name")
                    ->searchable(),
                Tables\Columns\TextColumn::make('serviceTask.name')
                    ->label("Client Name")
                    ->searchable(),
                Tables\Columns\TextColumn::make('serviceTask.zip')
                    ->label("Zip Address")
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('comments')
                    ->color(function ($state) {
                        if ($state === "Not Performed")
                            return "orange";
                        if ($state === "Overdue")
                            return "red";
                        else
                            return "green";
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort("created_at", "desc")
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'view' => Pages\ViewTask::route('/{record}'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query =  parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

        $user = auth()->user();

        if ($user->isManager()) {
            return $query;
        } else
            $data = $query->where("user_id", $user->id);
        // dd($data);
        return $data;
    }
}
