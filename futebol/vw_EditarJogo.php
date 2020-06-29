<?php
session_start();

include_once("../controller/conexao.php");


$Id_Jogo = filter_input(INPUT_GET, 'Id_Jogo', FILTER_SANITIZE_NUMBER_INT);
$Data = filter_input(INPUT_GET, 'Data');
$Horario = filter_input(INPUT_GET, 'Horario');
$Local =filter_input(INPUT_GET, 'Local');
$Time1 = filter_input(INPUT_GET, 'Equipe 1');
$gol1 = filter_input(INPUT_GET, 'GolTime1');
$gol2 =filter_input(INPUT_GET, 'GolTime2');
$campo =filter_input(INPUT_GET, 'campo');
$Time2 = filter_input(INPUT_GET, 'Equipe 2');
$Id_Time1 =filter_input(INPUT_GET, 'Id_Time1');
$Id_Time2 = filter_input(INPUT_GET, 'Id_Time2');
$Id_Rodada = filter_input(INPUT_GET, 'Id_Rodada');

$consulta = "SELECT * FROM vw_JogosAdm WHERE Id_Jogo ='$Id_Jogo'";
$resultado_jogo = mysqli_query($conexao, $consulta);
$edit_jogo = mysqli_fetch_assoc($resultado_jogo);
?>

<?php include('../index/header.php'); ?>
<link rel="stylesheet" href="../css/style_form.css" />
<div class='container'>
   <main class="page-content">
      <div class="container">
         <div class="form-group col-md-12">
            <h3 class='titulo'> <i class="fas fa-angle-double-right" style='margin-right: 10px;'></i> Alterar tabela Futebol </h3>
            <form method='POST' action='model/EditarJogo.php'>
               <div class="row">
                  <input type="hidden" class="form-control" name='Id_Time2' value='<?php echo $edit_jogo['Id_Time2']; ?>' />
                  <input type="hidden" class="form-control" name='Id_Time1' value='<?php echo $edit_jogo['Id_Time1']; ?>'  />
                  <input type="hidden" class="form-control" name='Id_Jogo' value='<?php echo $edit_jogo['Id_Jogo'] ?>' />
                  <input type="hidden" class="form-control" name='Id_Rodada' />
                  <div class="col-md-3 ">
                     <label for='data'> Data
                        <input type="date" class="form-control" name='Data' placeholder="Data" value ='<?php echo $edit_jogo['Data']; ?>'required><label>
                  </div>
                  <div class="col-md-3 ">
                     <label for='horario'> Horario
                        <input type="text" class="form-control" id='horario' name='horario' placeholder="hh:mm:ss" value ='<?php echo $edit_jogo['Horario'] ?>' required><label>
                  </div>
                  <div class="col-md-3">
                     <label for='local'> Local
                        <input type="text" class="form-control" name='Local' placeholder="Local" value ='<?php echo $edit_jogo['Local'] ?>'required> <label>
                  </div>
                  <div class="col-md-3">
                     <label for='campo'> Campo do jogo
                        <input type="number" class="form-control" name='campo' placeholder="Campo" value ='<?php echo $edit_jogo['Campo'] ?>' required><label>
                  </div>
               </div>
               <br />
               <div class="row">
                  <div class="col-md-4">

                     <label for='Time1'> Time 1
                     <input type="text" class="form-control" name='Time1' placeholder="" value ='<?php echo $edit_jogo['Equipe 1']; ?>' disabled><label>    
                     </label>
                  </div>
                  <div class="col-md-2">
                     <label for='placar'> Placar
                        <input type="number" class="form-control" name='golEquipe1' placeholder="" value ='<?php echo $edit_jogo['GolTime1']; ?>' required> <label>
                  </div>VS
                  <div class="col-md-2">
                     <label for='placar2'> Placar
                        <input type="number" class="form-control" name='golEquipe2' placeholder=" "  value ='<?php echo $edit_jogo['GolTime2']; ?>' required><label>
                  </div>
                  <div class="col-md-3">
                  <label for='Time1'> Time 2
                     <input type="text" class="form-control" name='Time2' placeholder="" value ='<?php echo $edit_jogo['Equipe 2']; ?>' disabled><label>    
                     </label>
                     </label>
                  </div>
               </div>
               <div class='row'>
                  <div class="col-12 text-center">
                     <input class="btn btn-success " type='submit' id='salvar' name="SalvarJogo" value="Salvar" />
                  </div>
             </div>
       </form>
   </main>
</div>
<style>
   .imgTime {
      width: 50px;
      height: 50px;
   }

   form {
      padding: 20px;
      align-items: center;
      text-align: center;
      border: solid 1px #ccd0d4;
      border-radius: 2px;
      background: rgb(255, 255, 255);

      color: black;
      font-family: "Montserrat", sans-serif;
      font-size: 15px;
   }

   .titulo {
      text-align: left !important;
      font-size: 20px;
      color: white;
      background: #167bea;
      border: 2px solid;
      padding: 5px;
      margin: 0px;
      border-radius: 10px 10px 0px 1px;
      width: 100%;
   }

   .classificacao {
      text-align: left !important;
      font-size: 20px;
      color: white;
      background: #4cc065;
      border: 2px solid;
      padding: 5px;
      margin: 0px;
      border-radius: 10px 10px 0px 1px;
      width: 100%;
   }

   body {
      font-family: "Montserrat", sans-serif;
   }

   table {
      padding: 20px;
      align-items: center;
      text-align: center;
      border: solid 1px #ccd0d4;
      border-radius: 2px;
      color: black;
      font-family: "Montserrat", sans-serif;
      font-size: 15px;
   }

   td {
      margin: 10px;
      padding: 10px;
   }

   tbody {
      margin-left: 10px;
   }

   .btn {
      color: white;
   }
</style>