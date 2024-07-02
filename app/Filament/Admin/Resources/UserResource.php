<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Models\User;
use Filament\AvatarProviders\UiAvatarsProvider;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Group::make()
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Group::make()->schema([
                                            Forms\Components\TextInput::make('first_name')
                                                ->maxLength(255)
                                                ->required()
                                                ->lazy(),
                                            Forms\Components\TextInput::make('last_name')
                                                ->maxLength(255)
                                                ->required()
                                                ->lazy(),
                                            Forms\Components\TextInput::make('username')
                                                ->maxLength(255)
                                                ->required()
                                                ->unique(ignoreRecord: true),
                                        ])->columns(3),
                                        Group::make()->schema([
                                            Forms\Components\TextInput::make('email')
                                                ->email()
                                                ->required(),
                                            Forms\Components\Select::make('role_id')
                                                ->relationship('role', 'name')
                                                ->native(false)
                                                ->required(),
                                            Forms\Components\TextInput::make('password')
                                                ->label('New Password')
                                                ->password()
                                                ->same('passwordConfirmation')
                                                ->revealable()
                                                ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                                                ->dehydrated(fn (?string $state): bool => filled($state))
                                                ->required(fn (string $operation): bool => $operation === 'create'),
                                            Forms\Components\TextInput::make('passwordConfirmation')
                                                ->revealable()
                                                ->password()
                                                ->dehydrated(false)
                                                ->required(fn (string $operation): bool => $operation === 'create'),
                                        ])->columns(2),
                                    ]),
                            ])->columnSpan(['sm' => 2, 'md' => 2, 'xxl' => 5]),
                        Group::make()
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Forms\Components\FileUpload::make('avatar_url')
                                            ->label('')
                                            ->avatar()
                                            ->extraAttributes(['style' => 'display: flex; justify-content: center;']),
                                        Forms\Components\Placeholder::make('last_login')
                                            ->label('')
                                            ->content(function ($record) {
                                                return isset($record->last_login) && $record->last_login
                                                    ? 'Last Logged In: ' . $record->last_login->diffForHumans()
                                                    : 'Last Logged In: N/A';
                                            }),
                                    ]),
                            ])->columnSpan(['sm' => 2, 'md' => 1, 'xxl' => 1]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Avatar')
                    ->circular()
                    ->searchable()
                    ->defaultImageUrl(fn ($record) => $record->avatar_url
                        ?: (new UiAvatarsProvider())->get($record)),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(['first_name', 'last_name']),
                Tables\Columns\TextColumn::make('role.name')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('last_login')
                    ->since()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
