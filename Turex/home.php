<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="stylesheet" href="./style/home.css"> 
    <link rel="stylesheet" href="./external/css/bootstrap.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
    <title>Home</title>
</head>
<body>

<?php
    session_start();
    $user = $_SESSION['usuario'];

    if($user == null || $user == '')
    {
        echo "<script>swal('Acceso denegado', 'Debes iniciar sesión para entrar en esta página', 'error');</script>";
        die();
    }
    
    echo "<script>swal('Bienvenido $user', 'Has iniciado sesión correctamente ', 'success');</script>";

?>



<nav class="navbar navbar-expand-sm bg-dark justify-content-between">
    <form class="form-inline my-2 my-lg-0" method="post">
        <input class="form-control mr-sm-2" type="text" placeholder="Ingrese su busqueda" aria-label="Search" name="busqueda">
        <button class="btn btn-light" type="submit" name="search">Buscar</button>
    </form>
    <?php
      if(isset($_POST['search']))
      {
        $busqueda = $_POST['busqueda'];
        $_SESSION['busqueda'] = $busqueda;
        header("Location: ./resenas.php");
      }
    ?>
    <ul class="navbar-nav">
        <li class="nav-item"><a href="./home.php" class="nav-link btn-dark">Inicio</a></li>
        <li class="nav-item"><a href="./publicar.php" class="nav-link btn-dark">Publicar</a></li>
        <li class="nav-item"><a href="./tasks/cerrarsession.php" class="nav-link btn-dark">Cerrar Sesión</a></li>
        <li class="nav-item"><a href="aboutus.php" class="nav-link btn-dark">Sobre nosotros</a></li>
    </ul>
</nav>

<!-- Slides Boostrap 4 -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/turistas.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/playa.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/campo.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            
<script src="./external/js/jquery-3.3.1.slim.min.js"></script>
<script src="./external/js/popper.min.js"></script>
<script src="./external/js/bootstrap.min.js"></script>

</body>
</html>
