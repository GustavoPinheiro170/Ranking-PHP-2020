<?php
session_start();
include('model/verifica_login.php');
include_once("../controller/conexao.php");
include('header.php');
?>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<div id='content'>
   <div class='container'>

      <main class="page-content">
         <div class="row">

            <div class="col-sm-3">
               <div data-aos="flip-up">
                  <div class="card">
                     <div class="card-body text-center">
                        <h5 class="card-title">Futebol</h5>
                        <img src='https://afresp.org.br/wp-content/uploads/2017/11/futebol.png'>
                        <hr>
                        <p class="card-text"></p>
                        <a href="../view/futebol.php" class="btn btn-warning">Visualizar</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div data-aos="flip-up">
                  <div class="card">
                     <div class="card-body text-center">
                        <h5 class="card-title">Poker</h5>
                        <img src='https://afresp.org.br/wp-content/uploads/2017/11/poker.png'>
                        <hr>
                        <p class="card-text"></p>
                        <a href="../view/poker.php" class="btn btn-warning">Visualizar</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div data-aos="flip-up">
                  <div class="card">
                     <div class="card-body text-center">
                        <h5 class="card-title">Corrida</h5>
                        <img src='https://afresp.org.br/wp-content/uploads/2018/04/0093_28032018_corrida-01.png'>
                        <hr>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-warning">Visualizar</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div data-aos="flip-up">
                  <div class="card">
                     <div class="card-body text-center ">
                        <h5 class="card-title">Tênis</h5>
                        <img src='https://afresp.org.br/wp-content/uploads/2017/11/tenis.png'>
                        <hr>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-warning">Visualizar</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
</div>
</br>
<!-- <div class='container'>
   <?php// include('../futebol/components/jogos.php'); ?>
</div> -->
<div class='container'>
   <main class="page-content">
      <div class='row'>

         <div class='col-sm-6 '>
            <?php
            include('../controller/conexao.php');
            $consulta  = "SELECT * FROM vw_partidafutura ORDER BY Data";
            $resultado = mysqli_query($conexao, $consulta);
            ?>

            <input type='hidden' name='id_jogo' id='id_jogo'></input>
            <input type='hidden' name='id_Time1'></input>
            <input type='hidden' name='id_Time2'></input>
            <hr>
            <div class='text-center' style='margin:0; padding: 0'>
               <h6>Próximos Jogos</h6>
            </div>
            <?php
            while ($row_futebol = mysqli_fetch_assoc($resultado)) { ?>
               <hr id="person">
               <div class='data text-center jogosfuturos'>
                  <?php echo date("d/m/y", strtotime($row_futebol['Data'])); ?>
                  <?php echo $row_futebol['Local']; ?>
                  <?php echo $row_futebol['Horario']; ?>
               </div>
               <div class='fundoTime'>
                  <div class='text-center '>
                     <p class='time'><?php echo $row_futebol['Time_int1']; ?> </p>
                     <img class='logotime' src='../futebol/upload/<?php echo $row_futebol['EmblemaTime1']; ?> ' />
                     <p class='vs'> VS </p>
                     <img class='logotime' src='../futebol/upload/<?php echo $row_futebol['EmblemaTime2']; ?> ' />
                     <p class='time'> <?php echo $row_futebol['Time_int2']; ?></p>
                  </div></br>
                  <div class='text-center'>
                     <a button class='btn btn-danger' value='Deletar' href="../futebol/model/DeletarJogoFut.php?&Time1=<?php echo $row_futebol['Id_Time1']; ?>&Time2=<?php echo $row_futebol['Id_Time2']; ?>  ;">Deletar</button></a></div></br>

               </div>

            <?php } ?>
         </div>
         <div class='col-sm-6'>
            <?php
            include('../controller/conexaoPoker.php');
            $consulta = "SELECT * FROM nome_prt_online ORDER BY Nome asc LIMIT 1";
            $resultado = mysqli_query($conexao, $consulta);
            $list = mysqli_fetch_assoc($resultado);
            ?>
            <hr>
            <div class='text-center' style='margin:0; padding: 0'>
               <h6>Poker <?php echo $list['Nome']; ?></h6>
            </div>
            <hr id="person">
            <?php
            include_once("../controller/conexaoPoker.php");
            $sql = "SELECT * FROM vw_partidas LIMIT 10";
            $resultado = mysqli_query($conexao, $sql);
            ?>
            <table class="table tablemargin ">
               <thead class="thead-dark ">
                  <tr>
                     <td class='stlform' scope="col"><strong>Jogadores</strong></td>
                     <td class='stlform' scope="col"><strong>Login</strong></td>
                     <td class='stlform' scope="col"><strong>Pontuação</strong></td>
                  </tr>
                  <?php
                  while ($row_poker = $resultado->fetch_array()) {
                  ?>
                     <tr>
                        <td><?php
                              echo $row_poker['Jogador'];
                              ?></td>
                        <td><?php
                              echo $row_poker['Login'];
                              ?></td>
                        <td style='background-color:beige'><strong><?php
                                                                     echo $row_poker[20];
                                                                     ?></strong></td>
                     </tr>
                  <?php } ?>
            </table>
            </thead>


            <?php
            include('../controller/conexaoPoker.php');
            $consulta = "SELECT * FROM nome_prt_presencial ORDER BY Nome asc LIMIT 1";
            $resultado = mysqli_query($conexao, $consulta);
            $list = mysqli_fetch_assoc($resultado);
            ?>
            <hr>
            <div class='text-center' style='margin:0; padding: 0'>
               <h6>Poker <?php echo $list['Nome']; ?></h6>
            </div>
            <hr id="person">
            <?php
            include_once("../controller/conexaoPoker.php");
            $sql = "SELECT * FROM vw_partidaspresencial ORDER BY Total LIMIT 10";
            $resultado = mysqli_query($conexao, $sql);
            $posicao = 1;
            ?>
            <table class="table tablemargin ">
               <thead class="thead-dark ">
               <tr>
                        <td class='stlform' scope="col"><strong>Colocação</strong></td>
                        <td class='stlform' scope="col"><strong>Jogadores</strong></td>
                        <td class='stlform' scope="col"><strong>Login</strong></td>
                    </tr>
                    <?php
                    while ($row_poker = $resultado->fetch_array()) {
                       
                    ?>
                        <tr>
                            <td><?php
                                echo $posicao;
                                ?>°</td>
                            <td><?php
                                echo $row_poker['Jogador'];
                                ?></td>
                            <td><?php
                                echo $row_poker['Login'];
                                ?></td>
                     
                        <?php
                         $posicao ++; 
                        
                        } 
                        
                        ?>
            </table>
            </thead>



            <?php
            include('../controller/conexaoPoker.php');
            $consulta = "SELECT * FROM nome_prt_regional ORDER BY Nome asc LIMIT 1";
            $resultado = mysqli_query($conexao, $consulta);
            $list = mysqli_fetch_assoc($resultado);
            ?>
            <hr>
            <div class='text-center' style='margin:0; padding: 0'>
               <h6>Poker <?php echo $list['Nome']; ?></h6>
            </div>
            <hr id="person">
            <?php
            include_once("../controller/conexaoPoker.php");
            $sql = "SELECT * FROM vw_partidasregional ORDER BY Total DESC LIMIT 10";
            $resultado = mysqli_query($conexao, $sql);
            $posicao = 1;
            ?>
            <table class="table tablemargin ">
               <thead class="thead-dark ">
               <tr>
                        <td class='stlform' scope="col"><strong>Colocação</strong></td>
                        <td class='stlform' scope="col"><strong>Jogadores</strong></td>
                        <td class='stlform' scope="col"><strong>Pontos</strong></td>
                    </tr>
                    <?php
                    while ($row_poker = $resultado->fetch_array()) {
                       
                    ?>
                        <tr>
                            <td><?php
                                echo $posicao;
                                ?>°</td>
                            <td><?php
                                echo $row_poker['Jogador'];
                                ?></td>
                            <td><?php
                                echo $row_poker['Total'];
                                ?></td>
                     
                        <?php
                         $posicao ++; 
                        
                        } 
                        
                        ?>
            </table>
            </thead>
         </div>
      </div>

</div>



</main>
</div>
</div>
</main>
<script type="text/javascript" href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
<script type='text/javascript' src="../js/main.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
   var delay = 500; //1 seconds
   setTimeout(function() {
      AOS.init();
   }, delay);
</script>
<style>
   .logotime {
      width: 50px;
      height: 50px;
      margin-top: 8px;

   }

   .fundoTime {
      background-color: #F5F5F5;
      position: relative;
      margin: 0px;
      padding: 0px;
      border-radius: 15px 10px 15px;

   }

   .data {
      font-size: 18px;
      font-weight: bold;
      color: #ff541d;
      font-family: opensans;
      margin: 5px;
   }

   .btn-warning {
      color: white;
   }

   .vs {
      font-size: 30px;
      font-weight: bold;
      color: #ff541d;
   }

   .time {
      font-size: 20px;
      font-weight: bold;
      display: inline;
      margin: 10px;
      font-family: opensans;


   }

   .jogosfuturos {
      background-color: #28a0dc;
      color: white;


   }

   .stlform {
      background-color: #28a0dc;
      color: white;
   }


   .btn-warning:hover {
      color: white;
   }

   body {
      font-family: "Montserrat", sans-serif;
   }

   img {
      width: 50px;
      height: 50px;
      align-items: center;
      margin: 0px;
      padding: 0;
      margin-top: -30px;
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

   #content {
      background-color: #28a0dc;
      height: 220px;
   }

   @media(max-width: 992px) {
      #content {
         background-color: blue;
         height: auto;
      }


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

   .svg {
      width: 20px;
      height: 21px;
      margin: 3px;
      display: inline-block;
      font-style: normal;
      font-variant: normal;
      text-rendering: auto;
      line-height: 1;
   }

   .card {
      display: block;

      padding: 10px;
      border-radius: 15px;

   }

   h5 {
      font-family: "Montserrat", sans-serif;
      font-size: 30px;
      color: #ff541d;
      font-weight: 900;
      padding: 0px 0 30px 0;
   }

   h6 {
    font-family: "Montserrat", sans-serif;
    font-size: 23px;
    color: #ff541d;
    font-weight: 700;
    padding: 10px 0 10px 0;
    border: 1px solid;
    border-radius: 15px;
   }
</style>