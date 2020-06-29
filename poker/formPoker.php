<?php
session_start();
?>
<?php

include_once("../controller/conexaoPoker.php");
$sql = "SELECT * FROM jogadores WHERE torneio = 3";
$resultado = mysqli_query($conexao, $sql);
?>
<head>
<meta charset="utf-8" />
</head>

<link rel="stylesheet" href="../css/style_formpk.css" />
<?php include('../index/header.php'); ?>
<div class='container'>
    <main class="page-content">
        <div class="container">
            <div class="form-group col-md-12">
                <h3 class='titulo'> <i class="fas fa-angle-double-right" style='margin-right: 10px;'></i> Cadastrar Jogo Poker Online</h3>
                <form method='POST' action='model/inserePartida.php'>
                    <input type='text' name='id_jogador' hidden>
                    <div class="row">
                        <div class="col-md-3">
                            <label for='Jogador'> Jogador
                                <select class="custom-select" name="Jogador" id="select">
                                    <?php

                                    while ($row = $resultado->fetch_array()) {
                                        echo "<option ";
                                        echo "value=";
                                        echo $row["id_jogador"];
                                        echo ">";
                                        echo $row['jogador'];
                                        echo "</option>";
                                    }
                                    ?>
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label for='Pontos'> Pontos
                                <input type="number" class="form-control" id='Pontos' name='Pontos' placeholder="Pontos" required><label>
                        </div>
                        <?php
                        $sql = "SELECT * FROM meses";
                        $resultado = mysqli_query($conexao, $sql);
                        ?>
                        <div class="col-md-3">
                            <label for='Mes'> Mês
                                <select class="custom-select" name="Mes" id="select">
                                    <?php

                                    while ($mes = $resultado->fetch_array()) {
                                        echo "<option ";
                                        echo "value=";
                                        echo $mes["id_mes"];
                                        echo ">";
                                        echo $mes['mes'];
                                        echo "</option>";
                                    }
                                    ?>
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label for='Bonus'> Bônus
                                <input type="number" class="form-control" id='Bonus' value='0' name='Bonus' ><label>
                        </div>
                    </div>
                    <div class='row'>
                    <div class="col-md-12">
                        <input class="btn btn-success " type='submit' id='salvar' name="SalvarJogo" value="Salvar" onclick='executar();' />
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-info"  id='Extrair' style='color:white;' name="Extrair" >Extrair Tabela <i class="far fa-file-pdf"></i> </a>
                    </div>
                    </div>
                    <br />
                    <div class="spinner-border text-primary" id='spinner' role="status" style='display:none;'>
                        <span class="sr-only">Loading...</span>
                    </div>
                </form>
    </main>
</div>

<div class='container'>
   <main class="page-content">
      <div class="container">
         <?php
            $sql = "SELECT * FROM nome_prt_online ORDER BY Nome asc Limit 1";
            $resultado = mysqli_query($conexao, $sql);
            $lista = mysqli_fetch_assoc($resultado);
         ?>
         <form method='POST' action='model/insereNomeOnline.php'>
            <div class='row'>
               <div class="col-md-6">
                  <label for='tabela'>Tabela Atual
                     <input type="text" class="form-control" name='tabela' placeholder ='<?php echo $lista['Nome']; ?>'><label>
               </div>
               <div class="col-md-6">
                     <input class="btn btn-success " style='margin-top: 20px;' type='submit' id='camp' name="camp" value="Cadastrar Tabela"  required/>
                  </div>
            </div>
         </form>
   </main>
</div>
<?php
include_once("../controller/conexaoPoker.php");
$sql = "SELECT * FROM vw_partidas";
$resultado = mysqli_query($conexao, $sql);
function position($conexao)
{
    include_once("../controller/conexaoPoker.php");
    $sql = "SELECT * FROM vw_partidas";
    $resultado = mysqli_query($conexao, $sql);
    $row_poker = mysqli_fetch_assoc($resultado);

    $resultPosicao = intval($row_poker['PosicaoAntiga']) - intval($row_poker['PosicaoAtual']);

    if ($resultPosicao == 0) {
        echo "<p>$resultPosicao</p><i  class='fas fa-angle-left'></i>";
    } else if ($resultPosicao > 0) {
        echo "<p>$resultPosicao</p><i style='color:green;' class='fas fa-chevron-up'></i>";
    } else {
        echo "<p>$resultPosicao</p><i style='color:red;' class='fas fa-chevron-down'></i>";
    }
}
?>
<div class='container'>
    <main class="page-content">
        <div class="container">
            <h3 class='classificacao'> <i class="fas fa-medal" style='margin-right: 10px;'></i> Jogadores </h3>
            <table class="table table-responsive tablemargin ">
                <thead class="thead-dark ">
                    <tr>
                        <td class='stlform' scope="col"><strong>Posição Antiga</strong></td>
                        <td class='stlform' scope="col"><strong>Posição Atual</strong></td>
                        <td class='stlform' scope="col"><strong>Jogadores</strong></td>
                        <td class='stlform' scope="col"><strong>Login</strong></td>
                        <td class='stlform' scope="col"><strong>Regional</strong></td>
                        <td class='stlform' scope="col"><strong>JAN</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>FEV</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>MAR</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>ABR</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>MAI</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>JUN</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>JUL</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>AGO</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>SET</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>OUT</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>NOV</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>DEZ</strong>
                            <hr class='colocacao'>Coloc|Pts</td>
                        <td class='stlform' scope="col"><strong>Bônus</strong></td>
                        <td class='stlform' scope="col"><strong>Total</strong></td>
                        <td class='stlform'></td>
                        <td class='stlform'></td>
                    </tr>
                    <?php
                    while ($row_poker = $resultado->fetch_array()) {
                    ?>
                        <tr>
                            <td> <?php
                                    $resultPosicao = intval($row_poker['PosicaoAntiga']) - intval($row_poker['PosicaoAtual']);

                                    if ($resultPosicao == 0) {
                                        echo "<p>$resultPosicao</p><i  class='fas fa-angle-left'></i>";
                                    } else if ($resultPosicao > 0) {
                                        echo "<p>$resultPosicao</p><i style='color:green;' class='fas fa-chevron-up'></i>";
                                    } else {
                                        echo "<p>$resultPosicao</p><i style='color:red;' class='fas fa-chevron-down'></i>";
                                    }
                                    ?></td>
                            <td><?php
                                echo $row_poker['PosicaoAtual'];
                                ?>°</td>
                            <td><?php
                                echo $row_poker['Jogador'];
                                ?></td>
                            <td><?php
                                echo $row_poker['Login'];
                                ?></td>
                            <td><?php
                                echo $row_poker['Regional'];
                                ?></td>
                            <td><?php echo $row_poker['Janeiro']; ?></td>
                            <td><?php echo $row_poker['Fevereiro']; ?></td>
                            <td><?php echo $row_poker['Março']; ?></td>
                            <td><?php echo $row_poker['Abril']; ?></td>
                            <td><?php echo $row_poker['Maio']; ?></td>
                            <td><?php echo $row_poker['Junho']; ?></td>
                            <td><?php echo $row_poker['Julho']; ?></td>
                            <td><?php echo $row_poker['Agosto']; ?></td>
                            <td><?php echo $row_poker['Setembro']; ?></td>
                            <td><?php echo $row_poker['Outubro']; ?></td>
                            <td><?php echo $row_poker['Novembro']; ?></td>
                            <td><?php echo $row_poker['Dezembro']; ?></td>
                            <td><?php echo $row_poker['Bonus']; ?></td>
                            <td style='background-color:beige'><strong><?php
                                                                        echo $row_poker['Total'];
                                                                        ?></strong></td>
                            <td><a button class='btn btn-danger' href=' javascript: if(confirm("Tem certeza que deseja zerar os pontos do jogador <?php //
                                                                                                                                      echo $row_poker['Jogador'];
                                                                                                                                        ?> ? ")) location.href = "model/zeraPartida.php?&Id_Jogador=<?php echo $row_poker['Id_Jogador'];
                                                                                                                                                                                                    ?> ";'>Zerar</button></a>
                            </td>

                        <?php } ?>
            </table>
            </thead>
    </main>
</div>
<script>
    function executar() {
        $.ajax({
            type: 'GET',
            url: 'model/resposta.php',
            beforeSend: function() {
                $('#spinner').show();
            },
            success: function(data) {
                //sucesso
                $('#spinner').text(data);
            },
            error: function() {
                //errp
                console.log('erro');
            },
            complete: function() {
                $('#spinner').hide();

            }
        })
    }
</script>

<style>
    .titletable {
        background-color: #28a0dc;
        color: white;
        padding: 0;
        margin: 0;
    }

    .stlform {
        background-color: #28a0dc;
        color: white;
    }

    .colocacao {
        background-color: white;
        padding: 0;
        margin: 0;
    }

    .tablemargin {
        margin: 0;
        padding: 0;
    }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>