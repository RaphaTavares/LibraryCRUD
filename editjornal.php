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
    
    $idjornal = $_GET["id_jornal"];
    include_once("conexao.php");
    /*
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "jornais";
*/
  //  $conn = mysqli_connect($host,$username,$password,$db) or die("Impossível Conectar"); 
    $kuery_jornal = mysqli_query($conn, "SELECT * FROM jornal WHERE id_jornal = '$idjornal'");

    $row_jornal = mysqli_fetch_assoc($kuery_jornal);

    echo "
    <h2>Jornal Atual</h2>
    <br>
    <table class='table'>
        <tr class='table-title'>
            <td>Jornal</td>
            <td>descricao_jornal</td>
        </tr>
        <tr>
            <td>{$row_jornal['nome_jornal']}</td>
            <td>{$row_jornal['descricao_jornal']}</td>
        </tr>
    </table>

    
    ";

    ?>

    <form method="POST" action="updatejornal.php">
    <?php

    echo "<input type='hidden' name='idjornal' value='$idjornal'>"
    ?>
    <label>nome do jornal: </label>
    <input type="text" name="nome_jornal">
    <br>
    <label>Descrição do jornal: </label>
    <input type="text" name="descricao_jornal"><br><br>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
<button type="submit" value="Cadastrar2" class="btn btn-primary">Atualizar</button>
</form>
    
</body>
</html>