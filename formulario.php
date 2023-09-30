<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            background-color: #f0f0f0; /* Fondo gris claro */
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #007bff; /* Texto azul */
        }

        form {
            background-color: #ffffff; /* Fondo blanco */
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 0 auto; /* Centrar en la pantalla */
        }

        label {
            display: block; /* Hacer que las etiquetas ocupen una línea completa */
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc; /* Borde gris claro */
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff; /* Fondo azul */
            color: #fff; /* Texto blanco */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        h2 {
            color: #007bff; /* Texto azul */
        }

        table {
            background-color: #ffffff; /* Fondo blanco */
            border-collapse: collapse;
            margin: 20px auto; /* Centrar en la pantalla */
        }

        table, th, td {
            border: 1px solid #ccc; /* Borde gris claro */
        }

        th, td {
            padding: 10px;
        }

        th {
            background-color: #007bff; /* Fondo azul */
            color: #fff; /* Texto blanco */
        }

        .success-message {
            color: #28a745; /* Texto verde */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="registro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Registrar Usuario">
    </form>

    <h2>Lista de Usuarios</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nombre de usuario</th>
            <th>E-mail</th>
            <th>Acciones</th>
        </tr>

        <?php
        include("lista_usuarios.php");

        // Verificar si se ha registrado un usuario exitosamente
        if (isset($_GET["registro_exitoso"]) && $_GET["registro_exitoso"] === "true") {
            echo '<tr><td colspan="6" class="success-message">Registro exitoso.</td></tr>';
        }

        // Verificar si se ha eliminado un usuario exitosamente
        if (isset($_GET["eliminacion_exitosa"]) && $_GET["eliminacion_exitosa"] === "true") {
            echo '<tr><td colspan="6" class="success-message">Eliminación exitosa.</td></tr>';
        }
        ?>
    </table>
</body>
</html>
