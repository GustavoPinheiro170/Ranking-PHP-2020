<?php
include_once("../../controller/conexaoPoker.php");


$id_partida = filter_input(INPUT_GET, 'id_partida_futura',FILTER_SANITIZE_NUMBER_INT);
$sql = "DELETE FROM partida_futura WHERE id_partida_futura = '$id_partida'";
$salvar = mysqli_query($conexao, $sql);



if (mysqli_affected_rows ($conexao)){
    echo mysqli_error($conexao);
   // sleep(2);
    header("Location: ../formTorneioFuturo.php");
} else {
  
}

if ($conexao = die) {
    header("Location: ../index/painel.php");
}
