<?php

namespace App\Filament\Widgets;

use App\Models\VisitorLog;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VisitorChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pengunjung (7 Hari Terakhir)';
    protected static string $color = 'info';

    protected function getData(): array
    {
        $data = VisitorLog::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pengunjung',
                    'data' => $data->pluck('count')->toArray(),
                    'fill' => 'start',
                ],
            ],
            'labels' => $data->map(fn ($item) => Carbon::parse($item->date)->format('d M'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
