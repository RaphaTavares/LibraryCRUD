<?php
$servidor = "localhost";
$usuario = "pare";
$senha = "paresisead";
$dbname = "pare";

//Cria a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

//avisa se der erro
    if(!$conn)
    {
        die("Falha na conexao: " . mysqli_connect_error());
    }
    else
    {
        //echo "conexao realizada com sucesso";
    }
?>