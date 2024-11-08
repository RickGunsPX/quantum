<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EdificioController extends Controller
{
    public function index()
    {
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $name = Session::get('usuario_name', 'Usuario no autenticado');
        $edificios = Edificio::all();

        return view('edificios.index', compact('edificios', 'institutionName', 'name'));
    }

    public function create()
    {
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $name = Session::get('usuario_name', 'Usuario no autenticado');

        return view('edificios.create', compact('institutionName', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Edificio::create(['nombre' => $request->nombre]);

        return redirect()->route('edificios.index')->with('success', 'Edificio registrado correctamente');
    }

    public function edit($id)
    {
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $name = Session::get('usuario_name', 'Usuario no autenticado');
        $edificio = Edificio::findOrFail($id);

        return view('edificios.edit', compact('edificio', 'institutionName', 'name'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $edificio = Edificio::findOrFail($id);
        $edificio->nombre = $request->nombre;
        $edificio->save();

        return redirect()->route('edificios.index')->with('success', 'Edificio actualizado correctamente');
    }

    public function destroy($id)
    {
        $edificio = Edificio::findOrFail($id);
        $edificio->delete();

        return redirect()->route('edificios.index')->with('success', 'Edificio eliminado correctamente');
    }
}
