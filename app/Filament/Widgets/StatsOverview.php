<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use App\Models\Member;
use App\Models\Laporan;
use App\Models\VisitorLog;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', Berita::count())
                ->description('Berita yang telah diposting')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
            Stat::make('Anggota BEM', Member::count())
                ->description('Total pengurus aktif')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
            Stat::make('Laporan Pending', Laporan::where('status', 'pending')->count())
                ->description('Aspirasi masuk belum diproses')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),
            Stat::make('Pengunjung Hari Ini', VisitorLog::whereDate('created_at', today())->count())
                ->description('Total views hari ini')
                ->descriptionIcon('heroicon-m-eye')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
        ];
    }
}
