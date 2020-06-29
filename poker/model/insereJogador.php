<?php
include_once("../../controller/conexaoPoker.php");
$regional = $_POST['regional'];
$jogador = $_POST['jogador'];
$Login = $_POST['Login'];
$Torneio = $_POST['Id_Torneio'];
$sql = "call prc_InsereJogadores('$jogador', '$Login', '$regional','$Torneio')";
$salvar = mysqli_query($conexao, $sql);

echo mysqli_error($conexao);
if (mysqli_affected_rows($conexao)) {
   header("Location: ../formJogadores.php");
   echo mysqli_error($conexao);
} else {
    $_SESSION['msg'] = "<p style='color:red;'>A linha não foi apagada</p>";
    //header("Location: '' ");
}
mysqli_close($conexao);

if ($conexao = die) {
  // header("Location: ../index/painel.php");
}
