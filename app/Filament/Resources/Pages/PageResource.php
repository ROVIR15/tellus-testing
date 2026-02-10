<?php

namespace App\Filament\Resources\Pages;

use App\Filament\Resources\Pages\Pages\CreatePage;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Filament\Resources\Pages\Pages\ListPages;
use App\Models\Page;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Page Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),

                // Home Page Content
                Group::make()
                    ->schema([
                        Section::make('Home Page Assets')
                            ->description('Manage images and content for the Home page')
                            ->schema([
                                // Hero Section
                                Section::make('Hero Section')
                                    ->schema([
                                        FileUpload::make('content.hero_bg')
                                            ->label('Hero Background/Vector')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home'),
                                        FileUpload::make('content.hero_main_image')
                                            ->label('Hero Main Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home'),
                                    ])->collapsed(),

                                // Inside Lab Section
                                Section::make('Inside The Lab')
                                    ->schema([
                                        FileUpload::make('content.inside_lab_bg')
                                            ->label('Background Decoration')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home'),
                                        Repeater::make('content.inside_lab_carousel')
                                            ->label('Carousel Items')
                                            ->schema([
                                                TextInput::make('title'),
                                                FileUpload::make('image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('pages/home/lab'),
                                                Textarea::make('description'),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                    ])->collapsed(),

                                // Lab Services
                                Section::make('Lab Services')
                                    ->schema([
                                        Repeater::make('content.lab_services')
                                            ->label('Service Cards')
                                            ->schema([
                                                TextInput::make('title'),
                                                FileUpload::make('image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('pages/home/services'),
                                                Textarea::make('description'),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                    ])->collapsed(),

                                // Who We Serve
                                Section::make('Who We Serve')
                                    ->schema([
                                        // Specific fields for known cards could be better, but Repeater is more flexible if number changes.
                                        // However, the design is a specific grid.
                                        // Let's stick to a key-value approach for specific named cards if they are fixed, or just a repeater if we want flexibility.
                                        // The user asked to "manage this", implying changing images.
                                        // Let's use specific fields for the fixed layout to keep it simple for now, or just generic "Decorations".
                                        
                                        FileUpload::make('content.who_we_serve.card_1')
                                            ->label('Infrastructure Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home/serve'),
                                        FileUpload::make('content.who_we_serve.card_2')
                                            ->label('Government Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home/serve'),
                                        FileUpload::make('content.who_we_serve.card_3')
                                            ->label('Construction Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home/serve'),
                                        FileUpload::make('content.who_we_serve.highlight_image')
                                            ->label('Highlight Section Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home/serve'),
                                    ])->collapsed(),

                                // Decorations
                                Section::make('General Decorations')
                                    ->schema([
                                        FileUpload::make('content.vector_3')
                                            ->label('Vector 3 (Right Top)')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home'),
                                        FileUpload::make('content.elipse_6')
                                            ->label('Elipse 6 (Bottom)')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home'),
                                        FileUpload::make('content.bg_fqa_eclipse')
                                            ->label('FQA Eclipse (Bottom Mobile)')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home'),
                                        FileUpload::make('content.inquiry_image')
                                            ->label('Inquiry Section Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/home'),
                                    ])->collapsed(),
                            ]),
                    ])
                    ->visible(fn ($get) => $get('slug') === 'home'),

                // About Us Page Content
                Group::make()
                    ->schema([
                        Section::make('About Us Page Assets')
                            ->description('Manage images and content for the About Us page')
                            ->schema([
                                // Top Section
                                Section::make('Top Section')
                                    ->schema([
                                        FileUpload::make('content.top_section_bg_left')
                                            ->label('Top Left Decoration')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/about'),
                                        FileUpload::make('content.top_section_bg_right')
                                            ->label('Top Right Decoration')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/about'),
                                        FileUpload::make('content.about_main_image')
                                            ->label('About Us Main Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/about'),
                                        TextInput::make('content.about_title')
                                            ->label('About Title')
                                            ->default('About Us'),
                                        Textarea::make('content.about_description')
                                            ->label('About Description')
                                            ->rows(3),
                                    ])->collapsed(),

                                // Team Section
                                Section::make('Team Section')
                                    ->schema([
                                        FileUpload::make('content.team_image')
                                            ->label('Team Photo')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/about'),
                                        TextInput::make('content.team_title')
                                            ->label('Team Section Title'),
                                        Textarea::make('content.team_description')
                                            ->label('Team Section Description')
                                            ->rows(4),
                                    ])->collapsed(),

                                // Why Choose Us
                                Section::make('Why Choose Us')
                                    ->schema([
                                        FileUpload::make('content.why_choose_bg')
                                            ->label('Background Decoration')
                                            ->image()
                                            ->disk('public')
                                            ->directory('pages/about'),
                                        Repeater::make('content.why_choose_us')
                                            ->label('Cards')
                                            ->schema([
                                                TextInput::make('title')->required(),
                                                FileUpload::make('decoratiove_url')
                                                    ->label('Card Image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('pages/about/why-choose'),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                    ])->collapsed(),

                                // Quality Policy
                                Section::make('Quality Policy')
                                    ->schema([
                                        Repeater::make('content.quality_cards')
                                            ->label('Quality Cards')
                                            ->schema([
                                                TextInput::make('label')->required(),
                                                FileUpload::make('icon')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('pages/about/quality'),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => Str::limit($state['label'] ?? '', 20)),
                                    ])->collapsed(),

                                // Accreditation
                                Section::make('Accreditation')
                                    ->schema([
                                        Repeater::make('content.accreditations')
                                            ->label('Accreditation Cards')
                                            ->schema([
                                                TextInput::make('title')->required(),
                                                TextInput::make('description'),
                                                FileUpload::make('url')
                                                    ->label('Icon/Image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('pages/about/accreditation'),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                    ])->collapsed(),
                            ]),
                    ])
                    ->visible(fn ($get) => $get('slug') === 'about-us'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('slug')->searchable()->sortable(),
                TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
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
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
}
