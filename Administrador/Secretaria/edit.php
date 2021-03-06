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

		<h3>Actualizar Secretaria <?php echo $Rut ?></h3>
		
		<?php
        include("../../Conexion.php"); 

		$con=Conectar();
        
        if($con){ 
        	$consulta="SELECT * FROM administrador WHERE adm_rut='$Rut'";
          	
        	$res=pg_query($consulta);

        	if($res){ 
        		$row = pg_fetch_array($res) ?>
        		<form class="form-horizontal well" method="post" action="/Clinica/Administrador/Secretaria/edit2.php?Rut=<?php echo $Rut ?>">
				    <fieldset>
				        <div class="control-group">
				            <label class="control-label" for="inputNombre">Nombre</label>
				            <div class="controls">
				              <input type="text" id="inputNombre" name="Nombre" value="<?php echo $row['adm_nombre'] ?>" maxlength="15" required>
				            </div>
				        </div>
				        <div class="control-group">
				            <label class="control-label" for="inputApellido">Apellido</label>
				            <div class="controls">
				              <input type="text" id="inputApellido" name="Apellido" value="<?php echo $row['adm_apellido'] ?>" maxlength="20" required>
				            </div>
				        </div>
				        <div class="control-group">
				            <label class="control-label" for="inputPassword">Password</label>
				            <div class="controls">
				              <input type="text" id="inputPassword" name="Password" value="<?php echo $row['adm_password'] ?>" maxlength="20" required>
				            </div>
				        </div>
				        <div class="form-actions">
				            <button type="submit" class="btn btn-inverse">Modificar</button>
				            <button type="reset" class="btn btn-danger" onclick="window.location='/Clinica/Administrador/Secretaria/index.php'">Atras</button>
				        </div>
				    </fieldset>
				</form>
      <?php }else{ ?>
              	<div class="row">
					<div class="span12">
				    	<div class="alert alert-error">
				        	<h4 class="alert-heading">Error</h4>
				        	<p>Ha ocurrido un Error, y no pudo encontrarse el Elemento en la BD.</p>
				    	</div>
					</div>
				</div>
				<a class="btn btn-danger" href="/Clinica/Administrador/Secretaria/index.php">Atras</a>
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
			<a class="btn btn-danger" href="/Clinica/Administrador/Secretaria/index.php">Atras</a>
  <?php } ?>
	  </div>
      <?php include("../../Footer.php"); ?>
  	</div>
</body>
