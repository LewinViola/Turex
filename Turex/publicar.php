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
    <style>
    .container
    {
        width: 50%;
        background: #343A40;
        padding: 2%;
        border-radius: 20px;
        opacity: .95;
        margin-top: 25px;

    }


    body
    {
        background: url('./img/mountain.jpg') no-repeat center center fixed;
        background-size: cover;
    }


    </style>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-dark justify-content-between">
    <form class="form-inline my-2 my-lg-0" method="post">
        <input class="form-control mr-sm-2" type="text" placeholder="Ingrese su busqueda" aria-label="Search" name="busqueda">
        <button class="btn btn-light" type="submit" name="search">Buscar</button>
    </form>
    <?php
      if(isset($_POST['search']))
      {
        session_start();
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


<div class="app-body">
   
<div class="container">
        <div class="content">
            <form action="" class="" enctype="multipart/form-data" method="post">
                <div class=" form-group input-group-prepend bg-light">
                    <input type="file" name="foto">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Title" name="title" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                   <textarea name="description" id="" cols="30" rows="8" class="form-control" placeholder="description" autocomplete="off"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Place" name="place" class="form-control" autocomplete="off">
                </div>
                <button type="submit" name="publicar" class="btn btn-primary">Publicar</button>
            </form> 
        </div>
    </div>

</div>

<?php
include('./inc/conexion.php');
session_start();

    if(isset($_POST['publicar']))
    {
        $idusuario = $_SESSION['idusuario'];
        $fileBytes = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $title     = $_POST['title'];
        $description = $_POST['description'];
        $place = $_POST['place'];

        publicar($idusuario, $fileBytes, $title, $description, $place);
    }

    function publicar($idusuario, $fileBytes, $title, $description,$place)
    {
        global $conn;

        $query = "insert into resena(idusuario, fotoresena, titulo, descripcion, lugar) 
                   values('$idusuario','$fileBytes', '$title', '$description', '$place')";
    
        $resulset = mysqli_query($conn, $query);
        echo "<script>swal('Publicación finalizada', 'Tu reseña ha sido publicada exitosamente', 'success');</script>";


    }

?>

<script src="./external/js/jquery-3.3.1.slim.min.js"></script>
<script src="./external/js/popper.min.js"></script>
<script src="./external/js/bootstrap.min.js"></script>

</body>
</html>
