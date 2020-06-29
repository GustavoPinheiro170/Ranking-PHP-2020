<?php
include_once("../controller/conexao.php");
$consulta  = "SELECT * FROM vw_tabela";
$resultado = mysqli_query($conexao, $consulta);
$posicao = 1;
?>

<main class="page-content">
<div class="container">
<h3 class='classificacao'> <i class="fas fa-medal" style='margin-right: 10px;'></i> Ranking Jogos </h3>
<table class="table table-responsive tablemargin">
   <thead class="thead-dark">
      <tr >
         <td class='titletable' scope="col"><strong>Posição</strong></td>
         <td class='titletable' scope="col"><strong>Nome</strong></td>
         <td class='titletable' scope="col"><strong>Pontos</strong></td>
         <td class='titletable' scope="col"><strong>Total Jogos</strong></td>
         <td class='titletable' scope="col"><strong>Vitorias</strong></td>
         <td class='titletable' scope="col"><strong>Empates</strong></td>
         <td class='titletable' scope="col"><strong>Derrotas</strong></td>
         <td class='titletable' scope="col"><strong>Gols Marcados</strong></td>
         <td class='titletable' scope="col"><strong>Gols Sofridos</strong></td>
         <td class='titletable' scope="col"><strong>Saldo Gols</strong></td>
      </tr>
      <?php
      while ($row_classificacao = $resultado->fetch_array(MYSQLI_NUM)) {
      ?>
         <tr>
            <td class='stlform' ><?php echo $row_classificacao[0];
                  ?>º</td>
            <td><strong><?php
                  echo $row_classificacao[1];
                  ?></strong></td>
            <td><?php
                  echo $row_classificacao[3];
                  ?></td>
            <td><?php
                  echo $row_classificacao[4];
                  ?></td>
            <td><?php
                  echo $row_classificacao[5];
                  ?></td>
            <td><?php
                  echo $row_classificacao[6];
                  ?></td>
            <td><?php
                  echo $row_classificacao[7];
                  ?></td>
            <td><?php
                  echo $row_classificacao[8];
                  ?></td>
            <td><?php
                  echo $row_classificacao[9];
                  ?></td>
             <td><?php
                  echo $row_classificacao[10];
                  ?></td>
         </tr>
      <?php
         $posicao = $posicao + 1; // acumula proxima posicao ate terminar
      } ?>
   </thead>
</table>


<style>

.titletable{
      background-color:#28a0dc; 
      color:white;
      padding:0;
      margin:0;
}

.tablemargin{
      margin:0;
      padding:0;
}
.stlform{
      color:gray;
      font-size:20px;
}


.colocacao{
    background-color:white;
    padding:0; 
    margin:0;
}



</style>
