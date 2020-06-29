<?php
include_once('../../controller/conexao.php');

$data =  date('Ymd', strtotime($_POST['data']));
$horario = $_POST['horario'];
$local = $_POST['local'];
$campo = $_POST['campo'];
$equipe1 = $_POST['equipe1'];
$golEquipe1 = $_POST['golEquipe1'];
$golEquipe2 = $_POST['golEquipe2'];
$equipe2 = $_POST['equipe2'];

if ($equipe1 == $equipe2) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Times semelhantes, favor verificar e tentar novamente!')
    window.location.href='../vw_formulario.php';
    </SCRIPT>");
    exit();
}

$sql = "CALL prc_InserePlacar($data, '$horario', '$local', '$campo', $equipe1, $golEquipe1, $equipe2, $golEquipe2)";
$salvar = mysqli_query($conexao, $sql);

echo mysqli_error($conexao);
if (mysqli_affected_rows($conexao)) {
    header("Location: ../vw_formulario.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>A linha não foi apagada</p>";
    header("Location: '' ");
}
mysqli_close($conexao);

if ($conexao = die) {
    header("Location: ../index/painel.php");
}
