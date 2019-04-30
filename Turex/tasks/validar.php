<?php
include('../inc/conexion.php');

if(isset($_POST['login']))
{
    $user = $_POST['user'];
    $password = $_POST['password'];
    validar($user, $password);
}

function validar($user, $password)
{
    global $conn;
    $query = "select * from usuario";
    $resulset = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($resulset, MYSQLI_BOTH))
    {
        if(!strcmp("Lewin", "$user") && !strcmp("1234", "$password"))
        {
            echo 'Usuario valido';
        } else 
        {
            echo "<script>alert('Usuario no valido');</script>";
            header('Location: ../index.php');
        }
        
    }

}

?>