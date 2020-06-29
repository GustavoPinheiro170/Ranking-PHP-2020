<?php
include_once("../../controller/conexaoPoker.php");
$Id_Jogador = filter_input(INPUT_GET, 'Id_Jogador', FILTER_SANITIZE_NUMBER_INT);
$sql = "call prc_ZeraPartida('$Id_Jogador')";
$salvar = mysqli_query($conexao, $sql);

echo mysqli_error($conexao);
if (mysqli_affected_rows ($conexao)){
    echo mysqli_error($conexao);
    sleep(2);
  header("Location: ../formPoker.php");
} else {
  
}

if ($conexao = die) {
    header("Location: ../index/painel.php");
}
