<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendar()
    {
        $events = array();
        $calendarios = Calendario::all();
        foreach ($calendarios as $calendario) {
            $color = null;
            if ($calendario->title == 'foco') {
                $color = '#EAABF1';
            }
            $events[] = [
                'id' => $calendario->id,
                'title' => $calendario->title,
                'start' => $calendario->start_date,
                'end' => $calendario->end_date,
                'color' => $color
            ];
        }
        return view('agenda.calendar.index', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d H:i',
            'end_date' => 'required|date_format:Y-m-d H:i'
        ]);

        $calendario = Calendario::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($calendario);
        return redirect('calendario');
    }

    public function update(Request $request, $id)
    {
        $calendario = Calendario::find($id);
        if (! $calendario) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }

        $request->validate([
            'start_date' => 'required|date_format:Y-m-d H:i',
            'end_date' => 'required|date_format:Y-m-d H:i'
        ]);

        $calendario->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json('Evento Modificado');
    }

    public function destroy($id)
    {
        $calendario = Calendario::find($id);
        if (! $calendario) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $calendario->delete();
        return $id;
    }
}
