<?php
session_start();

// Verifica si el usuario no ha iniciado sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: login.php');
    exit();
}

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cerrar_sesion'])) {
    // Destruye la sesión y redirige al inicio de sesión
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>

<body>
    <h2>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?>!</h2>
    <form method="post" action="">
        <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>
    <!-- Tu contenido aquí -->
    <div style="padding: 16px;">
        <h2>Bienvenido a tu banca online de confianza </h2>
        <p>Contenido de la página...</p>
    </div>
</body>

</html>
