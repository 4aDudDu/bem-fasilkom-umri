<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'kategori_laporan',
        'isi_laporan',
        'bukti',
        'status',
        'noted_at',
        'noted_by',
        'catatan_admin',
        'discord_message_id',
    ];

    protected $casts = [
        'noted_at' => 'datetime',
    ];

    /**
     * Status options
     */
    public const STATUS_PENDING = 'pending';
    public const STATUS_DIPROSES = 'diproses';
    public const STATUS_SELESAI = 'selesai';
    public const STATUS_DITOLAK = 'ditolak';

    public static array $statuses = [
        self::STATUS_PENDING => 'Menunggu',
        self::STATUS_DIPROSES => 'Diproses',
        self::STATUS_SELESAI => 'Selesai',
        self::STATUS_DITOLAK => 'Ditolak',
    ];

    /**
     * Kategori options
     */
    public static array $kategoriLaporan = [
        'akademik' => 'Akademik',
        'fasilitas' => 'Fasilitas',
        'organisasi' => 'Organisasi',
        'layanan' => 'Layanan',
        'lainnya' => 'Lainnya',
    ];

    /**
     * Get status label
     */
    public function getStatusLabelAttribute(): string
    {
        return self::$statuses[$this->status] ?? $this->status;
    }

    /**
     * Get kategori label
     */
    public function getKategoriLabelAttribute(): string
    {
        return self::$kategoriLaporan[$this->kategori_laporan] ?? $this->kategori_laporan;
    }

    /**
     * Scope: Get pending reports
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope: Get processed reports
     */
    public function scopeProcessed($query)
    {
        return $query->where('status', self::STATUS_DIPROSES);
    }

    /**
     * Scope: Get by kategori
     */
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori_laporan', $kategori);
    }
}
