<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Administrador</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    <div class="register-container">
        <h2>Registro de Administrador para la Institución</h2>
        
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_institution" value="{{ $id_institution }}"> 

            <label for="name">Nombre de Usuario:</label>
            <input type="text" id="name" name="name" required>

            <label for="firstNameMale">Apellido Paterno:</label> 
            <input type="text" id="firstNameMale" name="firstNameMale" required>

            <label for="firstNameFemale">Apellido Materno:</label> 
            <input type="text" id="firstNameFemale" name="firstNameFemale" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Registrar Administrador</button>
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
