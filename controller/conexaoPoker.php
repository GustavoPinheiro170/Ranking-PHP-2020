<?php 

$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "poker";
$conexao = mysqli_connect($host, $usuario, $senha, $bd);
?>
 <?php
if(!$conexao){
echo " Falha na conexão";
}//else
   // echo "Dados enviado com sucesso!"

?>



