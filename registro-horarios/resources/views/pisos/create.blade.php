<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Proceso de registro de nuevos pisos">
    <title>Registrar piso</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Registrar nuevo piso</h1>
            <div>
                <h1>Bienvenido: {{ $name }}</h1>
                <h2>Institución: {{ $nombre }}</h2>
            </div>
        </div>

        <form action="{{ route('pisos.store') }}" method="POST" class="form-group">
            @csrf
            <label for="numero">Numero del piso :</label>
            <input type="text" name="numero" id="numero" class="form-control" required>

            <label for="idEdificio">Edificio:</label>
            <select name="idEdificio" id="idEdificio" class="form-control" required>
                @foreach ($edificios as $edificio)
                    <option value="{{ $edificio->id }}">{{ $edificio->nombre }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary mt-3">Registrar piso</button>
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
