<?php
include_once("../../controller/conexaoPoker.php");
$Data = date('Ymd', strtotime($_POST['Data']));
$Local = $_POST['Local'];
$Torneio = $_POST['Torneio'];
$sql = "INSERT INTO  partida_futura (Data,Local,Torneio) VALUES ('$Data', '$Local', '$Torneio')";
$salvar = mysqli_query($conexao, $sql);


echo mysqli_error($conexao);
if (mysqli_affected_rows($conexao)) {
   header("Location: ../formTorneioFuturo.php");
   echo mysqli_error($conexao);
} else {
    $_SESSION['msg'] = "<p style='color:red;'>A linha não foi apagada</p>";
    //header("Location: '' ");
}
mysqli_close($conexao);

if ($conexao = die) {
    header("Location: ../index/painel.php");
}
