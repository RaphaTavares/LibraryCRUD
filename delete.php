<?php
session_start();
include_once("conexao.php");
$idedicao = $_GET["idedicao"];

$passarid = mysqli_query($conn, "SELECT id_jornal FROM edicao WHERE id_edicao = '$idedicao'");
$passarid_fa = mysqli_fetch_assoc($passarid);
$num_pag = $passarid_fa['id_jornal'];


header("location: http://pare.jf.ifsudestemg.edu.br/biblioteca/_crud/edicao.php?id_jornal=$num_pag");

$codigo_delete = "DELETE FROM edicao WHERE id_edicao = '$idedicao'";

$kuery_delete = mysqli_query($conn, $codigo_delete);


?>