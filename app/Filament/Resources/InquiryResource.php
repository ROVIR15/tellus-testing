<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InquiryResource\Pages;
use App\Jobs\SendInquiryEmail;
use App\Models\Inquiry;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables; 
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-envelope';
    protected static \UnitEnum|string|null $navigationGroup = 'Operations';
    protected static ?string $navigationLabel = 'Inquiries';
    protected static ?string $modelLabel = 'Inquiry';
    protected static ?string $pluralModelLabel = 'Inquiries';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Contact')
                    ->schema([
                        TextInput::make('first_name')->required()->maxLength(120),
                        TextInput::make('last_name')->maxLength(120),
                        TextInput::make('email')->email()->required()->maxLength(180),
                        TextInput::make('phone_country_code')->maxLength(8),
                        TextInput::make('phone_number')->maxLength(60),
                    ])->columns(2),
                Section::make('Company')
                    ->schema([
                        TextInput::make('company_name')->required()->maxLength(180),
                        TextInput::make('company_country')->required()->maxLength(120),
                        TextInput::make('company_city')->required()->maxLength(120),
                        TextInput::make('company_address')->required()->maxLength(255),
                        TextInput::make('zip')->required()->maxLength(30),
                    ])->columns(2),
                Section::make('Message')
                    ->schema([
                        Textarea::make('message')->rows(6)->required()->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')->label('First')->searchable()->sortable(),
                TextColumn::make('last_name')->label('Last')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('company_name')->searchable()->sortable(),
                TextColumn::make('company_city')->label('City')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('company_country')->label('Country')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone_number')->label('Phone')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('message')->limit(40),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->recordActions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
                Actions\Action::make('sendEmail')
                    ->label('Send Email')
                    ->icon('heroicon-o-paper-airplane')
                    ->visible(fn (Inquiry $record) => (bool) env('CONTACT_EMAIL_ENABLED', false))
                    ->action(function (Inquiry $record) {
                        dispatch(new SendInquiryEmail($record->id));
                    }),
            ])
            ->headerActions([
                Actions\Action::make('exportAllCsv')
                    ->label('Export All CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function () {
                        $response = new StreamedResponse(function () {
                            $out = fopen('php://output', 'w');
                            fputcsv($out, [
                                'id','created_at','first_name','last_name','email','phone_country_code','phone_number','company_name','company_country','company_city','company_address','zip','message','ip_address','user_agent'
                            ]);
                            Inquiry::orderByDesc('created_at')->chunk(500, function (Collection $chunk) use ($out) {
                                foreach ($chunk as $r) {
                                    fputcsv($out, [
                                        $r->id,
                                        optional($r->created_at)->toDateTimeString(),
                                        $r->first_name,
                                        $r->last_name,
                                        $r->email,
                                        $r->phone_country_code,
                                        $r->phone_number,
                                        $r->company_name,
                                        $r->company_country,
                                        $r->company_city,
                                        $r->company_address,
                                        $r->zip,
                                        str_replace(["\r","\n"], ' ', $r->message ?? ''),
                                        $r->ip_address,
                                        $r->user_agent,
                                    ]);
                                }
                            });
                            fclose($out);
                        });
                        $response->headers->set('Content-Type', 'text/csv');
                        $response->headers->set('Content-Disposition', 'attachment; filename="inquiries.csv"');
                        return $response;
                    }),
            ])
            ->groupedBulkActions([
                Actions\DeleteBulkAction::make(),
                Actions\BulkAction::make('exportSelectedCsv')
                    ->label('Export Selected CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (Collection $records) {
                        $response = new StreamedResponse(function () use ($records) {
                            $out = fopen('php://output', 'w');
                            fputcsv($out, [
                                'id','created_at','first_name','last_name','email','phone_country_code','phone_number','company_name','company_country','company_city','company_address','zip','message','ip_address','user_agent'
                            ]);
                            foreach ($records as $r) {
                                fputcsv($out, [
                                    $r->id,
                                    optional($r->created_at)->toDateTimeString(),
                                    $r->first_name,
                                    $r->last_name,
                                    $r->email,
                                    $r->phone_country_code,
                                    $r->phone_number,
                                    $r->company_name,
                                    $r->company_country,
                                    $r->company_city,
                                    $r->company_address,
                                    $r->zip,
                                    str_replace(["\r","\n"], ' ', $r->message ?? ''),
                                    $r->ip_address,
                                    $r->user_agent,
                                ]);
                            }
                            fclose($out);
                        });
                        $response->headers->set('Content-Type', 'text/csv');
                        $response->headers->set('Content-Disposition', 'attachment; filename="inquiries-selected.csv"');
                        return $response;
                    }),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Inquiry::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'primary';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInquiries::route('/'),
            'create' => Pages\CreateInquiry::route('/create'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
        ];
    }
}
