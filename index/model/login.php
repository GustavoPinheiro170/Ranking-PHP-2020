<?php
session_start();

include_once('../../controller/conexao.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {

    header('Location: index.php');
    exit();
}
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$query = "SELECT id_usuario, usuario FROM usuario WHERE usuario = '{$usuario}' and senha = md5('{$senha}')";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
if ($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: ../painel.php');
} else {
    $_SESSION['Nao_autenticado'] = true;
    header("Location: ../index.php");
    exit();
}
