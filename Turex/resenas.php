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

    a
    {
        color: white;
    }

    
    body
    {
        background: url('./img/mountain.jpg') no-repeat center center fixed;
        background-size: cover;
    }


    .likes
    {
       color: blue;
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

<?php
include("./inc/conexion.php");

  
        global $conn;
        session_start();
        $parametro = $_SESSION['busqueda'];
        $query = "select * from resena where titulo like '%$parametro%' or descripcion like '%$parametro%' or lugar like '%$parametro%' ";
        $resulset = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($resulset, MYSQLI_BOTH))
        {
            
            $title = $row['titulo'];
            $foto = $row['fotoresena'];
            $description = $row['descripcion'];
            $place = $row['lugar'];
            $idresena = $row['idresena']
            
        ?>
        
            <div class="container ">
                    <div class="content">
                        <form action="" class="" enctype="multipart/form-data">
                            <div class="form-group">
                                <textarea disabled name='title' id='' cols='30' rows='1' class='form-control title'  autocomplete='off'><?php echo $title ?></textarea>
                            </div>
                            <div class=" form-group description" style="">
                                <img width="300px" height="200px" src="data:image/jpg; base64, <?php echo base64_encode($foto);?>"/>
                            </div>
                            <div class="form-group">
                            <textarea disabled name="description" id="" cols="30" rows="8" class="form-control" autocomplete="off"><?php echo $description?></textarea>
                            </div>
                            <div class="form-group">
                                <textarea  disabled name='place' id='' cols='30' rows='1' class='form-control place'  autocomplete='off'><?php echo $place?></textarea>
                            </div>
                            <div class="valoracion d-flex justify-content-between">
                                <div class="vercomentarios">
                                <button type="submit" name="vercomentarios" class = "btn btn-primary"><a href="vercomentarios.php?id=<?php echo $idresena;?>">Ver comentarios</a></button>
                                </div>
                                <div class="valorando">
                                <button type="submit" name="Like" class="btn btn-primary" style="margin-right: 5px;"><a href="like.php?id=<?php echo $idresena;?>"><?PHP 
                                        $query = "select count(*) as total from likes where idresena = $idresena";
                                        $likes = mysqli_query($conn, $query);

                                        $row = mysqli_fetch_array($likes, MYSQLI_BOTH);
                                        echo $row['total'];
                                ?> Likes</a></button>
                                <button type="submit" name="comentar" class="btn btn-primary"><a href="comentar.php?id=<?php echo $idresena;?>">Comentar</a></button>
                                </div>
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

</body>
</html>
