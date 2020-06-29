<?php
include_once('../../controller/conexaoPoker.php');

$tabela = $_POST['tabela'];
$sql = "INSERT INTO Nome_prt_Regional (Nome) values ('$tabela')";
$salvar = mysqli_query($conexao, $sql);

echo mysqli_error($conexao);
if (mysqli_affected_rows($conexao)) {
    header("Location: ../PokerRegional.php");
} else {
    header("Location: '' ");
}
mysqli_close($conexao);

if ($conexao = die) {
    header("Location: ../index/painel.php");
}