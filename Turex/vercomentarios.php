<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./external/css/bootstrap.css">
    <link rel="stylesheet" href="./style/home.css">
    <title>Document</title>
    <style>
    
    body
    {
        background: url('./img/mountain.jpg') no-repeat center center fixed;
        background-size: cover;

    }

    .container 
    {
        width: 30%;
        margin-bottom: 10px;
    }

    </style>
</head>
<body>

<?php
include('./inc/conexion.php');

    $idresena = $_GET['id'];
    $query = "select usuario, comentario from comentarios inner join usuario on comentarios.idusuario = usuario.idusuario where idresena = $idresena";
    $resulset = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($resulset, MYSQLI_BOTH))
    {
        $usuario = $row['usuario'];
        $comentario = $row['comentario'];  
?>

    
<div class="container">
        <div class="content">
            <form action="" class="" enctype="multipart/form-data" method="post"> 
                <div class="form-group">
                   <textarea disabled name="comentario" id="" cols="30" rows="8" class="form-control" autocomplete="off"><?php echo $comentario?></textarea>
                </div>
                <div class="form-group">
                    <textarea disabled name="comentario" id="" cols="30" rows="1" class="form-control" autocomplete="off">Comentado por: <?php echo $usuario?></textarea>
                </div>
            </form> 
        </div>
    </div>

<?php
    }
?>
  
<script src="./external/js/jquery-3.3.1.slim.min.js"></script>
<script src="./external/js/popper.min.js"></script>
<script src="./external/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

</body>
</html>