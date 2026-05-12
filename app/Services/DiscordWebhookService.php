<?php

namespace App\Services;

use App\Models\Laporan;
use Illuminate\Support\Facades\Http;

class DiscordWebhookService
{
    protected $webhookUrl;

    public function __construct()
    {
        $this->webhookUrl = config('services.discord.webhook_url');
    }

    /**
     * Send laporan embed to Discord
     */
    public function sendLaporanEmbed(Laporan $laporan): ?string
    {
        if (!$this->webhookUrl) {
            return null;
        }

        $embed = [
            'title' => '📋 Laporan Baru Masuk',
            'description' => "ID Laporan: **#{$laporan->id}**",
            'color' => 0x0ea5e9, // Cyan Blue
            'fields' => [
                [
                    'name' => '👤 Nama Pelapor',
                    'value' => $laporan->nama,
                    'inline' => true,
                ],
                [
                    'name' => '🎓 NIM',
                    'value' => $laporan->nim ?? 'Tidak diisi',
                    'inline' => true,
                ],
                [
                    'name' => '📧 Email',
                    'value' => $laporan->email,
                    'inline' => true,
                ],
                [
                    'name' => '📁 Kategori',
                    'value' => Laporan::$kategoriLaporan[$laporan->kategori_laporan] ?? $laporan->kategori_laporan,
                    'inline' => true,
                ],
                [
                    'name' => '📝 Isi Laporan',
                    'value' => substr($laporan->isi_laporan, 0, 500) . (strlen($laporan->isi_laporan) > 500 ? '...' : ''),
                    'inline' => false,
                ],
                [
                    'name' => '📎 Bukti',
                    'value' => $laporan->bukti ? '✅ Ada file bukti' : '❌ Tidak ada bukti',
                    'inline' => true,
                ],
                [
                    'name' => '⏰ Waktu',
                    'value' => $laporan->created_at->format('d M Y H:i'),
                    'inline' => true,
                ],
            ],
            'footer' => [
                'text' => 'BEM Fasilkom UMRI | ' . now()->format('d M Y'),
            ],
            'timestamp' => $laporan->created_at->toIso8601String(),
        ];

        try {
            $response = Http::post($this->webhookUrl, [
                'username' => 'BEM Fasilkom Bot',
                'avatar_url' => 'https://via.placeholder.com/100?text=BEM',
                'embeds' => [$embed],
            ]);

            return $response->ok() ? 'sent' : null;
        } catch (\Exception $e) {
            \Log::error('Discord webhook error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Send statistics embed to Discord
     */
    public function sendStatisticsEmbed($data): ?string
    {
        if (!$this->webhookUrl) {
            return null;
        }

        $embed = [
            'title' => '📊 Statistik BEM Fasilkom',
            'color' => 0x0891b2,
            'fields' => [
                [
                    'name' => '📰 Total Berita',
                    'value' => (string)$data['totalBerita'],
                    'inline' => true,
                ],
                [
                    'name' => '🖼️ Total Galeri',
                    'value' => (string)$data['totalGaleri'],
                    'inline' => true,
                ],
                [
                    'name' => '👥 Total Anggota',
                    'value' => (string)$data['totalAnggota'],
                    'inline' => true,
                ],
                [
                    'name' => '📅 Total Agenda',
                    'value' => (string)$data['totalAgenda'],
                    'inline' => true,
                ],
            ],
            'timestamp' => now()->toIso8601String(),
        ];

        try {
            $response = Http::post($this->webhookUrl, [
                'username' => 'BEM Fasilkom Bot',
                'embeds' => [$embed],
            ]);

            return $response->ok() ? 'sent' : null;
        } catch (\Exception $e) {
            \Log::error('Discord webhook error: ' . $e->getMessage());
            return null;
        }
    }
}