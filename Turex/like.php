<?php
include('./inc/conexion.php');
session_start();

$idusuario = $_SESSION['idusuario'];
$idresena = $_GET['id'];
$query = "INSERT into likes(idusuario, idresena) values ($idusuario, $idresena)";
$resulset = mysqli_query($conn, $query);

header('Location: resenas.php');
?>