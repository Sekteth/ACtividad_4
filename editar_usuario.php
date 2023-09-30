<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Editar Usuario</h1>

    <?php
    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            header("Location: lista_usuarios.php");
            exit;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardar"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];

        $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', usuario='$usuario', email='$email' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: formulario.php?edicion_exitosa=true");
            exit;
        } else {
            echo "Error al actualizar el usuario: " . $conn->error;
        }
    }
    ?>

    <?php
    if (isset($row)) { // Verifica si $row está definida
    ?>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $row["apellido"]; ?>" required><br>

        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo $row["usuario"]; ?>" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>" required><br>

        <input type="submit" name="guardar" value="Guardar Cambios">
    </form>
    <a href="formulario.php">Volver al registro</a>
    <?php
    } else {
        echo "<p>No se encontró el usuario.</p>";
    }
    ?>
</body>
</html>
