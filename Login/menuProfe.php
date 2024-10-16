<?php
session_start();

// Verificar si el usuario tiene una sesión activa
if (!isset($_SESSION['rut'])) {
    // Redirigir al usuario al index.php si no tiene una sesión activa
    header("Location: index.php");
    exit();
}

// Verificar si se ha hecho clic en el botón de cerrar sesión
if (isset($_POST['btnCerrarSesion'])) {
    // Destruir todas las variables de sesión
    session_unset();
    session_destroy();

    // Redirigir al usuario al index.php y mostrar una alerta
    echo "<script>alert('La sesión se ha cerrado correctamente'); window.location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menú Jefe</title>
    <!-- Resto del código para el head si es necesario -->
</head>
<body bgcolor="BBFFAA">
    <form id="form1" name="form1" method="post" action="">
        <p align="center"><b>MENU Jefe</b></p>
        <!-- Agrega aquí el contenido de tu menú para el Jefe -->
        <input type="text" name="txt1" value="<?php echo $_SESSION['rut']; ?>">
        <input type="text" name="txt2" value="<?php echo $_SESSION['car']; ?>"><br>
        <input type="text" name="txt3" value="<?php echo $_SESSION['tipo']; ?>"><br>

        <!-- Botón para cerrar sesión -->
        <input type="submit" name="btnCerrarSesion" value="Cerrar Sesión">
    </form>
</body>
</html>
