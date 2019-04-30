<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/login.css"> 
    <link rel="stylesheet" href="../external/css/bootstrap.css">
    <title>Risgister</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>


<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content" style="background: #3b4652">
            <div class="col-12 user-img">
                <img src="../img/user.png" alt="avatar" >
            </div>
            <form action="" class="col-12" method= "post" enctype="multipart/form-data">
                <div class="form-group user-group">    
                    <input required type="text" placeholder="user"  name="user" autocomplete="off" class="form-control">
                </div>
                <div class="form-group">
                    <input required type="text" placeholder="email"  name="email" class="form-control" autocomplete="off">
                </div>
                <div required class="form-group" id="pass-group">
                    <input type="password" placeholder="password" name="password" class="form-control" autocomplete="off">
                </div>
                <div class="form-group input-group-prepend bg-light">
                    <input type="file" name="foto">
                </div>
                    <button type="submit" name="crear" class="btn btn-primary">Create Account</button><br/>
                    <a href="../index.php">Inicio</a> <br> <br>
            </form>
        </div>
    </div>
</div>


<script src="../external/js/jquery-3.3.1.slim.min.js"></script>
<script src="../external/js/popper.min.js"></script>
<script src="../external/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <!-- Los iconos tipo Solid de Fontawesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

<?php
include("../inc/conexion.php");

if(isset($_POST["crear"]))
{
    insertUser();
}

function insertUser()
{
    global $conn;
    
    $user = $_POST["user"];
    $email = $_POST["email"];
    $password  = $_POST["password"];

    $fileBytes = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        
   $query = "insert into usuario(usuario, email, password, fotousuario) values('$user', '$email', '$password', '$fileBytes')";
   $resulset = mysqli_query($conn, $query);

   echo "<script>swal('Registro exitoso', 'Tu perfil ha sido creado exitosamente', 'success');</script>";


}

?>

</body>
</html>


