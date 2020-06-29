<?php
include_once('../../controller/conexao.php');



$Id_Jogo = filter_input(INPUT_GET, 'Id_Jogo', FILTER_SANITIZE_NUMBER_INT);
$Time1 = filter_input(INPUT_GET, 'Time1', FILTER_SANITIZE_NUMBER_INT);
$Time2 = filter_input(INPUT_GET, 'Time2', FILTER_SANITIZE_NUMBER_INT);
$GolTime1 = filter_input(INPUT_GET, 'GolTime1', FILTER_SANITIZE_NUMBER_INT);
$GolTime2 = filter_input(INPUT_GET, 'GolTime2', FILTER_SANITIZE_NUMBER_INT);
$Data = filter_input(INPUT_GET, 'Data');
$Local = filter_input(INPUT_GET, 'Local');
$Horario = filter_input(INPUT_GET, 'Horario');
$Campo = filter_input(INPUT_GET, 'Campo');


$procedure = "CALL prc_RemoveJogo('$Id_Jogo', '$Data', '$Horario', '$Local', '$Campo' ,'$Time1',  '$GolTime1',  '$Time2', '$GolTime2');";
$resultado_delet = mysqli_query($conexao, $procedure);


echo mysqli_error($conexao);
if(mysqli_affected_rows($conexao)){

 header('Location: ../vw_formulario.php');
 echo mysqli_error($conexao);

}else{
    echo mysqli_error($conexao);
    
}
?>