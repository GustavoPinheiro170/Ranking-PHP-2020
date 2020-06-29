<?php 
session_start();


include_once('../../controller/conexao.php');

$Id_Jogo = filter_input(INPUT_GET, 'id_jogo', FILTER_SANITIZE_NUMBER_INT);
$Time1 = filter_input(INPUT_GET, 'Time1', FILTER_SANITIZE_NUMBER_INT);
$Time2 = filter_input(INPUT_GET, 'Time2', FILTER_SANITIZE_NUMBER_INT);

$deletar = "DELETE FROM partidafutura WHERE Time1 ='$Time1'";
echo mysqli_error($conexao);
$resultado_delet = mysqli_query($conexao, $deletar);

header('Location: ../../index/painel.php');

// if(mysqli_affected_rows($conexao)){
//     echo ("<SCRIPT LANGUAGE='JavaScript'>
// window.alert('Coluna apagada com sucesso')
// window.location.href='../tabela.php';
// </SCRIPT>");
// }

?>