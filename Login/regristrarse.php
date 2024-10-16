<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include("funciones.php");
  $cnn = Conectar();

  // Obtener datos del formulario
  $rut = mysqli_real_escape_string($cnn, $_POST['rut']);
  $nombre = mysqli_real_escape_string($cnn, $_POST['nombre']);
  $cargo = mysqli_real_escape_string($cnn, $_POST['cargo']);
  $tipo = mysqli_real_escape_string($cnn, $_POST['tipo']);
  $usua = mysqli_real_escape_string($cnn, $_POST['usua']);
  $pass = mysqli_real_escape_string($cnn, $_POST['pass']); // Esta contraseña debe ser hasheada antes de almacenarla en la base de datos
  // Insertar datos en la base de datos
  $sql = "INSERT INTO usuarios (rut, nombre, cargo, tipo, usua, pass) VALUES ('$rut', '$nombre', '$cargo', '$tipo', '$usua', '$pass')";
  
  if (mysqli_query($cnn, $sql)) {
    echo "<script>alert('Usuario registrado correctamente')</script>";
  } else {
    echo "<script>alert('Error al registrar el usuario: " . mysqli_error($cnn) . "')</script>";
  }
}
?>

<html>
<head>
  <title>Registro de Usuarios</title>
</head>
<body bgcolor="#99CC99">
  <form method="post">
    <br><br><br>
    <center><b><h1>REGISTRO DE USUARIOS</h1></center></b>
    <br><br>
    <table border="0" align="center">
      <tr>
        <td><b>RUT:</b></td>
        <td><input type="text" name="rut" value=""></td>
      </tr>
      <tr>
        <td><b>Nombre:</b></td>
        <td><input type="text" name="nombre" value=""></td>
      </tr>
      <tr>
        <td><b>Cargo:</b></td>
        <td><input type="text" name="cargo" value=""></td>
      </tr>
      <tr>
        <td><b>Tipo:</b></td>
        <td><input type="text" name="tipo" value=""></td>
      </tr>
      <tr>
        <td><b>Usuario:</b></td>
        <td><input type="text" name="usua" value=""></td>
      </tr>
      <tr>
        <td><b>Contraseña:</b></td>
        <td><input type="text" name="pass" value=""></td>
      </tr>
      <tr>
        <td><input type="submit" value="Registrar"></td>
      </tr>
    </table>
  </form>
</body>
</html>
