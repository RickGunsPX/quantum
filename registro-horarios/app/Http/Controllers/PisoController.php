<?php

namespace App\Http\Controllers;

use App\Models\Piso;
use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PisoController extends Controller
{
    public function index()
    {
        $name = Session::get('usuario_name', 'Usuario no autenticado');
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $pisos = Piso::with('edificio')->get();

        return view('pisos.index', compact('pisos', 'name', 'institutionName'));
    }

    public function create()
    {
        $name = Session::get('usuario_name', 'Usuario no autenticado');
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $edificios = Edificio::all();

        return view('pisos.create', compact('edificios', 'name', 'institutionName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'idEdificio' => 'required|exists:edificios,id',
        ]);

        Piso::create($request->all());

        return redirect()->route('pisos.index')->with('success', 'Piso registrado correctamente');
    }

    public function edit(Piso $piso)
    {
        $name = Session::get('usuario_name', 'Usuario no autenticado');
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $edificios = Edificio::all();

        return view('pisos.edit', compact('piso', 'edificios', 'name', 'institutionName'));
    }

    public function update(Request $request, Piso $piso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'idEdificio' => 'required|exists:edificios,id',
        ]);

        $piso->update($request->all());

        return redirect()->route('pisos.index')->with('success', 'Piso actualizado correctamente');
    }

    public function destroy($id)
    {
        $piso = Piso::findOrFail($id);
        $piso->delete();

        return redirect()->route('pisos.index')->with('success', 'Piso eliminado correctamente');
    }
}
