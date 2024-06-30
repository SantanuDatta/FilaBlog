<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\AvatarProviders\UiAvatarsProvider;
use App\Filament\Admin\Resources\UserResource\Pages;
use App\Rules\UniqueUsername;

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
                                                ->rule(new UniqueUsername()),
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
                                                ->password()
                                                ->revealable()
                                                ->required(),
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
                    ->dateTime()
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
