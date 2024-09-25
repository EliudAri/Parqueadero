<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .container {
            text-align: center;
        }
        nav a {
            margin: 0 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido</h1>
        <nav>
            <!-- Ruta para registrar propietarios -->
            <a href="{{ route('propietarios.registrar') }}" class="btn btn-primary">Crear Propietario</a>

            <!-- Ruta para consultar propietarios -->
            <a href="{{ route('propietarios.consultar') }}" class="btn btn-success">Consultar Propietarios</a>

            <!-- Ruta para editar un propietario (ID 1 es solo un ejemplo) -->
            <a href="{{ route('propietarios.editar', 1) }}" class="btn btn-warning">Editar Propietario</a>

            <!-- Ruta para ver detalles de un propietario (ID 1 es solo un ejemplo) -->
            <a href="{{ route('propietarios.show', 1) }}" class="btn btn-info">Ver Propietario</a>
        </nav>
    </div>
</body>
</html>
