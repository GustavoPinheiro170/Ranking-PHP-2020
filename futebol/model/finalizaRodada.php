<?php 
session_start();


include_once('../../controller/conexao.php');

$procedure = "Call prc_FinalizaRodada";
$resultado_delet = mysqli_query($conexao, $procedure);

 echo mysqli_error($conexao);

if(mysqli_affected_rows($conexao)){
header ('Location: ../vw_tabela.php');
}
