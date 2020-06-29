<?php
session_start();
include_once("../controller/conexao.php");
include('../index/model/verifica_login.php');
?>
<?php include('../index/header.php'); ?>
<link rel="stylesheet" href="../css/style_form.css" />
<div class='container'>
   <main class="page-content">
      <div class="container-fluid">
         <?php include('components/rodada.php'); ?>
         <?php
         $consulta  = "SELECT * FROM vw_jogosadm ";
         $resultado = mysqli_query($conexao, $consulta);
         ?>
         <div class="form-group col-md-12">
            <h3 class='classificacao'> <i class="fas fa-align-center" style='margin-right: 10px;'></i> Tabela Jogos </h3>

            <table class="table  tablemargin">
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
                     </tr>
                  <?php
                  }
                  ?>
               </thead>
            </table>
         </div>
      </div>
   </main>
</div>
<div class='container'>
   <?php include('components/jogos.php'); ?>
</div>