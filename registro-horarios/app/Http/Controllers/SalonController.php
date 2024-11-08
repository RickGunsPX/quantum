<?php

namespace App\Http\Controllers;

use App\Models\Piso;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SalonController extends Controller
{
    public function index()
    {
        $name = Session::get('usuario_name', 'Usuario no autenticado');
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $salones = Salon::with('piso')->get();

        return view('salones.index', compact('salones', 'name', 'institutionName'));
    }

    public function create()
    {
        $name = Session::get('usuario_name', 'Usuario no autenticado');
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $pisos = Piso::all();

        return view('salones.create', compact('pisos', 'name', 'institutionName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'idPiso' => 'required|exists:pisos,id',
            'periodo' => 'required|string|max:255',
        ]);

        Salon::create($request->all());
        return redirect()->route('salones.index')->with('success', 'Salón registrado correctamente');
    }

    public function edit($id)
    {
        $name = Session::get('usuario_name', 'Usuario no autenticado');
        $institutionName = Session::get('institution_name', 'Institución no especificada');
        $salon = Salon::findOrFail($id);
        $pisos = Piso::all();

        return view('salones.edit', compact('salon', 'pisos', 'name', 'institutionName'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'idPiso' => 'required|exists:pisos,id',
            'edificio' => 'required|string|max:255',
        ]);

        $salon = Salon::findOrFail($id);
        $salon->update($request->all());

        return redirect()->route('salones.index')->with('success', 'Salón actualizado correctamente');
    }

    public function destroy($id)
    {
        $salon = Salon::findOrFail($id);
        $salon->delete();

        return redirect()->route('salones.index')->with('success', 'Salón eliminado correctamente');
    }
}
