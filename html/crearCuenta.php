<?php
// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $host = 'localhost';
    $dbname = 'ilerbank';
    $username = 'root';
    $password = '';
    $port = 3306;

    $conn = new mysqli($host, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Escapar las entradas del formulario para evitar inyecciones SQL
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $codigo_postal = $_POST['codigo_postal'];
    $ciudad = $_POST['ciudad'];
    $provincia = $_POST['provincia'];
    $contrasena = $_POST['contrasena']; // No se utiliza hash aquí

    // Consulta preparada para insertar el nuevo usuario
    $insertQuery = "INSERT INTO usuarios (dni, nombre_usuario, apellido, email, fecha_nacimiento, direccion, codigo_postal, ciudad, provincia, contrasena) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertQuery);

    // Verifica si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Enlazar parámetros
        $stmt->bind_param('ssssssssss', $dni, $nombre, $apellido, $email, $fecha_nacimiento, $direccion, $codigo_postal, $ciudad, $provincia, $contrasena);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Registro exitoso, redirigir a la página de inicio de sesión
            header('Location: login.php');
            exit();
        } else {
            // Error al registrar
            $error_message = "Error al registrar. Por favor, inténtelo de nuevo.";
        }

        // Cierra la declaración preparada
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        $error_message = "Error al preparar la consulta. Por favor, inténtelo de nuevo.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <h2>Registro</h2>
    <?php if (isset($error_message)) : ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br>

        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" required><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required><br>

        <label for="provincia">Provincia:</label>
        <input type="text" id="provincia" name="provincia" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>

        <input type="submit" value="Registrar">
    </form>
    <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
</body>

</html>
