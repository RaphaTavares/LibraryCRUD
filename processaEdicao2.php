<?php
    session_start();
    include_once("conexao.php");

    $nome_edicao = filter_input(INPUT_POST, 'nome_edicao', FILTER_SANITIZE_STRING);
    $id_jornal_fk = $_GET['passarid'];
    $data_public = $_POST['data_publi'];

    $codigo_edicao = "INSERT INTO edicao (titulo_edicao, id_jornal, data_publicacao, data_insercao) VALUES ('$nome_edicao', '$id_jornal_fk', '$data_public', NOW())";
    
    $kuery_edicao = mysqli_query($conn, $codigo_edicao);
    
    $num_pag = $_GET['passarid'];

    header("location: http://pare.jf.ifsudestemg.edu.br/biblioteca/_crud/edicao.php?id_jornal=$num_pag");
    ?>