<?php
session_start();
include('../index/model/verifica_login.php');
include_once("../controller/conexao.php");
function Listartimes($conexao)
{
    include_once("../controller/conexao.php");

    $sql = "SELECT * FROM times";
    $resultado = mysqli_query($conexao, $sql);
    $time = array();
    while ($item = mysqli_fetch_assoc($resultado)) {
        $time[] = $item;
    }
    return $time;
}
$times = Listartimes($conexao);
?>
<?php include('../index/header.php'); ?>

<div class='container'>
    <main class="page-content">
        <div class="container">
            <div class="form-group col-md-12">
                <h3 class='titulo'> <i class="fas fa-angle-double-right" style='margin-right: 10px;'></i> Cadastro Futebol </h3>

                <form method='POST' action='model/insereJogo.php'>
                    <div class="row">
                        <input type="hidden" class="form-control" name='Id_Time' placeholder="Id_Time" />
                        <input type="hidden" class="form-control" name='Id_Tabela' placeholder="Id_Tabela" />
                        <div class="col-md-3 ">
                            <label for='data'> Data
                                <input type="date" class="form-control" name='data' min='<?php echo date("d/m/Y"); ?>' placeholder="Data" required><label>
                        </div>
                        <div class="col-md-3 ">
                            <label for='horario'> Horario
                                <input type="text" class="form-control" id='time' name='horario' placeholder="hh:mm:ss" required><label>
                        </div>
                        <div class="col-md-3">
                            <label for='local'> Local
                                <input type="text" class="form-control" name='local' placeholder="Local" required> <label>
                        </div>
                        <div class="col-md-3">
                            <label for='placar2'> Campo do jogo
                                <input type="number" class="form-control" name='campo' placeholder="Campo" required><label>
                        </div>
                    </div>
                    <br />
                    <input type="hidden" class="form-control" name='golEquipe1' value='0' required> <label>
                        <input type="hidden" class="form-control" name='golEquipe2' value='0' required><label>
                            <div class="row" id='formjogo'>
                                <div class="col-md-6">

                                    <label for='equipe'> Time 1
                                        <select class="custom-select" name="equipe1" id="select">
                                            <?php
                                            foreach ($times as $item) {
                                                echo "<option ";
                                                echo "value=";
                                                echo $item["Id_Time"];
                                                echo ">";
                                                echo $item['Nome'];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for='equipe2'> Time 2
                                        <select class="custom-select" name="equipe2" id="select">
                                            <?php
                                            foreach ($times as $item) {
                                                echo "<option ";
                                                echo "value=";
                                                echo $item["Id_Time"];
                                                echo ">";
                                                echo $item['Nome'];
                                                echo "</option>";
                                            }
                                            ?>
                                            </option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class='text-center'>
                                <input class="btn btn-success " type='submit' id='salvar' name="SalvarJogo" value="Salvar" onclick='executar()' />
                            </div>

                            <div class="spinner-border text-primary" id='spinner' role="status" style='display:none;'>
                                <span class="sr-only">Loading...</span>
                            </div>
                </form>
    </main>
</div>


<div class='container'>
    <main class="page-content" style='overflow-x:visible !important;'>
        <div class='text-center' style='margin:0; padding: 0'>
            <h5>Próximos Jogos</h5>
        </div>
        <div style="width: 1100px;">
            <?php
            $consulta  = "select * from vw_partidafutura ORDER BY Data DESC";
            $resultado = mysqli_query($conexao, $consulta);
            ?>


            <?php while ($row_futebol = mysqli_fetch_assoc($resultado)) { ?>
                <div style='width:400px; height:400px; float: left;'>
                    <hr id="person">
                    <div class='data text-center jogosfuturos'>
                        <?php echo date("d/m/y", strtotime($row_futebol['Data'])); ?>
                        <?php echo $row_futebol['Local']; ?>
                        <?php echo $row_futebol['Horario']; ?>
                    </div>
                    <div class='fundoTime'>
                        <div class='text-center '>
                            <input type='hidden' name='id_jogo' id='id_jogo'></input>
                            <input type='hidden' name='Time1'></input>
                            <input type='hidden' name='Time2'></input>
                            <p class='time'><?php echo $row_futebol['Time_int1']; ?> </p>
                            <img class='logotime' src='../futebol/upload/<?php echo $row_futebol['EmblemaTime1']; ?> ' />
                            <p class='vs'> VS </p>
                            <img class='logotime' src='../futebol/upload/<?php echo $row_futebol['EmblemaTime2']; ?> ' />
                            <p class='time'> <?php echo $row_futebol['Time_int2']; ?></p>
                        </div></br>
                        <div class='text-center'>
                            <a button class='btn btn-danger' value='Deletar' href="model/DeletarJogoFut.php?&Time1=<?php echo $row_futebol['Time1']; ?>&Time2=<?php echo $row_futebol['Time2']; ?>  ;">Deletar</button></a></div></br>
                    </div>
                </div>

            <?php } ?>

        </div>



        <script type='text/javascript'>
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var recipient = button.data('whatever')
                var recipientnome = button.data('whatevernome')
                var recipientemblema = button.data('whateveremblema')
                var modal = $(this)
                modal.find('.modal-title').text('ID ' + recipient)
                modal.find('#Id_Time').val(recipient)
                modal.find('#recipient-name').val(recipientnome)
                modal.find('#emblema').val(recipientemblema)
            })

            function pegarDataAtual() {
                data = new Date();
                document.getElementById('data').value = data.getDay() + '/' + data.getMonth() + '/' + data.getFullYear();
            }

            function updateDiv() {
                $("#formjogo").load(window.location.href + " #formjogo");
            }


            function executar() {
                $.ajax({
                    type: 'GET',
                    url: 'documentation/poker/model/resposta.php',
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
            .logotime {
                width: 50px;
                height: 50px;
                margin-top: 8px;

            }

            
            .fundoTime {
                background-color: #F5F5F5;
                position: relative;
                margin: 10px;
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

            .imgTime {
                width: 50px;
                height: 50px;
            }

            .rotate {
                font-size: 20px;
                margin: 15px;
                position: relative;
                color: blue;

            }

            .rotate:hover {
                font-size: 20px;
                margin: 15px;
                position: relative;
                color: blue;
                -ms-transform: rotate(20deg);
                /* IE 9 */
                transform: rotate(50deg);
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