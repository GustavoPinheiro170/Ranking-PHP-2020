<?php
include_once("../../controller/conexaoPoker.php");
$Jogador = $_POST['Jogador'];
$Pontos = $_POST['Pontos'];
$Mes = $_POST['Mes'];
$Torneio = $_POST['Torneio'];
$sql = "CALL prc_InsereRegional('$Jogador', $Pontos, '$Mes')";
$salvar = mysqli_query($conexao, $sql);


echo mysqli_error($conexao);
if (mysqli_affected_rows($conexao)) {
   header("Location: ../PokerRegional.php");
   echo mysqli_error($conexao);
} else {
    $_SESSION['msg'] = "<p style='color:red;'>A linha não foi apagada</p>";
    //header("Location: '' ");
}
mysqli_close($conexao);

if ($conexao = die) {
    header("Location: ../index/painel.php");
}
