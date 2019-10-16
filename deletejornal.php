<?php
session_start();
include_once("conexao.php");

$idjornal = $_GET["id_jornal"];

$passarid = mysqli_query($conn, "SELECT id_jornal FROM jornal WHERE id_jornal = '$idjornal'");
$passarid_fa = mysqli_fetch_assoc($passarid);
$num_pag = $passarid_fa['id_jornal'];


header("location: http://localhost/_crud/index.php");

$codigo_delete = "DELETE FROM jornal WHERE id_jornal = '$idjornal'";

$kuery_delete = mysqli_query($conn, $codigo_delete);


?>