<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-newspaper';
    protected static \UnitEnum|string|null $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'News';
    protected static ?string $modelLabel = 'News Article';
    protected static ?string $pluralModelLabel = 'News';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (callable $set, $state) {
                        $set('slug', Str::slug((string) $state));
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Textarea::make('excerpt')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('category')
                    ->label('Category')
                    ->maxLength(255),
                TextInput::make('tags')
                    ->label('Tags')
                    ->placeholder('comma,separated,tags')
                    ->helperText('Enter tags separated by commas'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('news-content')
                    ->fileAttachmentsVisibility('public')
                    ->floatingToolbars([
                        'table' => [
                            'tableAddColumnBefore', 'tableAddColumnAfter', 'tableDeleteColumn',
                            'tableAddRowBefore', 'tableAddRowAfter', 'tableDeleteRow',
                            'tableMergeCells', 'tableSplitCell',
                            'tableToggleHeaderRow',
                            'tableDelete',
                        ],
                    ]),
                FileUpload::make('image_path')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->directory('news')
                    ->disk('public')
                    ->imageEditor()
                    ->nullable(),
                DateTimePicker::make('published_at')
                    ->label('Publish at')
                    ->seconds(false)
                    ->nullable(),
                Toggle::make('is_published')
                    ->label('Published'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Image')
                    ->disk('public')
                    ->square()
                    ->stacked()
                    ->limit(3),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->url(fn (News $record): string => static::getUrl('edit', ['record' => $record])),
                TextColumn::make('slug')
                    ->copyable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('category')
                    ->label('Category')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Published'),
                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Status'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('published')
                    ->label('Published')
                    ->query(fn ($query) => $query->where('is_published', true)),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ReplicateAction::make()
                    ->excludeAttributes(['slug'])
                    ->beforeReplicaSaved(function (News $replica) {
                        $replica->slug = Str::slug($replica->title.'-'.Str::random(6));
                        $replica->is_published = false;
                        $replica->published_at = null;
                    }),
                Action::make('toggleStatus')
                    ->label(fn (News $record) => $record->is_published ? 'Unpublish' : 'Publish')
                    ->color(fn (News $record) => $record->is_published ? 'warning' : 'success')
                    ->icon(fn (News $record) => $record->is_published ? 'heroicon-o-x-mark' : 'heroicon-o-check')
                    ->requiresConfirmation()
                    ->action(function (News $record) {
                        $record->is_published = ! $record->is_published;
                        if ($record->is_published && ! $record->published_at) {
                            $record->published_at = now();
                        }
                        if (! $record->is_published) {
                            $record->published_at = null;
                        }
                        $record->save();
                    }),
            ])
            ->groupedBulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) News::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'primary';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}