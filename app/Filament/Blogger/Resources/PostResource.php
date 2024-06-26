<?php

namespace App\Filament\Blogger\Resources;

use App\Enums\PostStatus;
use App\Filament\Blogger\Resources\PostResource\Pages;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Actions::make([
                    Action::make('fillForm')
                        ->icon('heroicon-o-sparkles')
                        ->color('success')
                        ->outlined()
                        ->action(function ($livewire) {
                            $user = User::whereRelation('role', 'name', 'blogger')->first();
                            $tags = Tag::inRandomOrder()->take(3)->pluck('id')->toArray();
                            $post = Post::factory()->recycle($user)->make()->toArray();
                            $livewire->form->fill(array_merge($post, [
                                'tags' => $tags,
                            ]));
                        })
                        ->visible(fn () => config('app.env') !== 'production'),
                ])->visibleOn('create'),
                Grid::make(3)
                    ->schema([
                        Group::make()
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->lazy()
                                            ->unique(Post::class, 'title', ignoreRecord: true)
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                $set('slug', str($state)->slug());
                                            }),
                                        TextInput::make('slug')
                                            ->disabled()
                                            ->dehydrated()
                                            ->required()
                                            ->unique(Post::class, 'slug', ignoreRecord: true),
                                        MarkdownEditor::make('content')
                                            ->required()
                                            ->fileAttachmentsDisk('public')
                                            ->fileAttachmentsDirectory('post_content')
                                            ->columnSpanFull(),
                                    ])->columns(2),
                            ])->columnSpan(['sm' => 2, 'md' => 2, 'xxl' => 5]),
                        Group::make()
                            ->schema([
                                Section::make()
                                    ->schema([
                                        FileUpload::make('cover')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('posts')
                                            ->deleteUploadedFileUsing(function ($file) {
                                                Storage::disk('public')->delete($file);
                                            }),
                                        Toggle::make('featured')
                                            ->required(),
                                        Select::make('tags')
                                            ->label('Tags')
                                            ->multiple()
                                            ->relationship('tags', 'name')
                                            ->preload()
                                            ->searchable(),
                                        Select::make('status')
                                            ->options([
                                                'In Process' => [
                                                    'draft' => PostStatus::Draft->getLabel(),
                                                    'reviewing' => PostStatus::Reviewing->getLabel(),
                                                ],
                                                'Reviewed' => [
                                                    'published' => PostStatus::Published->getLabel(),
                                                    'rejected' => PostStatus::Rejected->getLabel(),
                                                ],
                                            ])
                                            ->native(false)
                                            ->required(),
                                        Hidden::make('user_id')
                                            ->default(auth()->id()),
                                    ]),
                            ])->columnSpan(['sm' => 2, 'md' => 1, 'xxl' => 1]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author')
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                        ->before(function (Post $record) {
                            Storage::disk('public')->delete($record->cover);
                        }),
                ]),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->isBlogger()) {
            return Post::where('user_id', auth()->id());
        }

        return parent::getEloquentQuery();
    }
}
