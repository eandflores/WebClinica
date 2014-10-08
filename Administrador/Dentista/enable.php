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

          include("../../Conexion.php"); 

          $con=Conectar();

          if($con){ 
          	$consulta="UPDATE medico SET med_estado=true WHERE med_rut='$Rut'";
          	
          	$res=pg_query($consulta);

          	if(pg_affected_rows($res)>0){ ?>
	        	<div class="row">
				    <div class="span12">
				        <div class="alert alert-success">
				          <h4 class="alert-heading">Success</h4>
				          <p>Dentista Habilitado Exitosamente.</p>
				        </div>
				    </div>
				</div>
	  <?php }else{ ?>
				<div class="row">
				    <div class="span12">
				        <div class="alert alert-error">
				          <h4 class="alert-heading">Error</h4>
				          <p>Error al Habilitar.</p>
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
