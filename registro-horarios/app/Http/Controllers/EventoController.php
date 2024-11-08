<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        $name = Session::get('usuario_name', 'Usuario');
        $nombre = Session::get('institution_name', 'Institución');

        return view('eventos.index', compact('eventos', 'name', 'nombre'));
    }

    public function create()
    {
        $name = Session::get('usuario_name', 'Usuario');
        $nombre = Session::get('institution_name', 'Institución');

        return view('eventos.create', compact('name', 'nombre'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'regex:/^(?!.*[A-Z]{2,})(?=.*[a-zA-Z])[a-zA-Z0-9\s]*$/', // Validación para no estar completamente en mayúsculas y permitir letras y números
                'max:30'
            ],
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'dia' => 'required|in:lunes,martes,miércoles,jueves,viernes', // Acepta solo estos valores
            'salon' => 'required|string|max:30',
        ], [
            'dia.in' => 'El día debe ser lunes, martes, miércoles, jueves o viernes.',
        ]);

        // Crear el evento si pasa las validaciones
        Evento::create($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento registrado con éxito');
    }


    public function edit(Evento $evento)
    {
        $name = Session::get('usuario_name', 'Usuario');
        $nombre = Session::get('institution_name', 'Institución');

        return view('eventos.edit', compact('evento', 'name', 'nombre'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:50',
                'regex:/^(?![A-Z\s]*$)[a-zA-Z0-9\s]+$/',
            ],
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'dia' => 'required|in:lunes,martes,miércoles,jueves,viernes',
            'salon' => 'required|string|max:20',
        ]);

        $evento->update($request->all());

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento eliminado con éxito');
    }
}
