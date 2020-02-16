<?php
include_once('php-objects/conexion.inc.php');
include_once "php-objects/usuario.inc.php";
include_once "php-objects/repositorio.php";
$mode = false;
session_start();
error_reporting(0);

$sesion = $_SESSION['cliente'];
if ($sesion != null || $sesion != '') {
  $mode = true;
}


?>
<?php
include_once "php-objects/repositorio.php";
include_once "php-objects/usuario.inc.php";
include_once "php-objects/conexion.inc.php";

if($_POST){
  Conexion::abrir();
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $usuario=repositorioFunciones::obtener_usuario_email(Conexion::obtener(),$email);
  
  if($usuario->getContrasena()==$pass){
    session_start();
    $_SESSION['cliente']=$usuario;
    header("Location: index.php");
  }else{
    echo "La contraseña o el email no coinciden";
  }

  Conexion::cerrar();

  
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="css/lux1.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" href="css/estilos.css">
  <title>Inicio</title>
</head>

<body >
  <nav style="z-index:40!important;" class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Narcos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">

      <div class="col-8">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="shop.php">Productos</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="our.php">Nosotros</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#contacto">Contactanos</a>
          </li>
        </ul>
      </div>
      <div class="col-4">
        <div class="float-right">
          <ul class="navbar-nav mr-auto">
            <?php
            if ($mode) {
              echo ('
              <li class="nav-item ">
                  <a class="nav-link" href="cuenta.php">Cuenta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cerrar.php">Cerrar Sesion</a>
                </li>
              ');

             } else {

              echo ('
          <li class="nav-item ">
			<a class="nav-link" id="btn-abrir-popup" class="btn-abrir-popup" >Iniciar Sesion</a>

		<div class="overlay" id="overlay">
			
			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
				<form class="form-signin" method="POST" action="">
					<div class="contenedor-inputs">
						<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Correo electronico" required autofocus>
						<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
					</div>
					<button class="btn btn-primary btn-block" type="submit">Entrar</button>
					</form>
			</div>
		</div>

            
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registro.php">Registrate</a>
            </li>
          ');
            }
            ?>
          </ul>
        </div>
      </div>

    </div>
  </nav>

  
</body>
<footer class="container py-5">
    <div class="row">
      <div class="col-12 col-md">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24" focusable="false">
          <title>Product</title>
          <circle cx="12" cy="12" r="10" />
          <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
        </svg>
        <small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
      </div>
      <div class="col-6 col-md">
        <h5>Sedes</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="https://www.google.com/maps/place/Cl.+32+%2326-133+a+26-55,+Bucaramanga,+Santander/@7.1243538,-73.1207863,17z/data=!3m1!4b1!4m5!3m4!1s0x8e681563c7a8a6a9:0x3d64f76f728c5761!8m2!3d7.124348!4d-73.1185974">Bucaramanga</a></li>
          <li><a class="text-muted" href="https://www.google.com/maps/place/Cra.+26b+%2334-2+a+34-124,+Floridablanca,+Santander/@7.0688534,-73.1053061,17z/data=!3m1!4b1!4m5!3m4!1s0x8e683f71d7396e3d:0xab772f025f267d0e!8m2!3d7.0688528!4d-73.1031178">Floridablanca</a></li>
          <li><a class="text-muted" href="https://www.google.com/maps/place/Cl.+16+%231217,+Duitama,+Boyac%C3%A1/@5.8304793,-73.0360097,18z/data=!3m1!4b1!4m13!1m7!3m6!1s0x8e6a3f0ca12f6173:0x6a043a55d2f7de6e!2sDuitama,+Boyac%C3%A1!3b1!8m2!3d5.8268951!4d-73.0329273!3m4!1s0x8e6a3f0bf9e90dfd:0xf53a1436160af546!8m2!3d5.8304766!4d-73.0349154">Duitama</a></li>
          <li><a class="text-muted" href="https://www.google.com/maps/place/Cl.+48+%2326-2+a+26-154,+Gir%C3%B3n,+Santander/@7.0760531,-73.171821,17z/data=!3m1!4b1!4m13!1m7!3m6!1s0x8e683e90912b50ff:0xe9aa9708e4b018c6!2sGir%C3%B3n,+Santander!3b1!8m2!3d7.0739678!4d-73.1692652!3m4!1s0x8e683e8f4dbd17a9:0x616b6bb50cfb1ace!8m2!3d7.0760478!4d-73.1696323">Giron</a></li>
          <li><a class="text-muted" href="https://www.google.com/maps/place/Calle+22+A,+Yopal,+Casanare/@5.3386884,-72.393591,17z/data=!3m1!4b1!4m13!1m7!3m6!1s0x8e6b0dca93add7cb:0x46dfbc4a24770cfe!2sYopal,+Casanare!3b1!8m2!3d5.348903!4d-72.400523!3m4!1s0x8e6b0db213fee0a9:0xc53c66b0fabe5390!8m2!3d5.3386831!4d-72.3914022">Yopal</a></li>
        </ul>
      </div>
      <div class="col-6 col-md" id="contacto">
        <h5>Contacto</h5>
        <p class="text-muted">
          Para mas informacion:
          <br>
          +57 317 6513196
        </p>
      </div>
      <div class="col-6 col-md">
        <h5>Acerca de Narcos</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="our.php#vision">Vision</a></li>
          <li><a class="text-muted" href="our.php#mision">Mision</a></li>
          <li><a class="text-muted" href="our.php#marca">Nuestra marca</a></li>
          <li><a class="text-muted" href="our.php#trabajo">Unetenos</a></li>
        </ul>
      </div>
    </div>
  </footer>
	<script src="js/popup.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>