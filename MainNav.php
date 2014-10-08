<div class="navbar navbar-fixed-top navbar-inverse">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="/Clinica/">Clinica</a>
       <div class="nav-collapse" id="main-menu">
       <?php if(isset($_SESSION['Rut']) && $_SESSION['Tipo']=="Administrador"){ ?>
                <ul class="nav" id="main-menu-left">
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administradores<b class="caret"></b></a>
                      <ul class="dropdown-menu" id="swatch-menu">
                          <li><a href="/Clinica/Administrador/Admin/index.php">Gestión Aministradores</a></li>
                          <li><a href="/Clinica/Administrador/Admin/add.php">Agregar Administrador</a></li>
                          <li class="divider"></li>
                          <li><a href="/Clinica/Administrador/Secretaria/index.php">Gestión Secretarias</a></li>
                          <li><a href="/Clinica/Administrador/Secretaria/add.php">Agregar Secretaria</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Medicos<b class="caret"></b></a>
                      <ul class="dropdown-menu" id="swatch-menu">
                          <li><a href="/Clinica/Administrador/Medico/index.php">Gestión Medicos</a></li>
                          <li><a href="/Clinica/Administrador/Medico/add.php">Agregar Medico</a></li>
                          <li class="divider"></li>
                          <li><a href="/Clinica/Administrador/Dentista/index.php">Gestión Dentistas</a></li>
                          <li><a href="/Clinica/Administrador/Dentista/add.php">Agregar Dentista</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes<b class="caret"></b></a>
                      <ul class="dropdown-menu" id="swatch-menu">
                          <li><a href="/Clinica/Administrador/Cliente/index.php">Gestión Clientes</a></li>
                          <li class="divider"></li>
                          <li><a href="/Clinica/Administrador/Cliente/add.php">Agregar Cliente</a></li>
                          </ul>
                    </li>
                </ul>
       <?php } ?>
                <ul class="nav pull-right" id="main-menu-right">
                    <?php
                      if(!isset($_SESSION['Rut'])){ ?>
                        <li>
                          <a href="/Clinica/Registrarse.php">Registrarse <i class="icon-white icon-share-alt"></i></a>
                        </li>
                        <li>
                          <a href="/Clinica/IniciarSesion.php">Iniciar Sesión <i class="icon-white icon-share-alt"></i></a>
                        </li>
                <?php }else{ ?>
                        <li>
                          <?php if($_SESSION['Tipo']=="Administrador" || $_SESSION['Tipo']=="Secretaria"){ ?>
                            <a href="/Clinica/Administrador/Cuenta.php">
                          <?php }elseif($_SESSION['Tipo']=="Medico" || $_SESSION['Tipo']=="Dentista"){ ?>
                            <a href="/Clinica/Medico/Cuenta.php">
                          <?php }elseif($_SESSION['Tipo']=="Cliente"){ ?>
                            <a href="/Clinica/Cliente/Cuenta.php">
                          <?php } ?>
                          <?php echo "Configurar Cuenta"; ?>
                          <i class="icon-white icon-share-alt"></i></a>
                        </li>
                        <li>
                          <a href="/Clinica/CerrarSesion.php">Cerrar Sesión <i class="icon-white icon-share-alt"></i></a>
                        </li>
                <?php } ?>
                </ul>
              </div>
      </div>
    </div>
</div>