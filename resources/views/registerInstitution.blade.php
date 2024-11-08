<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Institución</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    <div class="register-container">
        <h2>Registro de Institución</h2>
        <!-- Mostrar mensaje de error si la institución ya existe -->
        @if ($errors->has('institucion'))
            <div class="error-message">
                {{ $errors->first('institucion') }}
            </div>
        @endif
        <form action="{{ route('institution.store') }}" method="POST">
            @csrf
            <label for="institucion">Nombre de la Institución:</label>
            <input type="text" id="institucion" name="institucion" required>
            <button type="submit">Continuar al Pago</button>
        </form>

        <div class="login-link">
            <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
        
        <div class="privacy-policy">
            <h3>Aviso de Privacidad</h3>
            <p>
                Al registrarte, aceptas nuestros <a href="{{ route('privacy.policy') }}">términos de servicio</a> y <a href="{{ route('privacy.policy') }}">avisos de privacidad</a>.
            </p>
        </div>
    </div>
</body>
</html>
