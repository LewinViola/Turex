<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./external/css/bootstrap.css">
    <style>
    
    body
    {
        background: url('./img/mountain.jpg') no-repeat center center fixed;
        background-size: cover;

    }

    .container 
    {
        width: 30%;
    }
    </style>
</head>
<body>


<div class="app-body">
   
<div class="container">
        <div class="content">
            <form action="" class="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                   <textarea name="comentario" id="" cols="30" rows="8" class="form-control" placeholder="Escribe tu comentario" autocomplete="off"></textarea>
                </div>
                <button type="submit" name="comentar" class="btn btn-primary">Publicar comentario</button>
            </form> 
        </div>
    </div>

</div>

<?php
include('./inc/conexion.php');
session_start();

if(isset($_POST['comentar']))
{
    $comentario = $_POST['comentario'];
    comentar($comentario);
}

function comentar($comentario)
{
    global $conn;
    $idusuario = $_SESSION['idusuario'];
    $idresena = $_GET['id'];

    $query = "insert into comentarios(idusuario, idresena, comentario) values($idusuario,$idresena , '$comentario')";
    $resulset = mysqli_query($conn, $query);

    header('Location: resenas.php');
}

?>
            
<script src="./external/js/jquery-3.3.1.slim.min.js"></script>
<script src="./external/js/popper.min.js"></script>
<script src="./external/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 


</body>
</html>