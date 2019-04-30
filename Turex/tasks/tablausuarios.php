<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla usuarios</title>
</head>
<body>

<table>
    <thead>
        <th>id</th>
        <th>user</th>
        <th>Email</th>
        <th>Password</th>
        <th>Foto</th>
    </thead>
    <tbody>
    <?php   
        include("../inc/conexion.php");
        global $conn;
        $query = "select * from usuario";
        $resulset = mysqli_query($conn, $query);
        while($datos = mysqli_fetch_array($resulset, MYSQLI_BOTH))
        {
    ?>
       <tr>
            <td><?php echo $datos['idusuario'];  ?></td>
            <td><?php echo $datos['usuario'];  ?></td>
            <td><?php echo $datos['email'];  ?></td>
            <td><?php echo $datos['password'];  ?></td>
            <?php  $imagen = $datos['fotousuario']?>
            <td><img width="75px" height="75px" src="data:image/jpg; base64, <?php echo base64_encode($imagen);?>"/></td>
       </tr>
     

    <?php
        }
    ?>
    </tbody>
</table>

</body>
</html>