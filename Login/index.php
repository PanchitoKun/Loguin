<?php 
  include("funciones.php");
  $cnn = Conectar();
  session_start();
?>
<html>
  <head>
    <title>Uso de Sesiones</title>
  </head>
  <body bgcolor="#99CC99">
    <form method="post">
      <?php error_reporting(0);?>
      <br><br><br>
      <center><b><h1>LOGIN DE USUARIOS</h1></center></b>
      <br><br>
      <table border="0" align="center">
        <tr>
          <td><b>Usuario:</b></td>
          <td><input type="text" name="txtUsuario"  value=""></td>
        </tr>
        <tr>
          <td><b>Clave:</b></td>
          <td><input type="text" name="txtClave" value=""></td>
        </tr>
        <tr>
          <td><input type="submit" name="btnAceptar" value="Ingresar"></td>
          <td>
            <tr>
            <a type="submit" href="regristrarse.php">regristrarse</a></a>
            <a type="submit" href="cambiaContraseña.php">cambiar contraseña</a></a>
            </tr>
          </td>
        </tr>
      </table>
      <?php
        if ($_POST['btnAceptar']=="Ingresar"){
          $usuario = $_POST['txtUsuario'];
          $clave = $_POST['txtClave'];
	        $sql = "select * from usuarios where USUA='$usuario' and PASS='$clave'";
	        $rs = mysqli_query($cnn,$sql);

          if(mysqli_num_rows($rs)!= 0){
            if ($row = mysqli_fetch_array($rs)){
              $_SESSION['rut'] = $row[0]; //rut
              $_SESSION['nom'] = $row[1]; //nombre
              $_SESSION['car'] = $row[2]; //cargos: Jefe Carrera / Profesor / Alumno
              $_SESSION['tipo'] = $row[3]; //tipos: 1 - 2 - 3 
                                      
              switch($_SESSION['tipo']){
                case 1:
                  echo "<script>alert('Usted es $_SESSION[nom] y tiene cargo $_SESSION[car]')</script>";
                  echo "<script type='text/javascript'>window.location='menuJefe.php'</script>";
                  break;
                case 2:
                  echo "<script>alert('Usted es $_SESSION[nom] y tiene cargo $_SESSION[car]')</script>";
                  echo "<script type='text/javascript'>window.location='menuProfe.php'</script>";
                  break;
                case 3:
                  echo "<script>alert('Usted es $_SESSION[nom] y tiene cargo $_SESSION[car]')</script>";
                  echo "<script type='text/javascript'>window.location='menuAlumno.php'</script>";
                  break;
                default:
                  echo"<script>alert('Usted NO es Usuario') </script>";
                  echo"<script type='text/javascript'>window.location='index.php'</script>";
                  break;
              }
            }
         }else{
          echo"<script>alert('Usuario o Clave Incorrecta') </script>";
         }
       }
      ?>
    </form>
  </body>
</html>
