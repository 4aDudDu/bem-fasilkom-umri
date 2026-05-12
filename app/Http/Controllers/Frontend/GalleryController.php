<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::published()->ordered();

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $galeri = $query->paginate(24);
        $categories = Category::active()->get();

        return view('pages.gallery', [
            'galeri' => $galeri,
            'categories' => $categories,
            'selectedCategory' => $request->category,
        ]);
    }

    public function show($slug)
    {
        $gallery = Gallery::where('slug', $slug)->published()->firstOrFail();

        return view('pages.detail-gallery', [
            'gallery' => $gallery,
        ]);
    }

    public function masonry(Request $request)
    {
        $query = Gallery::published()->ordered();

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $galeri = $query->get(['id', 'title', 'image', 'slug']);

        return response()->json($galeri);
    }
}
