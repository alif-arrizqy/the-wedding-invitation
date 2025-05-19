<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Filament\Resources\GuestResource\RelationManagers;
use App\Models\Guest;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
use Filament\Notifications\Notification;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Data Brides';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    BelongsToSelect::make('wedding_id')->label('Wedding')->relationship('wedding', 'name'),
                    TextInput::make('name')->required(),
                    Select::make('isVIP')
                        ->options([
                            1 => 'VIP',
                            0 => 'Non-VIP',
                        ])
                        ->required(),
                    Select::make('jenis_tamu')
                        ->options([
                            'Calon Pengantin Pria' => 'Calon Pengantin Pria',
                            'Calon Pengantin Wanita' => 'Calon Pengantin Wanita',
                            'Keluarga CPP' => 'Keluarga Calon Pengantin Pria',
                            'Keluarga CPW' => 'Keluarga Calon Pengantin Wanita',
                        ])
                        ->required()
                        ->label('Jenis Tamu'),
                    Select::make('is_sent')
                        ->options([
                            1 => 'Terkirim',
                            0 => 'Belum Terkirim',
                        ])
                        ->default(0)
                        ->required()
                        ->label('Status Pengiriman'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('isVIP')
                    ->formatStateUsing(fn (string $state): string => $state ? 'VIP' : 'Non-VIP'),
                TextColumn::make('jenis_tamu')
                    ->label('Jenis Tamu')
                    ->formatStateUsing(function (string $state): string {
                        return match($state) {
                            'Calon Pengantin Pria' => 'Calon Pengantin Pria',
                            'Calon Pengantin Wanita' => 'Calon Pengantin Wanita',
                            'Keluarga CPP' => 'Keluarga Calon Pengantin Pria',
                            'Keluarga CPW' => 'Keluarga Calon Pengantin Wanita',
                            default => $state
                        };
                    }),
                TextColumn::make('is_sent')
                    ->label('Status Pengiriman')
                    ->formatStateUsing(fn (string $state): string => $state ? 'Terkirim' : 'Belum Terkirim')
                    ->badge()
                    ->color(fn (string $state): string => $state ? 'success' : 'danger'),
                TextColumn::make('url')
                    ->label('Invitation URL')
                    ->copyable()
                    ->limit(30),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('isVIP')
                    ->options([
                        '1' => 'VIP',
                        '0' => 'Non-VIP',
                    ])
                    ->label('Guest Status'),
                Tables\Filters\SelectFilter::make('jenis_tamu')
                    ->options([
                        'Calon Pengantin Pria' => 'Calon Pengantin Pria',
                        'Calon Pengantin Wanita' => 'Calon Pengantin Wanita',
                        'Keluarga CPP' => 'Keluarga Calon Pengantin Pria',
                        'Keluarga CPW' => 'Keluarga Calon Pengantin Wanita',
                    ])
                    ->label('Jenis Tamu'),
                Tables\Filters\SelectFilter::make('is_sent')
                    ->options([
                        '1' => 'Terkirim',
                        '0' => 'Belum Terkirim',
                    ])
                    ->label('Status Pengiriman'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('sendWhatsapp')
                    ->label('Send WhatsApp')
                    ->icon('heroicon-o-chat-bubble-left')
                    ->color('success')
                    ->url(function (Guest $record): string {
                        // Template pesan undangan
                        $message = "Assalamualaikum Wr. Wb.\n";
                        $message .= "Kepada Yth.\n";
                        $message .= "Bapak/Ibu/Saudara/i\n";
                        $message .= "*{$record->name}*\n";
                        $message .= "di tempat\n\n";
                        $message .= "Bismillahirrahmanirrahim.\n";
                        $message .= "Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami.\n\n";
                        $message .= "📅 Minggu, 1 Juni 2025\n";
                        $message .= "🕒 Pukul 10:00 WIB\n";
                        $message .= "🏠 Alamat: Kediaman Mempelai Wanita (Perum Griya Pratama Mas, Blok B4/ No. 2, Desa Cikarageman, Kecamatan Setu, Bekasi)\n\n";
                        $message .= "Silakan kunjungi link undangan digital kami:\n{$record->url}\n\n";
                        $message .= "Kehadiran Bapak/Ibu/Saudara/i sangat berarti bagi kami.\n\n";
                        $message .= "Atas perhatiannya kami ucapkan terima kasih.\n";
                        $message .= "Wassalamualaikum Wr. Wb.\n\n";
                        $message .= "Kami yang berbahagia,\n";
                        $message .= "*Alif & Pika*\n";

                        // Generate WhatsApp URL dengan pesan terenkode
                        $encodedMessage = urlencode($message);
                        return "https://api.whatsapp.com/send?text={$encodedMessage}";
                    })
                    ->openUrlInNewTab(),
                Action::make('viewMessage')
                    ->label('View Message')
                    ->icon('heroicon-o-clipboard-document')
                    ->url(function (Guest $record): string {
                        return route('guest.view-message', $record);
                    })
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('bulkSendWhatsApp')
                        ->label('Bulk Send WhatsApp')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->action(function (Collection $records) {
                            // Redirect ke halaman broadcast WhatsApp dengan parameter ID
                            $ids = $records->pluck('id')->join(',');
                            redirect()->route('guest.bulk-send', ['ids' => $ids]);
                        }),
                    Tables\Actions\BulkAction::make('updateSentStatus')
                        ->label('Update Status Pengiriman')
                        ->icon('heroicon-o-envelope')
                        ->form([
                            Select::make('is_sent')
                                ->label('Status Pengiriman')
                                ->options([
                                    1 => 'Terkirim',
                                    0 => 'Belum Terkirim',
                                ])
                                ->required()
                        ])
                        ->action(function (Collection $records, array $data): void {
                            $records->each(function ($record) use ($data) {
                                $record->update([
                                    'is_sent' => $data['is_sent'],
                                ]);
                            });

                            $statusText = $data['is_sent'] ? 'Terkirim' : 'Belum Terkirim';
                            $count = $records->count();

                            Notification::make()
                                ->title("Status pengiriman {$count} tamu telah diperbarui menjadi '{$statusText}'")
                                ->success()
                                ->send();
                        })
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
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }
}
