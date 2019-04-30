<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./external/css/bootstrap.css">
    <link rel="stylesheet" href="./style/login.css">  
    <title>Turisex</title>
</head>
<body>

<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-img">
                <img src="./img/user.png" alt="avatar" >
            </div>
            <form action="" class="col-12" method= "post">
                <div class="form-group user-group">    
                    <input type="text" placeholder="user" id="user" name="user" class="form-control" autocomplete="off">
                </div>
                <div class="form-group" id="pass-group">
                    <input type="password" placeholder="password" id="user" name="password" class="form-control">
                </div>
                    <button type="submit" name="login" class="btn btn-primary"><i class='fas fa-sign-in-alt'></i>  Login</button><br/>
                    <a href="./tasks/registrar.php">Crear cuenta</a> <br> <br>
            </form>
        </div>
    </div>
</div>
    
</div>

<script src="./external/js/jquery-3.3.1.slim.min.js"></script>
<script src="./external/js/popper.min.js"></script>
<script src="./external/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

<?php
include('./inc/conexion.php');

if(isset($_POST['login']))
{
    $user = $_POST['user'];
    $password = $_POST['password'];
    validar($user, $password);
}

function validar($user, $password)
{
    global $conn;
    global $validated;
    session_start();
    $query = "select * from usuario";
    $resulset = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($resulset, MYSQLI_BOTH))
    {
       
        if(!strcmp($row['usuario'], "$user") && !strcmp($row['password'], "$password"))
        {
            $_SESSION['idusuario'] = $row['idusuario'];
            $_SESSION['usuario'] = $row['usuario'];

            // echo "<script>swal('Bienvenido $user', 'Has iniciado sección correctamente', 'success');</script>";

            $validated = true;
            header('Location: home.php');
        }
    }

    if(!$validated) 
    {
        echo "<script>swal('Hubo un error', 'El usuario no está registrado, o los datos no concuerdan', 'error');</script>";
        session_start();
        session_destroy();
        header('Location: index.php');
    }
}

?>

</body>
</html>