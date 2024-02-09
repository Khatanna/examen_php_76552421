<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use DateTime;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    public function index()
    {
        $query = Prestamos::query();

        $query->with('libro');
        $query->with('cliente');

        if(request('late')) {
            $query->where(function ($query) {
                $query->where(function ($subquery) {
                    $subquery->whereIn('estado', ['En Prestamo'])
                        ->orWhereNull('estado');
                })->whereRaw('fecha_prestamo + INTERVAL dias_prestamo DAY < NOW()');
            });
        }

        if(request('segmentedByDateAndWeek')) {
            $query->selectRaw('
            YEAR(fecha_prestamo) as year,
            MONTH(fecha_prestamo) as month,
            WEEK(fecha_prestamo) as week,
            count(*) as count
            ');
            $query->groupBy('year', 'month', 'week');
        }

        if(request('limit')) {
            return $query->paginate(request('limit'));
        }

        return $query->get();
    }

    public function store(Request $request) {
        $prestamo = Prestamos::create($request->all());
        return $prestamo;
    }

    public function devolucion(Request $request, $id) {
        $prestamo = Prestamos::findOrFail($id);
        $prestamo->estado = 'Devuelto';
        $prestamo->save();
        return $prestamo;
    }
}
