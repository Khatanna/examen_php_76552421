<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index() {
        $libros = Libro::query();

        if(request('autor') === "true") {
            $libros->with('autor');
        }

        if(\request('limit')) {
            return $libros->paginate(request('limit'));
        }

        return $libros->get();
    }

    public function show($id) {
        return Libro::find($id);
    }

    public function store(Request $request) {
        return Libro::create($request->all());
    }

    public function update(Request $request, $id) {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return $libro;
    }

    public function delete(Request $request, $id) {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return 204;
    }
}
