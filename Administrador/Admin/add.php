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
      	<h3>Agregar Nuevo Administrador</h3>
		<form class="form-horizontal well"  onsubmit="return check()" method="post" action="/Clinica/Administrador/Admin/add2.php">
		    <fieldset>
		    	<div id="DivMensajeRut" class="control-group">
		            <label class="control-label" for="inputRut">Rut</label>
		            <div class="controls">
		              <input type="text" id="inputRut" name="Rut" placeholder="Rut" maxlength="12" required>
		              <span class="help-inline" id="MensajeRut" style="display:none;font-weight:bold">El Rut debe contener los puntos y el guion. Ej: XX.XXX.XXX-X
              		  </span>
		            </div>
		        </div>
		        <div class="control-group">
		            <label class="control-label" for="inputNombre">Nombre</label>
		            <div class="controls">
		              <input type="text" id="inputNombre" name="Nombre" placeholder="Nombre" maxlength="15" required>
		            </div>
		        </div>
		        <div class="control-group">
		            <label class="control-label" for="inputApellido">Apellido</label>
		            <div class="controls">
		              <input type="text" id="inputApellido" name="Apellido" placeholder="Apellido" maxlength="20" required>
		            </div>
		        </div>
		        <div class="control-group">
		            <label class="control-label" for="inputPassword">Password</label>
		            <div class="controls">
		              <input type="text" id="inputPassword" name="Password" placeholder="Password" maxlength="20" required>
		            </div>
		        </div>
		        <div class="form-actions">
		            <button type="submit" class="btn btn-inverse">Agregar</button>
		            <button type="reset" class="btn btn-danger" onclick="window.location='/Clinica/Administrador/Admin/index.php'">Atras</button>
		        </div>
		    </fieldset>
		</form>
	  </div>
      <?php include("../../Footer.php"); ?>
  	</div>
</body>
<script language="javascript">
<!--
function check()
{
  $("#MensajeRut").css({"display":"none"});
  $("#DivMensajeRut").removeClass("error");
  
  if($("#inputRut").val().length > 10)
    return true;
  else{
    $("#MensajeRut").css({"display":"inline"});
    $("#DivMensajeRut").addClass("error");

    return false;
  }
}
//-->
</script>