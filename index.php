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

<!--mensagem cadastrado com sucesso ou não -->
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

<!--Create acaba e começa Read -->

<h1>Listar Jornais</h1>
<?php

//receber o numero da pagina

$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

//setar a quantidade de itens por pagina
$qnt_result_pg = 15;

//calcular o inicio da visualização

$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

$codigo_jornais = "SELECT * FROM jornal LIMIT $inicio, $qnt_result_pg";

$kuery_jornais = mysqli_query($conn, $codigo_jornais);

echo"<table class='table'>";
echo"<tr class='table-title'>
<td>ID</td>
<td>Jornal</td>
<td>Data de Upload</td>
<td>Descrição</td>
<td>Excluir</td>
<td>Editar</td>
</tr>";
  while($row_jornais = mysqli_fetch_assoc($kuery_jornais))
  {
    $id_jornal = $row_jornais['id_jornal'];
  echo"<tr>
<td>{$row_jornais['id_jornal']}</td>
<td><a href='http://localhost/_crud/edicao.php?id_jornal=$id_jornal'>{$row_jornais['nome_jornal']}</td></a>
<td>{$row_jornais['data_criacao']}</td>
<td>{$row_jornais['descricao_jornal']}</td>
<td><a class='delete' href='http://localhost/_crud/deletejornal.php?id_jornal=$id_jornal'>Excluir</a></td>
<td><a class='edit' href='http://localhost/_crud/editjornal.php?id_jornal=$id_jornal'>Editar</a></td>
</tr>";
  }
echo"</table>";

//Paginação - Somar a quantidade de jornais

$result_pg = "SELECT COUNT(id_jornal) AS num_result FROM jornal";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
//echo $row_pg['num_result'];

//quantidade de paginas

$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//limitar os links antes e depois

$max_links = 2;

//primeira
echo "<a href='index.php?pagina=1'> Primeira </a>";

//anterior
for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina  -1; $pag_ant++)
{
  if($pag_ant >= 1)
  {
  echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a>";
  }
}

//atual
echo "$pagina";

//posterior
for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++)
{
  if($pag_dep <= $quantidade_pg)
  {
  echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a>";
  }
}

//ultima
echo "<a href='index.php?pagina=$quantidade_pg'> Última </a>";
?>
    </body>
</html>