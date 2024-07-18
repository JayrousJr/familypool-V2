<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssignedTasksResource\Pages;
use App\Filament\Resources\AssignedTasksResource\RelationManagers;
use App\Models\AssignedTasks;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Guid\Fields;
use Illuminate\Support\Str;

class AssignedTasksResource extends Resource
{
    protected static ?string $model = AssignedTasks::class;
    protected static ?string $navigationIcon = 'heroicon-s-scissors';
    protected static ?string $navigationGroup = 'Services & Tasks';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make("Customer Details")
                    ->schema([
                        Grid::make("Client")
                            ->columns(1)
                            ->schema([
                                Forms\Components\Select::make('task_id')
                                    ->label("Task Selcection")
                                    ->searchable()
                                    ->live()
                                    ->options(function () {
                                        return DB::table("tasks")
                                            ->leftJoin("assigned_tasks", "tasks.id", "=", "assigned_tasks.task_id")
                                            ->select('tasks.id', DB::raw("CONCAT('Task ID',' - ',tasks.id) AS displayName"))
                                            ->whereNull('assigned_tasks.task_id')
                                            ->where('tasks.user_id', auth()->user()->id)
                                            // ->where('tasks.comments', "Overdue")
                                            ->pluck('displayName', 'id');
                                    })
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $task = Task::find($state);
                                        if ($task) {
                                            $service = $task->serviceTask()->first();
                                            if ($service) {
                                                $set('name', $service->name);
                                                $set('email', $service->email);
                                                $set('zip', $service->zip);
                                                $set('phone', $service->phone);
                                            }
                                        }
                                    })
                                    ->required(),
                            ]),
                        Grid::make()
                            ->columns([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->schema([
                                TextInput::make("name")
                                    ->label("Clients Name")
                                    ->readOnly(),
                                TextInput::make("email")
                                    ->label("Clients Email")
                                    ->readOnly(),
                                TextInput::make("phone")
                                    ->label("Clients Phone")
                                    ->readOnly(),
                                TextInput::make("zip")
                                    ->label("Clients Zip Code")
                                    ->readOnly(),
                            ])

                    ]),
                Fieldset::make("On Site Details")
                    ->schema([
                        Forms\Components\RichEditor::make('feedback')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image_before')
                            ->image()
                            ->imageResizeMode('cover')
                            ->getUploadedFileNameForStorageUsing(function (callable $get): string {
                                $name = $get('name');
                                $fileName = Str::random(9);
                                return (string) str('image_before/before_' . $name . '_' . $fileName . '_' . ' .webp');
                            })->label('Image Before Service')
                            ->required(),
                        Forms\Components\FileUpload::make('image_after')
                            ->image()
                            ->imageResizeMode('cover')
                            ->getUploadedFileNameForStorageUsing(function (callable $get): string {
                                $name = $get('name');
                                $fileName = Str::random(9);
                                return (string) str('image_aftre/after_' . $name . '_' . $fileName . '_' . ' .webp');
                            })->label('Image After Service')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('task_id')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_before'),
                Tables\Columns\ImageColumn::make('image_after'),
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
            'index' => Pages\ListAssignedTasks::route('/'),
            'create' => Pages\CreateAssignedTasks::route('/create'),
            'view' => Pages\ViewAssignedTasks::route('/{record}'),
            'edit' => Pages\EditAssignedTasks::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
