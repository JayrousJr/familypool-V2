<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\JobApplicants;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JobApplicantsResource\Pages;
use App\Filament\Resources\JobApplicantsResource\RelationManagers;

class JobApplicantsResource extends Resource
{
    protected static ?string $model = JobApplicants::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'System';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->readonly()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->readonly()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nationality')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('street')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('zip')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('age')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('birthdate')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('socialsecurity')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('socialsecurityNumber')
                    ->maxLength(255)
                    ->readonly()
                    ->default('NULL'),
                Forms\Components\TextInput::make('einNumber')
                    ->maxLength(255)
                    ->readonly()
                    ->default('NULL'),
                Forms\Components\TextInput::make('days')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('starttime')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('endtime')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('startdate')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('workperiod')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('workHours')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('smoke')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('licence')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('licenceNumber')
                    ->maxLength(255)
                    ->readonly()
                    ->default('NULL'),
                Forms\Components\TextInput::make('issueddate')
                    ->maxLength(255)
                    ->readonly()
                    ->default('NULL'),
                Forms\Components\TextInput::make('expiredate')
                    ->maxLength(255)
                    ->readonly()
                    ->default('NULL'),
                Forms\Components\TextInput::make('issuedcity')
                    ->maxLength(255)
                    ->readonly()
                    ->default('NULL'),
                Forms\Components\TextInput::make('transport')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\Toggle::make('hire')
                    ->required()
                    ->live()
                    ->label('Hire As Technician')
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set(Auth::user()->team_member, $state)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\IconColumn::make('hire')
                    ->label('Is Hired')
                    ->boolean(),
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
                Filter::make('hire')
                    ->label('Hired')
                    ->query(fn (Builder $query): Builder => $query->where('hire', true)),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobApplicants::route('/'),
            'create' => Pages\CreateJobApplicants::route('/create'),
            'view' => Pages\ViewJobApplicants::route('/{record}'),
            'edit' => Pages\EditJobApplicants::route('/{record}/edit'),
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
