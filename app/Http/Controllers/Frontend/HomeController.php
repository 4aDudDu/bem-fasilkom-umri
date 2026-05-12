<?php

namespace App\Http\Controllers\Frontend;

use App\Models\AngkatanBem;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Division;
use App\Models\Member;
use App\Models\HeroCarousel;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $activeAngkatan = AngkatanBem::where('is_active', true)->first();
        
        $data = [
            'heroCarousels' => HeroCarousel::where('is_active', true)
                ->where('angkatan_bem_id', $activeAngkatan?->id)
                ->ordered()
                ->get(),
            
            'beritaTerbaru' => Berita::published()
                ->with(['author', 'category'])
                ->orderBy('published_at', 'desc')
                ->limit(6)
                ->get(),
            
            'beritaTrending' => Berita::published()
                ->trending(7)
                ->limit(3)
                ->get(),
            
            'galeriTerbaru' => Gallery::published()
                ->ordered()
                ->limit(8)
                ->get(),
            
            'agendaMendatang' => Agenda::published()
                ->upcoming()
                ->limit(4)
                ->get(),
            
            'divisi' => Division::where('angkatan_bem_id', $activeAngkatan?->id)
                ->ordered()
                ->with('members')
                ->get(),
            
            'ksb' => Member::ksb()
                ->where('angkatan_bem_id', $activeAngkatan?->id)
                ->get(),
            
            'totalBerita' => Berita::published()->count(),
            'totalGaleri' => Gallery::published()->count(),
            'totalAnggota' => Member::where('angkatan_bem_id', $activeAngkatan?->id)->count(),
            'totalAgenda' => Agenda::published()->count(),
        ];

        return view('pages.home', $data);
    }
}
