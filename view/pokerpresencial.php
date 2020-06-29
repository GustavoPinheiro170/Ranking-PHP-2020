<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="css/main.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<script src="https://kit.fontawesome.com/ec56134eac.js" crossorigin="anonymous"></script>
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../../assets/css/demo.css" rel="stylesheet" />
<link rel="stylesheet" href="css/grid.css" />
<link rel="stylesheet" href="css/poker.css" />
<link rel="stylesheet" href="css/style_form.css" />

<head>
    <title>
        Ranking Poker
    </title>
    <meta charset="utf-8" />
</head>
<html>

<header class='cabecalho'>
    <img src='../img/logo-azul.png' style='filter: brightness(100);' class='logo brightness'> </img>
    <div class='banner'>
        <div class='title'>
            Ranking Poker
        </div>
    </div>
</header>

<body>
    <?php
    include('../controller/conexaoPoker.php');
    $consulta = "SELECT * FROM nome_prt_presencial ORDER BY id_nomePresencial DESC LIMIT 1";
    $resultado = mysqli_query($conexao, $consulta);
    $list = mysqli_fetch_assoc($resultado);
    ?>

    <div class='slide-after'></div>
    <div class="container">
        <div class='row'>
            <div class="container-fluid">
                <h2 class='text-center'>Poker <?php echo $list['Nome']; ?> </h2></br>



                <?php
                include('../controller/conexaoPoker.php');
                $sql = "SELECT * FROM vw_partidaspresencial ORDER BY Total ";
                $resultado = mysqli_query($conexao, $sql);
                $posicao = 1;
                header('Content-Type: text/html; charset=utf-8');
                function position($conexao)
                {
                    include('../controller/conexaoPoker.php');
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


                <table class="table table-sm ">
                    <thead class="thead-dark">
                        <tr>
                            <td class='stlform titleTabel' scope="col"><strong>Colocação</strong></td>
                            <td class='stlform titleTabel' scope="col"><strong>Jogadores</strong></td>
                            <td class='stlform titleTabel' scope="col"><strong>Login</strong></td>


                        </tr>
                        <?php
                        while ($row_poker = $resultado->fetch_array()) {
                        ?>
                            <tr>
                            <td class='position'><?php
                                echo $posicao;
                                ?>°</td>
                            <td class='itens'><?php
                                echo $row_poker['Jogador'];
                                ?></td>
                            <td class='itens'><?php
                                echo $row_poker['Login'];
                                ?></td>
                        </tr>
                        <?php
                         $posicao ++; 
                        
                        } 
                        
                        ?>
            </table>
            </thead>
            </div>
            <hr>
            <div class='container'>


                <div class='informacao'>
                    <!-- <p><strong> P </strong>- Pontos </p>
                    <p><strong> TJ </strong>- Total de Jogos </p>
                    <p><strong> V </strong>- Vitórias </p>
                    <p><strong> E </strong>- Empates </p>
                    <p><strong> D </strong>- Derrotas </p>
                    <p><strong> GM </strong>- Gols Marcados </p>
                    <p><strong> GS </strong>- Gols Sofrido </p>
                    <p><strong> SG </strong>- Saldo de Gols </p> -->
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class='row'>
            <div class='col-sm-6'>
                <div class='card-3'>
                    <?php
                    include('../controller/conexaoPoker.php');
                    $consulta = "SELECT * FROM nome_prt_online ORDER BY id_nomeRegional DESC LIMIT 1";
                    $resultado = mysqli_query($conexao, $consulta);
                    $list = mysqli_fetch_assoc($resultado);
                    ?>
                    <p class='card-text'>Poker <?php echo $list['Nome']; ?></p>
                    <a href='poker.php'><button class='btn btn.yellow'>Ver mais <i class="fas fa-plus"></i></button></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class='card-2'>
                    <?php
                    include('../controller/conexaoPoker.php');
                    $consulta = "SELECT * FROM nome_prt_regional ORDER BY id_nomerEGIONAL DESC LIMIT 1";
                    $resultado = mysqli_query($conexao, $consulta);
                    $list = mysqli_fetch_assoc($resultado);
                    ?>
                    <p class='card-text'>Poker <?php echo $list['Nome']; ?></p>
                    <a href='pokerregional.php'><button class='btn btn.yellow'>Ver mais <i class="fas fa-plus"></i></button></a>
                    

                </div>
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


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="js/jquery.2.1.3.min.js"></script>

<style>
    .stlform{
        font-size:20px;
        text-align:center;
    }
    .itens{
    font-size: 20px;
    text-align: center;
    border: 1px solid ;
    border-color: #fff4;
    }
    .position{
    font-size: 26px;
    align-items: center;
    text-align: center;
    font-weight: 400;
    }
    .h5 {
        font-size: 20px;
    }

    .resultTabel {
        background-color: #f8f5ff;
    }

    .positAtual {
        background: cadetblue;
        color: white;

    }

    .titleTabel {
        background: #06324F;
        color: white;
    }

    .card-1 {
        position: relative;
        width: 400px;
        height: 300px;
        border-radius: 10px;
        background:
            linear-gradient(rgba(0, 0, 191, 0.67), rgba(0, 0, 0, 0.63)),
            url("../img/card1.jpg") no-repeat;
        background-size: cover;
        margin: 20px;
        transition-property: width, height, border;
        transition-duration: 0.5s;
    }

    .card-2 {
        position: relative;
        width: 400px;
        height: 300px;
        border-radius: 10px;
        background:
            linear-gradient(rgba(0, 0, 191, 0.67), rgba(0, 0, 0, 0.63)),
            url("../img/card2.jpg") no-repeat;
        background-size: cover;
        margin: 20px;
        transition-property: border;
        transition-duration: 0.2s;
    }

    .card-3 {
        position: relative;
        width: 400px;
        height: 300px;
        border-radius: 10px;
        background:
            linear-gradient(rgba(0, 0, 191, 0.67), rgba(0, 0, 0, 0.63)),
            url("../img/card3.jpg") no-repeat;
        background-size: cover;
        margin: 20px;
        transition-property: border;
        transition-duration: 0.2s;

    }

    .card-1:hover {
        border: 3px solid #ffc801;
    }

    .card-2:hover {
        border: 3px solid #ffc801;
    }

    .btn.yellow {
        border: 1px solid #ffc801;
        color: white;
        background-color: #ffc801;
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 30%
    }

    .btn {
        transition: all 0.3s ease 0s;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        display: inline-block;
        border: 1px solid #ffffff;
        border-radius: 20px;
        padding: 13px 43px 13px 33px;
        background: transparent;
        font-family: "Folio BT Medium", sans-serif;
        font-size: 12px;
        color: #ffffff;
        text-transform: uppercase;
        margin-left: 3%;
        margin-right: 30%;
        margin-top: 40%;

    }

    @media (max-width: 980px) {
        .btn {
            font-size: 1.94375vw;
            margin-top: 60%;
        }
        .btn.yellow {
            margin-bottom: 1px;
            border: 1px solid #ffffff;
            border-radius: 20px;
            padding: 2.47396vw 8.46354vw 2.47396vw 6.51042vw;
            font-size: 2.34375vw;
        }
        
    }

    .btn:hover {
        color: white;
        background-color: #ffc801;
        border-color: #ffc801;
    }

    @media(min-width:800px) {
        .card-1 {
            width: 100%;
            height: 300px;

        }

        .card-2 {
            width: 100%;
            height: 300px;
        }

        .card-3 {
            width: 100%;
            height: 300px;
        }

        .card-text {
            font-size: 40px !important;
        }


    }

    .card-button {
        background-color: #ffc801;
        margin-left: 30;
        margin-right: 30;
        margin-top: 30%;
        font-size: 18px;
        width: 100px;
        height: 30px;
        color: white;
        border-radius: 5px;
    }

    .card-text {
        position: absolute;
        font-size: 30px;
        text-align: center;
        color: #ffc801;
        font-weight: 700;
    }
</style>