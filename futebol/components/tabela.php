<?php
include_once("../controller/conexao.php");

$consulta  = "SELECT * FROM vw_jogosadm ";
$resultado = mysqli_query($conexao, $consulta);

?>


<main class="page-content">
    <div class='container'>
    <div class="form-group col-md-12">
            <div class='classificacao'> <i class="fas fa-align-center" style='margin-right: 10px;'></i> jogos Cadastrados 
      </div>
            <table class="table  tablemargin ">
            <thead class="thead-dark">
                <tr>
                    <td scope="col"><strong>Data</strong></td>
                    <td scope="col"><strong>Horario</strong></td>
                    <td scope="col"><strong>Campo</strong></td>
                    <td scope="col"><strong>Local</strong></td>
                    <td scope="col"><strong>Time</strong></td>
                    <td scope="col"><strong>Gols</strong></td>
                    <td scope="col"><strong>Gols</strong></td>
                    <td scope="col"><strong>Time</strong></td>
                    <td scope="col"> </td>
                </tr>
                <?php
                while ($row_futebol = $resultado->fetch_array(MYSQLI_NUM)) {
                ?>
                    <tr>
                    <td><?php
                              echo date("d/m/y", strtotime($row_futebol[1]));
                              ?></td>
                        <td><?php
                              echo $row_futebol[2];
                              ?></td>
                        <td><?php
                              echo $row_futebol[3];
                              ?></td>
                        <td><?php
                              echo $row_futebol[4];
                              ?></td>
                        <td><?php
                              echo $row_futebol[6];
                              ?></td>
                        <td><?php
                              echo $row_futebol[7];
                              ?></td>
                        <td><?php
                              echo $row_futebol[8];
                              ?></td>
                        <td><?php
                              echo $row_futebol[10];
                              ?></td>
                     
                        <?php
                        ?>
                        <td><a button class='btn btn-danger' href='../futebol/model/deletar.php?&Id_Jogo=<?php echo $row_futebol[0]; ?>&Time1=<?php echo $row_futebol[5]; ?>&Time2=<?php echo $row_futebol[9]; ?>&GolTime1=<?php echo $row_futebol[7]; ?>&GolTime2=<?php echo $row_futebol[8]; ?>&Data=<?php echo $row_futebol[1]; ?>&Horario=<?php echo $row_futebol[2]; ?>&Campo=<?php echo $row_futebol[3]; ?>&Local=<?php echo $row_futebol[4]; ?> '>Deletar</button></a>
                        </td>
                        <!-- <td><a button class='btn btn-warning' href='../futebol/vw_EditarJogo.php?&Id_Jogo=<?php echo $row_futebol[0]; ?>&Data=<?php echo $row_futebol[1]; ?>&Horario=<?php echo $row_futebol[2]; ?>&Campo=<?php echo $row_futebol[3]; ?>&Local=<?php echo $row_futebol[4]; ?>&Time1=<?php echo $row_futebol[6]; ?>&Gols1=<?php echo $row_futebol[7]; ?>&Gols2=<?php echo $row_futebol[8]; ?>&Time2=<?php echo $row_futebol[10]; ?> '>Alterar</button></a>
                        </td> -->

                    </tr>
                <?php
                }
                ?>
            </thead>
        </table>
    </div>
</main>
<style>
      .tablemargin{
      margin:0;
      padding:0;
}
.table{
      overflow-x: auto;
}
</style>