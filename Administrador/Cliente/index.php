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
      		<a href="/Clinica/Administrador/Cliente/add.php" class="Agregar">Agregar Cliente</a>
			<table class="table table-bordered table-striped table-hover">
			    <thead>
			      <tr>
			        <th>Rut</th>
			        <th>Nombre</th>
			        <th>Apellido</th>
			        <th>Password</th>
			        <th>Estado</th>
			        <th>Acciones</th>
			      </tr>
			    </thead>
			    <tbody>
			      	<?php include("../../Conexion.php"); 
			      	$con=Conectar();

			      	if($con){ 
			          $consulta = "SELECT * FROM cliente ORDER BY cli_rut";
			          $res = pg_query($consulta);

			          if(pg_num_rows($res)>0)
			          {
			          	while($row = pg_fetch_array($res)){ ?>
			          	<tr>
			          	  <td><?php echo $row["cli_rut"] ?></td>
			              <td><?php echo $row["cli_nombre"] ?></td>
			              <td><?php echo $row["cli_apellidos"] ?></td>
			              <td><?php echo $row["cli_password"] ?></td>
			              <td><?php 
			              	if($row["cli_estado"]=="t")
			              		echo "Hablilitado";
			              	else 
			              		echo "Deshablilitado"; ?>
			              </td>
			              <td>
			              	<a class="accion" href="/Clinica/Administrador/Cliente/view.php?Rut=<?php echo $row["cli_rut"] ?>">
			                	<i class='icon-search'></i>
			                </a>
			                <a class="accion" href="/Clinica/Administrador/Cliente/edit.php?Rut=<?php echo $row["cli_rut"] ?>">
			                	<i class='icon-pencil'></i>
			                </a>
			                <a class="accion" href="/Clinica/Administrador/Cliente/enable.php?Rut=<?php echo $row["cli_rut"] ?>">
			                	<i class='icon-ok'></i>
			                </a>
			                <a href="/Clinica/Administrador/Cliente/delete.php?Rut=<?php echo $row["cli_rut"] ?>">
			                	<i class='icon-remove'></i>
			                </a>
			              </td>
			          	</tr>
			      <?php }
			          }
			          else{ ?>
			          	<tr>
			          		<td colspan='6'>No hay Datos en la Tabla</td>
			          	</tr>
			    <?php }
			    	  Desconectar($con);
			      	}
			        else{ ?>
			        	<tr>
			           		<td colspan='6'>No se pudo establecer Conexión con la BD.</td>
			           	</tr>
			  <?php } ?>
			      </tr>
			    </tbody>
			</table>
		</div>
      <?php include("../../Footer.php"); ?>
  	</div>
</body>