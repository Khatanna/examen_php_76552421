<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index() {
    $autores = Autor::query();
    if (request('limit')) {
        return $autores->paginate(request('limit'));
    }

    return $autores->paginate(10);
}

    public function show($id) {
        return Autor::find($id);
    }

    public function store(Request $request) {
        return Autor::create($request->all());
    }

    public function update(Request $request, $id) {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return $autor;
    }

    public function delete(Request $request, $id) {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return 204;
    }
}
