<?php 
session_start();

include_once('../../controller/conexao.php');


$Id_Time = filter_input(INPUT_GET, 'Id_Time', FILTER_SANITIZE_NUMBER_INT);
$procedure = "Call prc_RemoveTime('$Id_Time')";
$resultado_delet = mysqli_query($conexao, $procedure);

echo mysqli_error($conexao);

if(mysqli_affected_rows($conexao)){
    header('Location: ../vw_formulario.php');

}else{

}