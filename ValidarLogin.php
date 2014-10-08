<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Clinica/img/logo.jpg">
<title>Clinica</title>

<?php include("Estilos.php"); ?>

<script type="text/javascript" src="/Clinica/js/jquery-1.7.2.js"></script>
<style type="text/css">
</style>
</head>
<body>
  <div id="wrapper">
    <?php include("MainNav.php"); ?>
    <div class="MainContent well Mensaje">
	<?php
	include "Conexion.php";
	
	$conexion = Conectar(); 

	$Rut=$_POST["Rut"];
	$Contraseña=$_POST["Contraseña"];

	$query1 = "SELECT * FROM Cliente WHERE cli_rut='$Rut' AND cli_password='$Contraseña' AND cli_estado='t'";
	$query2 = "SELECT * FROM Administrador WHERE adm_rut='$Rut' AND adm_password='$Contraseña' AND adm_estado='t'";
	$query3 = "SELECT * FROM Medico WHERE med_rut='$Rut' AND med_password='$Contraseña' AND med_estado='t'"; 

	$result1 = pg_query($query1);
	$result2 = pg_query($query2);		
	$result3 = pg_query($query3);
	$redirect = "none";	

	while($fila = pg_fetch_array($result1)){ 
		if(($Rut == $fila["cli_rut"]) && $Contraseña == $fila["cli_password"]){ 
			$_SESSION['Rut'] = $fila["cli_rut"]; 
			$_SESSION['Nombre'] = $fila["cli_nombre"]; 
			$_SESSION['Apellido'] = $fila["cli_apellidos"];
			$_SESSION['Contraseña'] = $fila["cli_password"];
			$_SESSION['Estado'] = $fila["cli_estado"];
			$_SESSION['Tipo'] = 'Cliente';

			$estado = 1; 
			break; 
		}
		else
			$estado = 0; 	
	}
	if(pg_num_rows($result1)>0){
		if( $estado == 1 && $_SESSION['Estado'] == "t")
			$redirect = "Location: /Clinica/Cliente/index.php";
	}

	while($fila = pg_fetch_array($result2)){ 
		if(($Rut == $fila["adm_rut"]) && $Contraseña == $fila["adm_password"]){ 
			$_SESSION['Rut'] = $fila["adm_rut"]; 
			$_SESSION['Nombre'] = $fila["adm_nombre"]; 
			$_SESSION['Apellido'] = $fila["adm_apellido"];
			$_SESSION['Contraseña'] = $fila["adm_password"];
			$_SESSION['Estado'] = $fila["adm_estado"];
			$_SESSION['Tipo'] = $fila["adm_tipo"];
			$estado = 1; 
			break; 
		}
		else
			$estado = 0; 	
	}

	if(pg_num_rows($result2)>0){
		if($estado == 1 && $_SESSION['Estado'] == "t" && $_SESSION['Tipo'] == "Administrador")
			$redirect= "Location: /Clinica/Administrador/index.php";
		elseif($estado == 1 && $_SESSION['Estado'] == "t" && $_SESSION['Tipo'] == "Secretaria")
			$redirect= "Location: /Clinica/Administrador/index.php";	
	}

	while($fila = pg_fetch_array($result3)){ 
		if(($Rut == $fila["med_rut"]) && $Contraseña == $fila["med_password"]){ 
			$_SESSION['Rut'] = $fila["med_rut"]; 
			$_SESSION['Nombre'] = $fila["med_nombre"]; 
			$_SESSION['Apellido'] = $fila["med_apellido"];
			$_SESSION['Contraseña'] = $fila["med_password"];
			$_SESSION['Estado'] = $fila["med_estado"];
			$_SESSION['Tipo'] = $fila["med_tipo"];

			$estado = 1; 
			break; 
		}
		else
			$estado = 0; 	
	}

	if(pg_num_rows($result3)>0){
		if( $estado == 1 && $_SESSION['Estado'] == "t")
			$redirect= "Location: /Clinica/Medico/index.php";
	}

	Desconectar($conexion); 
	
	if($redirect=="none")
	  { ?>
		<div class="row">
		    <div class="span12">
		        <div class="alert alert-error">
		          <h4 class="alert-heading">Error</h4>
		          <p>Rut y/o Contraseña Incorrectos.</p>
		        </div>
		    </div>
		</div>

		<a class="btn btn-danger" href="/Clinica/IniciarSesion.php">Atras</a>	
<?php }
	else
		header("$redirect") ?>
	</div>
	<?php include("Footer.php"); ?>
  </div>
</body>