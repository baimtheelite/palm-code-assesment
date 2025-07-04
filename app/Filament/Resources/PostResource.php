<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use TomatoPHP\FilamentMediaManager\Form\MediaManagerInput;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function getNavigationLabel(): string
    {
        return __('posts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('title'))
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', \Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                Forms\Components\Textarea::make('excerpt')
                    ->label(__('excerpt'))
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('content')
                    ->label(__('content'))
                    ->required()
                    ->columnSpanFull(),
                // Forms\Components\FileUpload::make('image')
                //     ->image()
                //     ->directory('posts'),
                MediaManagerInput::make('image')
                ->label(__('image'))
                ->disk('public')
                ->schema([
                    // Forms\Components\TextInput::make('title')
                    //     ->required()
                    //     ->maxLength(255),
                    Forms\Components\TextInput::make('description')
                        ->label(__('description'))
                        // ->required()
                        ->maxLength(255),
                ]),
                Forms\Components\Select::make('status')
                    ->label(__('status'))
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published'
                    ])
                    ->default('draft')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label(__('published_at'))
                    ->default(now())
                    ->required(),
                Forms\Components\Select::make('categories')
                    ->label(__('categories'))
                    ->relationship('categories', 'name')
                    ->preload()
                    ->multiple(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label(__('published_at'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label(__('deleted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                // Tables\Actions\ForceDeleteAction::make(),
                // Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ManagePosts::route('/'),
            // 'index' => Pages\ListPosts::route('/'),
            // 'create' => Pages\CreatePost::route('/create'),
            // 'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
