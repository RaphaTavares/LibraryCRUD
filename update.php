<?php
session_start();
include_once("conexao.php");

/*
$host = "localhost";
$username = "pare";
$password = "paresisead";
$db = "pare";

$conn = mysqli_connect($host,$username,$password,$db) or die("Impossível Conectar"); 
*/
$idjornal = $_POST["idjornal"];

$nome_edicao = filter_input(INPUT_POST, 'nome_edicao', FILTER_SANITIZE_STRING);
$id_jornal_fk = $_POST['select_jornal'];
$data_public = $_POST['data_publi'];
$id_edicao = $_POST['idedicao'];



$kuery_edicao = mysqli_query($conn, "SELECT * FROM edicao WHERE id_edicao = '$id_edicao'");

$row_edicao = mysqli_fetch_assoc($kuery_edicao);

$num_pag = $row_edicao['id_jornal'];

$query_update = "UPDATE edicao SET titulo_edicao = '$nome_edicao' , id_jornal = '$id_jornal_fk' , data_publicacao = '$data_public' WHERE id_edicao = '$id_edicao'";

$exec = mysqli_query($conn, $query_update);

echo "$nome_edicao, $id_jornal_fk, $data_public, $id_edicao";
header("location: http://pare.jf.ifsudestemg.edu.br/biblioteca/_crud/edicao.php?id_jornal=$idjornal");



?>