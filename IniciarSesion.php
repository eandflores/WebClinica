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
      <div class="MainContent well">
        <form class="form-horizontal" style="padding-left:100px;" onsubmit="return check()" method="post" action="ValidarLogin.php">
        <fieldset>
          <legend>Iniciar Sesión</legend>
          <div class="control-group" id="DivMensajeRut">
            <label class="control-label" for="inputRut">Rut: </label>
            <div class="controls">
              <input type="text" id="inputRut" name="Rut" maxlength="12" placeholder="Rut" required>
              <span class="help-inline" id="MensajeRut" style="display:none;font-weight:bold">
                El Rut debe contener los puntos y el guion. Ej: XX.XXX.XXX-X
              </span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputContraseña">Contraseña: </label>
            <div class="controls">
              <input type="password" id="inputContraseña" name="Contraseña" maxlength="20" placeholder="Password" required>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-inverse">Iniciar Sesión</button>
            <button type="reset" class="btn btn-danger" onclick="window.location='/Clinica/index.php'">Cancelar</button>
          </div>
        </fieldset>
      </form>
      </div>
      <?php include("Footer.php"); ?>
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