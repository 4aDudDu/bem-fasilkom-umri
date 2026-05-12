<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Division;
use App\Models\Member;
use App\Models\AngkatanBem;
use App\Http\Controllers\Controller;

class StrukturController extends Controller
{
    public function index()
    {
        $activeAngkatan = AngkatanBem::where('is_active', true)->first();

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
