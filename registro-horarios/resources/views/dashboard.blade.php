<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administrador</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="container">
        <h2>Dashboard de Administrador</h2>
        
        <div class="user-info">
            <p>Bienvenido, {{ session('usuario_name') }}</p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id_user }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->id_role != 1) 
                                <form method="POST" action="{{ route('admin.user.status.update', $user->id_user) }}">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="1" {{ $user->status ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ !$user->status ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                </form>
                            @else
                               
                            @endif
                        </td>
                        <td>
                            @if ($user->id_role != 1) 
                                <form action="{{ route('admin.user.delete', $user->id_user) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            @else
                               
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
