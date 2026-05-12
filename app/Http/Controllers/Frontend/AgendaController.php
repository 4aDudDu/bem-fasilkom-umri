<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'upcoming'); // upcoming, past, all

        $query = Agenda::published();

        if ($filter === 'upcoming') {
            $query->upcoming();
        } elseif ($filter === 'past') {
            $query->past();
        } else {
            $query->orderBy('waktu_mulai', 'desc');
        }

        $agenda = $query->paginate(12);

        $upcomingCount = Agenda::published()->upcoming()->count();
        $pastCount = Agenda::published()->past()->count();

        return view('pages.agenda', [
            'agenda' => $agenda,
            'filter' => $filter,
            'upcomingCount' => $upcomingCount,
            'pastCount' => $pastCount,
        ]);
    }

    public function show($slug)
    {
        $agenda = Agenda::where('slug', $slug)->published()->firstOrFail();

        return view('pages.detail-agenda', [
            'agenda' => $agenda,
        ]);
    }
}
