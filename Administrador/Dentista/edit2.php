<?php
session_start();
if( !(isset($_SESSION['Rut'])) || $_SESSION['Tipo']!='Administrador' || $_SESSION['Estado']!='t')
	header("Location: /Clinica/index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Clinica/img/logo.jpg">
<title>Clinica</title>

<?php include("../../Estilos.php"); ?>

<script type="text/javascript" src="/Clinica/js/jquery-1.7.2.js"></script>
<style type="text/css">
</style>
</head>
<body>
  <div id="wrapper">
      <?php include("../../MainNav.php"); ?>
      <div class="MainContent well Mensaje">
      <?php
      	  $Rut=$_GET['Rut'];
      	  $Nombre=$_POST['Nombre'];
          $Apellido=$_POST['Apellido'];
          $Password= $_POST['Password'];
          if(isset($_POST['especialidades']))
          $Especialidades= $_POST['especialidades'];
      	  else
          $Especialidades= null;

          include("../../Conexion.php"); 

          $con=Conectar();

          if($con){ 
          	$consulta="UPDATE medico SET med_nombre='$Nombre',med_apellido='$Apellido',med_password='$Password' WHERE med_rut='$Rut'";
          	$res=pg_query($consulta);

          	$consulta2="DELETE FROM tiene WHERE med_rut='$Rut'";
          	$res2=pg_query($consulta2);

          	if($Especialidades!=null){
	          	foreach ($Especialidades as $value){
	              		$consulta3="INSERT INTO tiene VALUES('$value','$Rut')";
	              		$res3 = pg_query($consulta3);
	            }
            }
          	
	        if(pg_affected_rows($res)>0){ ?>
	        	<div class="row">
				    <div class="span12">
				        <div class="alert alert-success">
				          <h4 class="alert-heading">Success</h4>
				          <p>Dentista Actualizado Exitosamente.</p>
				        </div>
				    </div>
				</div>
	  <?php }else{ ?>
				<div class="row">
				    <div class="span12">
				        <div class="alert alert-error">
				          <h4 class="alert-heading">Error</h4>
				          <p>Error al Actualizar, Intentelo mas tarde.</p>
				        </div>
				    </div>
				</div>
	  <?php }

          	Desconectar($con);
          } 
          else{ ?>
          	<div class="row">
				<div class="span12">
				    <div class="alert alert-error">
				        <h4 class="alert-heading">Error</h4>
				        <p>No se pudo Establecer la Conexión con la BD.</p>
				    </div>
				</div>
			</div>
    <?php } ?>
      	  <a class="btn btn-danger" href="/Clinica/Administrador/Dentista/index.php">Atras</a>	
	  </div>
      <?php include("../../Footer.php"); ?>
  	</div>
</body>