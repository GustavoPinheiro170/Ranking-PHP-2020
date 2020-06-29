<?php
include_once("../../controller/conexaoPoker.php");
$Jogador = $_POST['Jogador'];
$Pontos = $_POST['Pontos'];
$Mes = $_POST['Mes'];
$Torneio = $_POST['Torneio'];
$Bonus = $_POST['Bonus'];
$sql = "CALL prc_InserePartida('$Jogador', $Pontos, '$Mes', '$Bonus')";
$salvar = mysqli_query($conexao, $sql);


echo mysqli_error($conexao);
if (mysqli_affected_rows($conexao)) {
   header("Location: ../formPoker.php");
   echo mysqli_error($conexao);
} else {
    $_SESSION['msg'] = "<p style='color:red;'>A linha não foi apagada</p>";
    //header("Location: '' ");
}
mysqli_close($conexao);

if ($conexao = die) {
    header("Location: ../index/painel.php");
}
