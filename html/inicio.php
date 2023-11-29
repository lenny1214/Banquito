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
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
  <h2>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?>!</h2>
    <form method="post" action="">
        <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>
    <!-- Tu contenido aquí -->
    <div style="padding: 16px;">
        <h2>Bienvenido a tu banca online de confianza </h2>
        <p>Contenido de la página...</p>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>

</body>

</html>
