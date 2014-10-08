<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Clinica/img/logo.jpg">
<title>Registro Cliente</title>

<?php include("Estilos.php"); ?>
<?php include("Conexion.php"); ?>

<script type="text/javascript" src="/Clinica/js/jquery-1.7.2.js"></script>
<style type="text/css">
</style>
</head>
<body>
	<div id="wrapper">
      <?php include("MainNav.php"); ?>
      <div class="MainContent well Mensaje">
      <?php
        $con=Conectar();

        if($con){ 
          $Rut=$_POST['Rut'];
          $Nombre=$_POST['Nombre'];
          $Apellido= $_POST['Apellido'];
          $Contraseña=$_POST['Contraseña'];
          $Correo=$_POST['Correo'];
          $Telefono= $_POST['Telefono'];
          $FechaNac=$_POST['FechaNac'];
          $Direccion= $_POST['Direccion'];

          $consulta = "SELECT * FROM cliente WHERE '$Rut' = cli_rut";
          $resultado=pg_query($consulta);
          
          if(pg_num_rows($resultado) == 0){
            $consulta="INSERT INTO cliente(cli_rut,cli_nombre,cli_apellidos,cli_password,cli_correo,cli_telefono,cli_fecha_nac,cli_direccion,cli_estado) 
            VALUES('$Rut','$Nombre','$Apellido','$Contraseña','$Correo','$Telefono','$FechaNac','$Direccion',true)";
            $resultado = pg_query($consulta);
          ?>
            <div class="row">
              <div class="span12">
                <div class="alert alert-success">
                  <h4 class="alert-heading">Success</h4>
                  <p>Usuario Registrado Exitosamente.</p>
                </div>
              </div>
            </div>
          <?php
          }
          else{
          ?>
            <div class="row">
              <div class="span12">
                <div class="alert alert-error">
                  <h4 class="alert-heading">Error</h4>
                  <p>Rut de usuario ya Registrado en la BD.</p>
                </div>
              </div>
            </div>
          <?php
          }

          Desconectar($con);
          
        }
        else{
        ?>
          <div class="row">
            <div class="span12">
              <div class="alert alert-error">
                <h4 class="alert-heading">Error</h4>
                <p>No se pudo Conectar a la BD, Intentelo mas tarde.</p>
              </div>
            </div>
          </div>
        <?php
        }
      ?>
      <a class="btn btn-inverse" href="Registrarse.php">Atras</a>
    </div>
    <?php include("Footer.php"); ?>
  </div>
</body>