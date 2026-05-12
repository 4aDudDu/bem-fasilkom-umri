<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Division;
use App\Models\Member;
use App\Models\AngkatanBem;
use App\Http\Controllers\Controller;

class StrukturController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $tahun = $request->query('tahun');
        
        if ($tahun) {
            $activeAngkatan = AngkatanBem::where('tahun', $tahun)->first();
        } else {
            $activeAngkatan = AngkatanBem::where('is_active', true)->first();
        }
        
        // If still no active angkatan, get the latest one
        if (!$activeAngkatan) {
            $activeAngkatan = AngkatanBem::orderBy('tahun', 'desc')->first();
        }

        $allAngkatan = AngkatanBem::orderBy('tahun', 'desc')->get();

        $ksb = Member::ksb()
            ->where('angkatan_bem_id', $activeAngkatan?->id)
            ->ordered()
            ->get();

        $divisi = Division::where('angkatan_bem_id', $activeAngkatan?->id)
            ->ordered()
            ->with(['members' => function ($query) {
                $query->ordered();
            }])
            ->get();

        return view('pages.struktur', [
            'ksb' => $ksb,
            'divisi' => $divisi,
            'activeAngkatan' => $activeAngkatan,
            'allAngkatan' => $allAngkatan,
        ]);
    }

    public function showDivision($slug)
    {
        $division = Division::where('slug', $slug)->firstOrFail();
        $members = Member::where('division_id', $division->id)
            ->ordered()
            ->get();

        return view('pages.detail-division', [
            'division' => $division,
            'members' => $members,
        ]);
    }
}
