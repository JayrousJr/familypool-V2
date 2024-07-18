<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ServiceRequest;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceRequestResource\Pages;
use App\Filament\Resources\ServiceRequestResource\RelationManagers;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Validation\Rules\Unique;

class ServiceRequestResource extends Resource
{
    protected static ?string $model = ServiceRequest::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Services & Tasks';
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make("Customer Information")
                    ->schema([
                        Select::make('name')
                            ->label('Client Name')
                            ->options(Client::where('active', 1)
                                ->pluck('name', 'name'))
                            ->preload()
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (empty($state))
                                    return $state;
                                $user = Client::where("name", $state)->first();
                                $set("email", $user->email);
                                $set("zip", $user->zip);
                                $set("phone", $user->phone);
                            })

                            ->required(),
                        TextInput::make('email')
                            ->email()
                            ->label('Client Email'),
                        TextInput::make('zip')
                            ->required()
                            ->label("Zip Code"),
                        TextInput::make('phone'),
                        RichEditor::make('service')
                            ->required()
                            ->maxLength(250),
                        RichEditor::make('description')
                            ->required()
                            ->maxLength(1500),
                    ]),
                // Fieldset::make('Technician Details')
                //     ->schema([
                //         Select::make("user_id")
                //             ->required()
                //             ->options(User::where("role", "Technician")->pluck("name", "id"))
                //             ->searchable()
                //             ->helperText("Select the technician to assign this job")
                //             ->label("Technician")
                //             ->afterStateUpdated(function ($state, callable $set) {
                //                 if (empty($state))
                //                     return $state;
                //                 $user = Client::where("name", $state)->first();
                //                 $set("assigned", 1);
                //             })
                //     ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                IconColumn::make('assigned')
                    ->boolean(),
                TextColumn::make('service')
                    ->html()
                    ->searchable(),
                TextColumn::make('zip')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->dateTime('D M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime('D M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('D M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('pdfGen')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(fn (ServiceRequest $record) => route('pdfGen', $record)),

                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),

                ])
                    ->size(ActionSize::Medium)
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->tooltip('Actions')

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
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
            'index' => Pages\ListServiceRequests::route('/'),
            'create' => Pages\CreateServiceRequest::route('/create'),
            'view' => Pages\ViewServiceRequest::route('/{record}'),
            'edit' => Pages\EditServiceRequest::route('/{record}/edit'),
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
