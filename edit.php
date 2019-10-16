
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Atualizar Dados</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>

    <h1>Atualizar Dados</h1>

    <?php

    include_once("conexao.php");
    
    $idedicao = $_GET["idedicao"];
    $id_jornal = $_GET["id_jornal"];
    /* $host = "localhost";
    $username = "pare";
    $password = "paresisead";
    $db = "pare";
*/
    // $conn = mysqli_connect($host,$username,$password,$db) or die("Impossível Conectar"); 
    $kuery_edicao = mysqli_query($conn, "SELECT * FROM edicao WHERE id_edicao = '$idedicao'");
    $row_edicao = mysqli_fetch_assoc($kuery_edicao);

$kuery_jornal = mysqli_query($conn, "SELECT * FROM jornal WHERE id_jornal = {$row_edicao['id_jornal']}");
$row_jornal = mysqli_fetch_assoc($kuery_jornal);
    
    echo "
    <br>
    <table class='table'>
        <tr class='table-title'>
            <td>Jornal</td>
            <td>Titulo Edição</td>
            <td>Data de Publicação</td>
        </tr>
        <tr>
            <td>{$row_jornal['nome_jornal']}</td>
            <td>{$row_edicao['titulo_edicao']}</td>
            <td>{$row_edicao['data_publicacao']}</td>
        </tr>
    </table>

    
    ";

    ?>

    <form method="POST" action="update.php">
    <?php
    
    /* $idedicao = $_GET["idedicao"];
    $host = "localhost";
    $username = "pare";
    $password = "paresisead";
    $db = "pare";

    $conn = mysqli_connect($host,$username,$password,$db) or die("Impossível Conectar"); 
    */
    //$kuery_edicao = mysqli_query($conn, "SELECT * FROM edicao WHERE id_edicao = '$idedicao'");

    //$row_edicao = mysqli_fetch_assoc($kuery_edicao);
    $id_jornal = $row_edicao["id_jornal"];
    $id_edicao = $row_edicao["id_edicao"];
    echo "<input type='hidden' name='idjornal' value='$id_jornal'>
    <input type='hidden' name='idedicao' value='$id_edicao'"
    ?>
    <label>Edição do jornal: </label>
    <select name="select_jornal">
      <option>Selecione</option>
      <?php
        $codigo_jornal = "SELECT * FROM jornal";
        $kuery_jornal = mysqli_query($conn, $codigo_jornal);
        while($row_jornal = mysqli_fetch_assoc($kuery_jornal)){ 
          ?>
      <option value="<?php echo $row_jornal['id_jornal']; ?>"><?php echo $row_jornal['nome_jornal']; ?> </option>
      <?php
        }
      ?>
    </select>
    <br>
    <label>Título da edição: </label>
    <input type="text" name="nome_edicao" placeholder="até 100 caracteres"><br><br>
    <label>Data de publicação: </label>
    <input type="date" name="data_publi">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
<button type="submit" value="Cadastrar2" class="btn btn-primary">Atualizar</button>
</form>
    
</body>
</html>