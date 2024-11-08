<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Envío</title>
    <link href="{{ asset('css/confirmation.css') }}" rel="stylesheet"> 
</head>
<body>
    <div class="confirmation-container">
        <h2>Tus datos han sido enviados correctamente</h2>
        <h4>Institución: {{ $nameI }}</h4>
        <p>Espera una confirmación.</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
