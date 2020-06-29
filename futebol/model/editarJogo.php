<?php
include_once('../../controller/conexao.php');


$Id_Jogo = mysqli_real_escape_string($conexao, $_POST['Id_Jogo']);
$Data = mysqli_real_escape_string($conexao, $_POST['Data']);
$Horario = mysqli_real_escape_string($conexao, $_POST['horario']);
$Local = mysqli_real_escape_string($conexao, $_POST['Local']);
$campo = mysqli_real_escape_string($conexao, $_POST['campo']);
$gol1 = mysqli_real_escape_string($conexao, $_POST['golEquipe1']);
$gol2 = mysqli_real_escape_string($conexao, $_POST['golEquipe2']);
$Id_Time1 = mysqli_real_escape_string($conexao, $_POST['Id_Time1']);
$Id_Time2 = mysqli_real_escape_string($conexao, $_POST['Id_Time2']);


$procedure = "CALL prc_AtualizaPlacar_f2('$Id_Jogo', '$Data', '$Horario', '$Local', '$campo', '$Id_Time1', '$gol1', '$Id_Time2', '$gol2')";
$resultado_delet = mysqli_query($conexao, $procedure);

echo mysqli_error($conexao);

if(mysqli_affected_rows($conexao)){

  //header('Location: ../vw_formulario.php');

}else{
    echo mysqli_error($conexao);
    
}
?>