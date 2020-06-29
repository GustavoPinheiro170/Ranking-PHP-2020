<?php
include_once('../../controller/conexao.php');


$Nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$Id_Time = mysqli_real_escape_string($conexao, $_POST['Id_Time']);
$Emblema = mysqli_real_escape_string($conexao, $_POST['emblema']);

$procedure = "Call prc_AtualizaTime('$Id_Time', '$Nome','$Emblema')";
$resultado_delet = mysqli_query($conexao, $procedure);

echo mysqli_error($conexao);

if(mysqli_affected_rows($conexao)){
header('Location: ../vw_formulario.php');

}else{
    echo "<script type='javascript'>alert('Não é possível editar times já cadastrados');";
    echo "javascript:window.location='../vw_formulario.php';</script>";
}
?>