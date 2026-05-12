<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Laporan;
use App\Services\DiscordWebhookService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    protected $discordService;

    public function __construct(DiscordWebhookService $discordService)
    {
        $this->discordService = $discordService;
    }

    public function index()
    {
        return view('pages.lapor');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20',
            'email' => 'required|email',
            'kategori_laporan' => ['required', Rule::in(array_keys(Laporan::$kategoriLaporan))],
            'isi_laporan' => 'required|string|min:5',
            'bukti' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        // Handle file upload if exists
        if ($request->hasFile('bukti')) {
            $validated['bukti'] = $request->file('bukti')->store('laporan', 'public');
        }

        $laporan = Laporan::create($validated);

        // Send to Discord
        try {
            $messageId = $this->discordService->sendLaporanEmbed($laporan);
            if ($messageId) {
                $laporan->update(['discord_message_id' => $messageId]);
            }
        } catch (\Exception $e) {
            \Log::error('Discord webhook error: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil dikirim',
            'laporan_id' => $laporan->id,
        ]);
    }

    public function checkStatus($id)
    {
        $laporan = Laporan::findOrFail($id);

        return response()->json([
            'status' => $laporan->status,
            'status_label' => $laporan->status_label,
            'catatan_admin' => $laporan->catatan_admin,
            'noted_at' => $laporan->noted_at?->format('d M Y H:i'),
        ]);
    }
}
