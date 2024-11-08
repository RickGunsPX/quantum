<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Proceso de edición de pisos existentes">
    <title>Editar piso</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Editar piso</h1>
            <div>
                <h1>Bienvenido: {{ $name }}</h1>
                <h2>Institución: {{ $nombre }}</h2>
            </div>
        </div>

        <form action="{{ route('pisos.update', $piso->id) }}" method="POST" class="form-group">
            @csrf
            @method('PUT')
            <label for="numero">Numero del piso:</label>
            <input type="int" name="numero" id="numero" class="form-control" value="{{ $piso->nombre }}" required>

            <label for="idEdificio">Edificio:</label>
            <select name="idEdificio" id="idEdificio" class="form-control" required>
                @foreach ($edificios as $edificio)
                    <option value="{{ $edificio->id }}" {{ $piso->idEdificio == $edificio->id ? 'selected' : '' }}>{{ $edificio->numero }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
        </form>

        <div class="mt-4">
            <a href="{{ route('pisos.index') }}" class="btn btn-secondary">Volver al listado de pisos</a>
        </div>
        <div class="mt-4">
            <a href="{{ url('main') }}" class="btn btn-info">Regresar al menú</a>
        </div>
    </div>
</body>
</html>
