<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Página Principal</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        
            
<!-- Button trigger modal JORNAL -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Cadastrar Jornal
</button>

<!-- mensagem cadastrado com sucesso ou não -->
<?php
if(isset($_SESSION['msg']))
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
?>

<!-- Modal JORNAL -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Jornal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!--Corpo do Modal JORNAL -->
        
        <form method="POST" action="processa.php">
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Digite o nome do jornal"><br><br>
            <label>Descrição: </label>
            <input type="text" name="descricao" placeholder="Descrição do jornal"><br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="Cadastrar" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal EDIÇÃO -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong2">
  Cadastrar Edição de um jornal
</button>

<!-- Modal EDIÇÃO -->
<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Edição</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!--Corpo do Modal EDIÇÃO -->
        
        <?php 
        $passarid = $_GET["id_jornal"];

        echo "<form method='POST' action='processaEdicao2.php?passarid=$passarid'> "
        ?>
            <label>Título da edição: </label>
            <input type="text" name="nome_edicao" placeholder="até 100 caracteres"><br><br>
            <label>Data de publicação: </label>
            <input type="date" name="data_publi">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="Cadastrar2" class="btn btn-primary">Cadastrar</button>
        </form> 
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal INSERIR -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong3">
  Inserir Imagem de Edição
</button>
<!-- Modal INSERIR -->
<div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Inserir Imagem no Banco</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!--Corpo do Modal INSERIR -->
<?php
$passarid = $_GET["id_jornal"];
?>
<form action="processaUpload.php" method="POST" enctype="multipart/form-data">

<label>Página da edição: </label>
            
            <select name="select_edicao">
              <option>Selecione</option>
              <?php
                $codigo_edicao2 = "SELECT * FROM edicao WHERE id_jornal = '$passarid'";
                $kuery_edicao2 = mysqli_query($conn, $codigo_edicao2);
                while($row_edicao2 = mysqli_fetch_assoc($kuery_edicao2)){ 
                  ?>
              <option value="<?php echo $row_edicao2['id_edicao']; ?>"><?php echo $row_edicao2['titulo_edicao']; ?> </option>
              <?php
                }
              ?>
            </select>
            <br>
            <label>número da página: </label>
            <input type="number" name="numero_da_pagina"> <br><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="31457280‬">
            <label>Imagem da página:<input type="file" name="userfile"></label>
            <?php
            echo "<input type='hidden' name='id_jornal' value='$passarid'>"
            ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="Cadastrar2" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Create acaba e começa Read -->

<?php 
$codigo_jornal = "SELECT * FROM jornal WHERE id_jornal = '$passarid'";
$Kuery_jornal = mysqli_query($conn, $codigo_jornal);
$row_jornal = mysqli_fetch_assoc($Kuery_jornal);


?>
<h1><?php echo "Edições do {$row_jornal['nome_jornal']}"; ?></h1>

<?php

//receber o numero da pagina

$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

//setar a quantidade de itens por pagina
$qnt_result_pg = 15;

//calcular o inicio da visualização

$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

$codigo_edicao = "SELECT * FROM edicao WHERE id_jornal = '$passarid' LIMIT $inicio, $qnt_result_pg";
$kuery_edicao = mysqli_query($conn, $codigo_edicao);

echo"<table class='table'>";
echo"<tr class='table-title'>
<td>ID </td>
<td>Edição</td>
<td>Data de publicação</td>
<td>Editar</td>
<td>Excluir</td>
</tr>";
  while($row_edicao = mysqli_fetch_assoc($kuery_edicao))
  {
    $idedicao = $row_edicao['id_edicao'];
    $nomeedicao = $row_edicao['titulo_edicao'];
  echo"<tr>
<td>{$row_edicao['id_edicao']}</td>
<td><a class='imagens' href='http://localhost/_crud/imagens.php?idedicao=$idedicao&nomeedicao=$nomeedicao&idjornal=$passarid'>{$row_edicao['titulo_edicao']}</a></td>
<td>{$row_edicao['data_publicacao']}</td>
<td><a class='delete' href='http://localhost/_crud/delete.php?idedicao=$idedicao'>Excluir</a></td>
<td><a class='edit' href='http://localhost/_crud/edit.php?idedicao=$idedicao'>Editar</a></td>
</tr>";
  }
echo"</table>";



//Paginação - Somar a quantidade de edições

$result_pg = "SELECT COUNT(id_edicao) AS num_result FROM edicao";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
//echo $row_pg['num_result'];

//quantidade de paginas

$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//limitar os links antes e depois

$max_links = 2;

//primeira
echo "<a href='edicao.php?id_jornal=$passarid&pagina=1'> Primeira </a>";

//anterior
for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina  -1; $pag_ant++)
{
  if($pag_ant >= 1)
  {
  echo "<a href='edicao.php?id_jornal=$passarid&pagina=$pag_ant'>$pag_ant</a>";
  }
}

//atual
echo "$pagina";

//posterior
for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++)
{
  if($pag_dep <= $quantidade_pg)
  {
  echo "<a href='edicao.php?id_jornal=$passarid&pagina=$pag_dep'>$pag_dep</a>";
  }
}

//ultima
echo "<a href='edicao.php?id_jornal=$passarid&pagina=$quantidade_pg'> Última </a>";
?>

<!--mensagem deletado com sucesso ou não -->
<?php
if(isset($_SESSION['msg']))
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
?>

  <p><a href="index.php">Página Inicial</a></p>
    </body>
</html>