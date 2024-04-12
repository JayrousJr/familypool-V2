<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Client;
use Filament\Forms\Set;
use App\Mail\ClientMail;
use Filament\Forms\Form;
use App\Models\FormPrint;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\ClientCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Blade;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ClientResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Filament\Resources\ClientResource\RelationManagers\MessagesRelationManager;
use App\Filament\Resources\ClientResource\RelationManagers\RequestsRelationManager;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'System';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Client Name')
                    ->required()
                    ->live()
                    ->searchable()
                    ->preload()
                    ->options(function () {
                        // Retrieve a list of users who are not in the clients table
                        return DB::table('users')
                            ->leftJoin('clients', 'users.id', '=', 'clients.user_id')
                            ->whereNull('clients.user_id')
                            ->select('users.id', 'users.name')
                            ->where('team_member', 0)
                            ->get()
                            ->pluck('name', 'id');
                    })
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        if (blank($state)) return;
                        $data = User::find($state);
                        // $set(Auth::user()->team_member, '1');
                        $set('email', $data->email);
                        $set('name', $data->name);
                        $set('id', $data->id);
                        $set('nationality', $data->nationality);
                        $set('city', $data->city);
                        $set('state', $data->state);
                        $set('street', $data->street);
                        $set('phone', $data->phone);
                        $set('active', '1');
                        $set('user_id', $data->id);
                    }),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Hidden::make('active')
                    ->required(),
                Forms\Components\Select::make('category')
                    ->options(ClientCategory::all()->pluck('category', 'category'))
                    ->preload()
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->readonly()
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
                    ->readonly()
                    ->tel()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->label('Client')
                    ->boolean(),
                Tables\Columns\TextColumn::make('street')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
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
                SelectFilter::make('category')
                    ->searchable()
                    ->options(ClientCategory::all()->pluck('category', 'category'))
            ])

            ->actions([
                Tables\Actions\Action::make('pdf')
                    ->label('Print')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Client $record) => route('pdf', $record)),

                // Tables\Actions\Action::make('email')
                //     ->icon('heroicon-o-envelope')
                //     ->form([
                //         TextInput::make('subject')->required(),
                //         RichEditor::make('body')->required(),
                //     ])
                //     ->action(function (array $data) {
                //         Mail::to('admin@familypoolserviceonline.com')
                //             ->send(new ClientMail(
                //                 body: $data['body'],
                //                 subject: $data['subject'],
                //             ));
                //     }),

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
            RequestsRelationManager::class, MessagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'view' => Pages\ViewClient::route('/{record}'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    // public function print()
    // {
    //     return Action::make('Print')
    //         ->child(
    //             Button::make('Print Report')
    //                 ->url(Url('/path'))
    //                 ->icon()
    //         );
    // }
}
