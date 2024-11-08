<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum Innovators - Sistema de Gestión de Horarios</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

    <header class="header">
        <h1>Quantum Innovators</h1>
        <h2>Soluciones tecnológicas para la gestión académica</h2>
        
        
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="btn-register">Registrarse</a>
        </div>
    </header>

    <section class="generalidades">
        <h2>Generalidades</h2>
        <p>
            "Quantum Innovators" es una empresa dedicada al desarrollo de soluciones tecnológicas avanzadas para la gestión académica...
        </p>
    </section>

    <section class="mision">
        <h2>Misión</h2>
        <p>
            Desarrollar herramientas tecnológicas innovadoras que permitan una gestión eficiente y precisa de los recursos académicos...
        </p>
    </section>

    <section class="vision">
        <h2>Visión</h2>
        <p>
            Aspiramos a ser la solución definitiva para la gestión inteligente de espacios académicos, transformando la forma en que se accede...
        </p>
    </section>

    <footer class="footer">
        <p>Contacto: info@quantuminnovators.com | &copy; 2024 Quantum Innovators</p>
    </footer>

</body>
</html>
