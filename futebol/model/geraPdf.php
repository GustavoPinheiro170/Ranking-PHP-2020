<?php
include_once('../../controller/conexao.php');

$html = '<table>';
$html .= '<thead style="border:1px solid;">';
$html .= '<tr style="border:1px solid;">';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >Posicao</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >Nome</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >Posicao Antiga</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >Pontos</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >Total Jogos</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >Vitorias</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >Empates</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >Derrotas</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >GolMarcados</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >GolSofridos</td>';
$html .= '<td style="background-color:#28a0dc; color:white; text-align:center; font-size:18px;" >GolSaldo</td>';
$html .= '</tr>';

$consulta  = "SELECT * FROM vw_jogospassados ORDER BY PosicaoAtual DESC";
$resultado = mysqli_query($conexao, $consulta);
$posicao = 1;
while ($row_futebol = $resultado->fetch_array(MYSQLI_NUM)) {

	$html .= '<tr style="border:1px solid; text-align:center;">';
	$html .= '<td style="border:1px solid; text-align:center;">' .  $posicao . '</td>';
	$html .= '<td style="font-weight:600;">' .  $row_futebol[1] . '</td>';
	$html .= '<td>' .  $row_futebol[2] . '</td>';
	$html .= '<td>' . $row_futebol[3] . '</td>';
	$html .= '<td>' . $row_futebol[4] . '</td>';
	$html .= '<td>' . $row_futebol[5] . '</td>';
	$html .= '<td>' . $row_futebol[6] . '</td>';
	$html .= '<td>' . $row_futebol[7] . '</td>';
	$html .= '<td>' . $row_futebol[8] . '</td>';
	$html .= '<td>' . $row_futebol[9] . '</td>';
	$html .= '<td>' . $row_futebol[10] . '</td>';

	$html .='</tr>';
	$posicao ++;
}
$html .= '</thead>';
$html .= '</table>';


//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("../dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();


// Carrega seu HTML
$dompdf->load_html('
			<h1 style="text-align: center;">Tabela Rodada Passada</h1>
			' . $html . '
		');

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
	"Tabela_anterior_Futebol.pdf",
	array(
		"Attachment" => false //Para realizar o download somente alterar para true
	)
);
?>

<style>
	.titleform{
		border:1px;	
		background-color:blue;
		color:white;
	}
	tr{
		border:1px;
	}

</style>