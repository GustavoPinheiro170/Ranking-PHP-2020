<?php
session_start();
include('../index/model/verifica_login.php');
include_once("../controller/conexaoPoker.php");
function Listartimes($conexao)
{
    include_once("../controller/conexaoPoker.php");

    $sql = "SELECT * FROM partida_futura";
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
                <h3 class='titulo'> <i class="fas fa-angle-double-right" style='margin-right: 10px;'></i> Cadastro Jogos Poker </h3>

                <form method='POST' action='model/insereTorneioFuturo.php'>
                    <div class="row">
                        <input type="hidden" class="form-control" name='id_partida_futura' placeholder="id_partida_futura" />
                          <div class="col-md-4">
                            <label for='data'> Data
                                <input type="date" class="form-control" name='Data' min='<?php echo date("d/m/Y"); ?>' placeholder="Data" required><label>
                        </div>
                        <div class="col-md-4">
                            <label for='local'> Local
                                <input type="text" class="form-control" name='Local' placeholder="Local" required> <label>
                        </div>
                        <div class="col-md-4">
                            <label for='Torneio'> Torneio
                                <input type="text" class="form-control" name='Torneio' placeholder="Torneio" required> <label>
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
            <h5>Próximos Torneios</h5>
        </div>
        <div style="width: 1100px;">
            <?php
            $consulta  = "SELECT * FROM partida_futura ORDER BY Data DESC";
            $resultado = mysqli_query($conexao, $consulta);
            ?>


            <?php while ($row_torneio = mysqli_fetch_assoc($resultado)) { ?>
                <div style='width:300px; height:200px; float: left;'>
                    <hr id="person">
                    <input type='hidden' name='id_partida_futura' value="<?php $row_torneio['id_partida_futura']; ?>" ></input>
                    <div class='data text-center jogosfuturos'>
                        <?php echo date("d/m/y", strtotime($row_torneio['Data'])); ?>
                        <?php echo $row_torneio['Local']; ?>
                    </div>
                    <div class='fundoTime'>
                        <div class='text-center '>
                            <p class='Torneio'><?php echo $row_torneio['Torneio']; ?> </p>
                        </div></br>
                        <div class='text-center'>
                            <a button class='btn btn-danger' value='Deletar' href="model/deletaTorneioFuturo.php?&id_partida_futura=<?php echo $row_torneio['id_partida_futura']; ?>;">Deletar</button></a></div></br>
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

            .Torneio {
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