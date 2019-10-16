<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

<?php
    include_once("conexao.php");
    $id_jornal = $_POST['id_jornal'];
    $numero_da_pagina = $_POST['numero_da_pagina'];

    $id_edicao = $_POST['select_edicao'];

    $nome_final = $_FILES['userfile']['name'];
    $codigokuery = "INSERT INTO pagina(nome_imagem, numero_da_pagina, id_edicao) VALUES ('$nome_final', '$numero_da_pagina', '$id_edicao')";
    
$uploaddir = './foto/';

$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $kuery = mysqli_query($conn, $codigokuery);
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/_crud/edicao.php?id_jornal=$id_jornal'>";
} else {
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/_crud/index.php'>";
    echo "<script>
       alert(\'A imagem não foi cadastrada com sucesso.\');
   </script>";
}

?>
</body>
</html>