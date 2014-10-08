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
      	<?php $Rut=$_GET['Rut']; ?>

		<h3>Detalle Cliente <?php echo $Rut ?></h3>
		
		<?php
        include("../../Conexion.php"); 

		$con=Conectar();
        
        if($con){ 
        	$consulta="SELECT * FROM cliente WHERE cli_rut='$Rut'";
          	
        	$res=pg_query($consulta);

        	if($res){ 
        		$row = pg_fetch_array($res) ?>
        		<ul class="Muestra">
					<li><strong>Nombre:     </strong> <?php echo $row['cli_nombre']; ?></li> 
					<li><strong>Apellido:   </strong><?php echo $row['cli_apellidos']; ?></li>
					<li><strong>Correo:     </strong> <?php echo $row['cli_password']; ?></li>
					<li><?php if($row['cli_estado']=="t"){ ?>
						<strong>Estado:     </strong>Habilitado
						<?php }else{ ?>
						<strong>Estado:     </strong>Deshabilitado
						<?php } ?>
					</li>
					<li><strong>Dirección:  </strong> <?php echo $row['cli_correo']; ?></li> 
					<li><strong>Correo:     </strong> <?php echo $row['cli_telefono']; ?></li> 
					<li><strong>Teléfono:   </strong><?php echo $row['cli_direccion']; ?></li> 
					<li><strong>Dirección:  </strong> <?php echo $row['cli_fecha_nac']; ?></li> 
				</ul>
				<a class="btn btn-danger" href="/Clinica/Administrador/Cliente/index.php">Atras</a>
      <?php }else{ ?>
              	<div class="row">
					<div class="span12">
				    	<div class="alert alert-error">
				        	<h4 class="alert-heading">Error</h4>
				        	<p>Ha ocurrido un Error, y no pudo encontrarse el Elemento en la BD.</p>
				    	</div>
					</div>
				</div>
				<a class="btn btn-danger" href="/Clinica/Administrador/Cliente/index.php">Atras</a>
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
			<a class="btn btn-danger" href="/Clinica/Administrador/Cliente/index.php">Atras</a>
  <?php } ?>
	  </div>
      <?php include("../../Footer.php"); ?>
  	</div>
</body>
