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

		<h3>Actualizar Medico <?php echo $Rut ?></h3>
		
		<?php
        include("../../Conexion.php"); 

		$con=Conectar();
        
        if($con){ 
        	$consulta="SELECT * FROM medico WHERE med_rut='$Rut'";
          	
        	$res=pg_query($consulta);

        	if($res){ 
        		$row = pg_fetch_array($res) ?>
        		<form class="form-horizontal well" method="post" action="/Clinica/Administrador/Medico/edit2.php?Rut=<?php echo $Rut ?>">
				    <fieldset>
				        <div class="control-group">
				            <label class="control-label" for="inputNombre">Nombre</label>
				            <div class="controls">
				              <input type="text" id="inputNombre" name="Nombre" value="<?php echo $row['med_nombre'] ?>" maxlength="15" required>
				            </div>
				        </div>
				        <div class="control-group">
				            <label class="control-label" for="inputApellido">Apellido</label>
				            <div class="controls">
				              <input type="text" id="inputApellido" name="Apellido" value="<?php echo $row['med_apellido'] ?>" maxlength="20" required>
				            </div>
				        </div>
				        <div class="control-group">
				            <label class="control-label" for="inputPassword">Password</label>
				            <div class="controls">
				              <input type="text" id="inputPassword" name="Password" value="<?php echo $row['med_password'] ?>" maxlength="20" required>
				            </div>
				        </div>
				        <h3><legend>Especialidades</legend></h3>
		        		<?php
          				$consulta="SELECT * FROM especialidad E, Tiene T WHERE E.esp_tipo='MEDICO' AND E.esp_id=T.esp_id AND T.med_rut='$Rut'"; 
          				$res=pg_query($consulta);
          				$consulta2="SELECT esp_id,esp_nombre FROM especialidad WHERE esp_tipo='MEDICO' EXCEPT (SELECT e.esp_id,e.esp_nombre FROM medico m, tiene t, especialidad e WHERE m.med_rut=t.med_rut AND t.esp_id=e.esp_id AND m.med_rut='$Rut' AND e.esp_tipo='MEDICO')"; 
          				$res2=pg_query($consulta2);

          				if(pg_num_rows($res)>0 || pg_num_rows($res2)>0)
			          	{
			          		while($row = pg_fetch_array($res)){ ?>
			          			<div class="control-group">
						            <label class="control-label"><?php echo $row["esp_nombre"] ?></label>
						            <div class="controls">
						              <label class="checkbox">
						                <input type="checkbox" name="especialidades[]" value="<?php echo $row["esp_id"] ?>" checked>
						              </label>
						            </div>
						        </div> 
					  <?php }
					  		while($row = pg_fetch_array($res2)){ ?>
			          			<div class="control-group">
						            <label class="control-label"><?php echo $row["esp_nombre"] ?></label>
						            <div class="controls">
						              <label class="checkbox">
						                <input type="checkbox" name="especialidades[]" value="<?php echo $row["esp_id"] ?>">
						              </label>
						            </div>
						        </div> 
					  <?php }
			          	} 
			          	else{ ?>
			          		<div class="row">
								<div class="span12">
								    <div class="alert alert-error">
								        <h4 class="alert-heading">Error</h4>
								        <p>No hay Especialidades en la BD.</p>
								    </div>
								</div>
							</div>
			      <?php } ?>
				        <div class="form-actions">
				            <button type="submit" class="btn btn-inverse">Modificar</button>
				            <button type="reset" class="btn btn-danger" onclick="window.location='/Clinica/Administrador/Medico/index.php'">Atras</button>
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
				<a class="btn btn-danger" href="/Clinica/Administrador/Medico/index.php">Atras</a>
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
			<a class="btn btn-danger" href="/Clinica/Administrador/Medico/index.php">Atras</a>
  <?php } ?>
	  </div>
      <?php include("../../Footer.php"); ?>
  	</div>
</body>
