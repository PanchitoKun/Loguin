<?php 
  include("funciones.php");
  $cnn = Conectar();
  session_start();

  // Verificar si se envió el formulario para cambiar la contraseña
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnChangePassword'])) {
      $targetUser = $_POST['usua'];
      $newPassword = $_POST['newPassword'];

      // Verificar si el usuario existe en la base de datos
      $sql = "SELECT * FROM usuarios WHERE usua='$targetUser'";
      $result = $cnn->query($sql);

      if ($result->num_rows == 1) {
          // Usuario encontrado, actualizar la contraseña en la base de datos
          $updateSql = "UPDATE login SET pass='$newPassword' WHERE usua='$targetUser'";
          if ($cnn->query($updateSql) === TRUE) {
              echo "<script>alert('Contraseña actualizada con éxito para el usuario $targetUser');</script>";
          } else {
              echo "<script>alert('Error al actualizar la contraseña para el usuario $targetUser: " . $cnn->error . "');</script>";
          }
      } else {
          echo "<script>alert('Usuario $targetUser no encontrado');</script>";
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Contraseña</title>
</head>
<body>
    <h2>Cambiar Contraseña</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Usuario: <input type="text" name="usua" required><br>
        Nueva Contraseña: <input type="password" name="newPassword" required><br>
        <input type="submit" name="btnChangePassword" value="Cambiar Contraseña">
    </form>
</body>
</html>
