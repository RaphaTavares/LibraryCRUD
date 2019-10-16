<?php
session_start();
include_once("conexao.php");
$nomeedicao = $_GET['nomeedicao'];
$idedicao = $_GET['idedicao'];
$id_pagina = $_GET["id_pagina"];
$id_jornal = $_GET['idjornal'];

header("location: http://pare.jf.ifsudestemg.edu.br/biblioteca/_crud/imagens.php?idjornal=$id_jornal&idedicao=$idedicao&nomeedicao=$nomeedicao");

$codigo_delete = "DELETE FROM pagina WHERE id_pagina = '$id_pagina'";

$kuery_delete = mysqli_query($conn, $codigo_delete);


?>