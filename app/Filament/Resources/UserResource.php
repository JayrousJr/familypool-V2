<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Role;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\UserResource\RelationManagers\RequestRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\MessagesRelationManager;

class UserResource extends Resource
{
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'System';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->readOnly()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->readOnly()
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->maxLength(255),
                Forms\Components\TextInput::make('nationality')
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('street')
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->readOnly()
                    ->tel()
                    ->maxLength(255),


                // Forms\Components\Textarea::make('two_factor_secret')
                //     ->maxLength(65535)
                //     ->columnSpanFull(),
                // Forms\Components\Textarea::make('two_factor_recovery_codes')
                //     ->maxLength(65535)
                //     ->columnSpanFull(),
                // Forms\Components\DateTimePicker::make('two_factor_confirmed_at'),
                // Forms\Components\TextInput::make('current_team_id')
                //     ->numeric(),


                Select::make('roles')
                    ->required()
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->reactive(),
                // Select::make('permissions')
                //     // ->required()
                //     ->multiple()
                //     ->relationship('permissions', 'name')
                //     ->preload(),
                Select::make('role')
                    ->searchable()
                    ->required()
                    ->helperText('This is the Role of a person in the system')
                    ->options(Role::all()->pluck('name', 'name'))
                    ->label('Role In the System'),
                Forms\Components\Toggle::make('team_member')
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        if (blank($state)) return;
                        $set('role', 'Technician');
                    })
                    ->required(),
                FileUpload::make('profile_photo_path')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('500')
                    ->imageResizeTargetHeight('500')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $fileName = $file->hashName();
                        $name = explode('.', $fileName);
                        return (string) str('profile-photos/' . $name[0] . '.png');
                    })->label('Profile Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_photo_path')
                    ->label('Image')
                    ->circular()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Position')
                    ->searchable(),
                Tables\Columns\IconColumn::make('team_member')
                    ->label('Administrative Member')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('two_factor_confirmed_at')
                //     ->dateTime()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('current_team_id')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('D M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('D M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime('D M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                    ->size(ActionSize::Small)
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
            MessagesRelationManager::class,
            RequestRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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
