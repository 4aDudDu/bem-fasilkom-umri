<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Berita;
use App\Models\Category;
use App\Models\AngkatanBem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::published()->with(['author', 'category']);
        
        // Filter kategori
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }

        // Filter angkatan
        if ($request->has('angkatan') && $request->angkatan) {
            $query->where('angkatan_bem_id', $request->angkatan);
        }

        $berita = $query->orderBy('published_at', 'desc')->paginate(12);
        
        $categories = Category::active()->get();
        $angkatanBems = AngkatanBem::all();

        return view('pages.berita', [
            'berita' => $berita,
            'categories' => $categories,
            'angkatanBems' => $angkatanBems,
            'selectedCategory' => $request->category,
        ]);
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->published()->firstOrFail();
        
        // Increment views
        $berita->increment('views');

        $relatedBerita = $berita->getRelatedBerita();

        return view('pages.detail-berita', [
            'berita' => $berita,
            'relatedBerita' => $relatedBerita,
        ]);
    }

    public function search(Request $request)
    {
        if (!$request->q) {
            return response()->json([]);
        }

        $hasil = Berita::published()
            ->search($request->q)
            ->select('id', 'title', 'slug', 'thumbnail', 'description')
            ->limit(5)
            ->get();

        return response()->json($hasil);
    }

    public function incrementView($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->increment('views');
        
        return response()->json(['views' => $berita->views]);
    }
}
