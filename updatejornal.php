<?php
session_start();
include_once("conexao.php");

$idjornal = $_POST["idjornal"];

$nome_jornal = filter_input(INPUT_POST, 'nome_jornal', FILTER_SANITIZE_STRING);
$descricao_jornal = $_POST['descricao_jornal'];



$kuery_jornal = mysqli_query($conn, "SELECT * FROM jornal WHERE id_jornal = '$idjornal'");

$row_jornal = mysqli_fetch_assoc($kuery_jornal);

$num_pag = $row_edicao['id_jornal'];

$query_update = "UPDATE jornal SET nome_jornal = '$nome_jornal' , descricao_jornal = '$descricao_jornal' WHERE id_jornal = '$idjornal'";

$exec = mysqli_query($conn, $query_update);

header("location: http://localhost/_crud/index.php");



?>