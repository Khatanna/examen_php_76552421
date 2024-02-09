<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Prestamos;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::query();

        if(request('prestamos')) {
            $clientes->with('prestamos')->paginate(10);
        }

        if(request('limit')) {
            return $clientes->paginate(request('limit'));
        }

        return $clientes->get();
    }

    public function show($id) {
        return Cliente::find($id);
    }

    public function store(Request $request) {
        return Cliente::create($request->all());
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return $cliente;
    }

    public function delete(Request $request, $id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return 204;
    }

    public function prestamos_vencidos() {
        $query = Cliente::query();
        if(request('late')) {
            $query->whereHas('prestamos', function ($query) {
                $query->where('estado', 'En Prestamo')
                    ->whereRaw('fecha_prestamo + INTERVAL dias_prestamo DAY < NOW()');
            });
      }

        return $query->get();
    }
}
