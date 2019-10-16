<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Imagens</title>
</head>
<body>

<?php

$host = "localhost";
$username = "pare";
$password = "paresisead";
$db = "pare";

$conn = mysqli_connect($host,$username,$password,$db) or die("Impossível Conectar"); 

$id_jornal = $_GET['idjornal'];

$nomeedicao = $_GET['nomeedicao'];

$idedicao = $_GET['idedicao'];

$selecionar_img = mysqli_query($conn, "SELECT * FROM pagina WHERE id_edicao = $idedicao");

echo "<h1>Páginas da Edição $nomeedicao</h1>";
echo "<table class='table'>
<tr class='table-title'>
<td>Número da Página</td>
<td>Nome do Arquivo</td>
<td>Excluir</td>
</tr>";
while($row_imagens = mysqli_fetch_assoc($selecionar_img))
{
    $nome_img = $row_imagens['nome_imagem'];
    $pagina_img = $row_imagens['numero_da_pagina'];
    $id_pagina = $row_imagens['id_pagina'];
    echo "<tr>
    <td>$pagina_img</td>
    <td><a href='http://localhost/_crud/foto/$nome_img'>$nome_img</a></td>
    <td><a class='delete' href='http://localhost/_crud/deleteimagem.php?idjornal=$id_jornal&id_pagina=$id_pagina&idedicao=$idedicao&nomeedicao=$nomeedicao'>Excluir</a></td>
    </tr>";
}
echo "</table>";

echo "<p><a href='http://localhost/_crud/edicao.php?id_jornal=$id_jornal'>Voltar</a>";
echo "<p>

<a href='http://localhost/_crud/index.php'>Página Inicial</a>

</p>";
?>

</body>
</html>