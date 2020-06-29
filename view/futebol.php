<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<link rel="stylesheet" href="css/futebol.css" />
<link rel="stylesheet" href="css/grid.css" />
<html>

<head>
    <title>
        Ranking Futebol
    </title>

</head>

<body>
    <header class='cabecalho'>
        <img src='../img/logo-azul.png' style='filter: brightness(100);' class='logo brightness'> </img>
        <div class='banner'>
            <div class='title'>
                Ranking Futebol
            </div>
        </div>
    </header>
    <?php
    include('../controller/conexao.php');
    $consulta = "SELECT * FROM campeonato ORDER BY Id_Campeonato DESC LIMIT 1";
    $resultado = mysqli_query($conexao, $consulta);
    $camp = mysqli_fetch_assoc($resultado);
    ?>


    <div class='slide-after'></div>
    <div class="container-fluid">
        <div class='row'>
            <div class="col-content">
                <h2 class='text-center'><?php echo $camp['Nome'];?></h2></br>
                <table class="table table-sm">
                    <thead class="thead-dark">

                        <?php
                        include('../controller/conexao.php');
                        // $posicao = 1;
                        $consulta = "SELECT * FROM vw_tabela";
                        $resultado = mysqli_query($conexao, $consulta);
                        ?>
                        <tr>
                            <!--<td scope="col"><strong>Posição</strong></td>-->
                            <td class='center' scope="col"><strong>Posição</strong></td>
                            <td class='center' scope="col"><strong></strong></td>
                            <td scope="col"><strong>Nome</strong></td>
                            <td class='center' scope="col"><strong>P</strong></td>
                            <td class='center' scope="col"><strong>TJ</strong></td>
                            <td class='center' scope="col"><strong>V</strong></td>
                            <td class='center' scope="col"><strong>E</strong></td>
                            <td class='center' scope="col"><strong>D</strong></td>
                            <td class='center' scope="col"><strong>SG</strong></td>
                            <td class='center' scope="col"><strong>GS</strong></td>
                            <td class='center' scope="col"><strong>GM</strong></td>
                        </tr>
                        <?php
                        while ($row_classificacao = $resultado->fetch_array(MYSQLI_NUM)) {
                        ?>
                            <tr>
                                <td class='center classposition'>
                                    <?php echo $row_classificacao[0];
                                    ?>º</td>
                                <td class='center'>
                                    <?php
                                    $resultPosicao = intval($row_classificacao[2]) - intval($row_classificacao[0]);

                                    if ($resultPosicao == 0) {
                                        echo "<p>$resultPosicao</p><i  class='fas fa-angle-left'></i>";
                                    } else if ($resultPosicao > 0) {
                                        echo "<p>$resultPosicao</p><i style='color:green;' class='fas fa-chevron-up'></i>";
                                    } else {
                                        echo "<p>$resultPosicao</p><i style='color:red;' class='fas fa-chevron-down'></i>";
                                    }
                                    ?></td>
                                <td><?php
                                    echo $row_classificacao[1];
                                    ?></td>
                                <td class='position'><?php
                                                        echo $row_classificacao[3];
                                                        ?></td>
                                <td class='center'><?php
                                                    echo $row_classificacao[4];
                                                    ?></td>
                                <td class='comum'><?php
                                                    echo $row_classificacao[5];
                                                    ?></td>5
                                <td class='center'><?php
                                                    echo $row_classificacao[6];
                                                    ?></td>
                                <td class='comum'><?php
                                                    echo $row_classificacao[7];
                                                    ?></td>
                                <td class='center' style='background-color:beige;'><?php
                                                    echo $row_classificacao[10];
                                                    ?></td>
                                <td class='comum'><?php
                                                    echo $row_classificacao[9];
                                                    ?></td>
                                <td class='center'><?php
                                                    echo $row_classificacao[8];
                                                    ?></td>

                            </tr>
                        <?php
                            // $posicao = $posicao + 1; // acumula proxima posicao ate terminar
                        } ?>
                    </thead>
                </table>
                <hr>
                <div class='informacao'>
                    <p><strong> P </strong>- Pontos </p>
                    <p><strong> TJ </strong>- Total de Jogos </p>
                    <p><strong> V </strong>- Vitórias </p>
                    <p><strong> E </strong>- Empates </p>
                    <p><strong> D </strong>- Derrotas </p>
                    <p><strong> GM </strong>- Gols Marcados </p>
                    <p><strong> GS </strong>- Gols Sofrido </p>
                    <p><strong> SG </strong>- Saldo de Gols </p>
                </div>
            </div>



            <div class='col-sidebar'>
                <h2 class='text-center' id='ajax'>Jogos</h2>
                </br>
                <hr>
                <tr>
                    <?php include('../futebol/vw_jogos.php') ?>


            </div>
        </div>
    </div>
</body>
<div style='margin:70px;'></div>

<footer id="footer" class="internal">
    <div class="bottomBox">
        <div class="container">
            <p class="copyright">© AFRESP 2019 | Associação dos Agentes Fiscais de Rendas do Estado de São Paulo</p>
            <ul class="menu-footer">
                <li><a href="https://afresp.org.br/" title="Home">Home </a></li>|
                <li><a href="https://afresp.org.br/estatuto-social-regulamentos" title="Estatuto da Afresp">Estatuto da Afresp </a></li>|
                <li><a href="https://afresp.org.br/mapa-do-site/" title="Mapa do Site">Mapa do Site </a></li>|
                <li><a href="https://correio.afresp.org.br/owa/auth/logon.aspx?url=https://correio.afresp.org.br/owa/&amp;reason=0" target="_blank" title="Webmail">Webmail </a></li>|
                <li><a href="https://erp.afresp.org.br/RM/Rhu-BancoTalentos/#/RM/Rhu-BancoTalentos/home" target="_blank" title="Trabalhe Conosco">Trabalhe Conosco</a></li>
            </ul>
        </div>
    </div>
    </div>
    </div>
    </div>
</footer>

</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="../futebol/js/jquery.2.1.3.min.js"></script>
<script src="../futebol/js/main.js"></script>

<script>


// $(document).ready(function(){
//   $("#btn2").click(function(){
//     $.ajax({url: "futebol.php?pagina=2", success: function(result){
//       $("#ajax").html(result);
//     }});
//   });
// });


</script>
<style>
    h2 {
    font-family: "Montserrat", sans-serif;
    font-size: 33px;
    color: #ff541d;
    font-weight: 900;
    padding: 0px 0 30px 0;
}
</style>