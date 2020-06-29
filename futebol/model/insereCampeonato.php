<?php
include_once('../../controller/conexao.php');

$campeonato = $_POST['campeonato'];
$sql = "INSERT INTO campeonato (Nome) values ('$campeonato')";
$salvar = mysqli_query($conexao, $sql);

echo mysqli_error($conexao);
if (mysqli_affected_rows($conexao)) {
    header("Location: ../vw_formulario.php");
} else {
    header("Location: '' ");
}
mysqli_close($conexao);

if ($conexao = die) {
    header("Location: ../index/painel.php");
}