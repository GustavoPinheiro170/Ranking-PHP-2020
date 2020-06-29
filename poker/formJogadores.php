<?php
session_start();
?>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style_formpk.css" />
</head>

<?php include('../index/header.php'); ?>

<?php

include_once("../controller/conexaoPoker.php");
$consulta = "SELECT * from regional";
$resultado = mysqli_query($conexao, $consulta);

?>
<div class='container'>
    <main class="page-content">
        <div class="container">
            <div class="form-group col-md-12">
                <h3 class='titulo'> <i class="fas fa-angle-double-right" style='margin-right: 10px;'></i> Cadastrar Jogador </h3>
                <form method='POST' action='model/insereJogador.php'>
                    <input type='text' name='id_jogador' hidden>
                    <div class="row">
                        <div class="col-md-3">
                            <label for='jogador'> Nome do Jogador
                                <input type="text" class="form-control" id='Nome' name='jogador' placeholder="Jogador" required><label>
                                    <input type="hidden" class="form-control" id='Nome' name='id_jogador'>
                                </label>
                        </div>
                        <div class="col-md-3">
                            <label for='Login'> Login
                                <input type="text" class="form-control" id='Login' name='Login' placeholder="Login" required><label>
                        </div>
                        <div class="col-md-3">
                            <label for='regional'> Regional
                                <select class="custom-select" name="regional" id="select">
                                    <?php

                                    header('Content-type: text/html; charset=iso-8859-1');
                                    while ($row = $resultado->fetch_array()) {
                                        echo "<option ";
                                        echo "value=";
                                        echo $row["id_regional"];
                                        echo ">";
                                        echo utf8_encode($row['regional']);
                                        echo "</option>";
                                    }
                                    ?>
                                    </option>
                                </select>
                            </label>
                        </div>
                        <?php
                        $sql = "SELECT * FROM torneios";
                        $resultado = mysqli_query($conexao, $sql);
                        ?>
                        <div class="col-md-3">
                            <label for='Torneio'>Torneio
                                <select class="custom-select" name="Id_Torneio" id="select">
                                    <?php

                                    while ($torneio = $resultado->fetch_array()) {
                                        echo "<option ";
                                        echo "value=";
                                        echo $torneio["Id_Torneio"];
                                        echo ">";
                                        echo $torneio['Torneio'];
                                        echo "</option>";
                                    }
                                    ?>
                                    </option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input class="btn btn-success " type='submit' id='Cadastrar' name="Cadastrar" value="Cadastrar" onclick='executar();' />
                    </div><br />
                    <div class="spinner-border text-primary" id='spinner' role="status" style='display:none;'>
                        <span class="sr-only">Loading...</span>
                    </div>
                </form>
    </main>
</div>


<?php
error_reporting(E_ERROR | E_PARSE);
$lnk = mysqli_connect('localhost', 'root', '')  or die('Nao foi possível conectar ao MySql: ' . mysqli_error($lnk));
mysqli_select_db($lnk, 'poker') or die('Nao foi possível ao banco de dados selecionado no MySql: ' . mysqli_error($lnk));

$sql = 'SELECT Jogador, Login, Regional, Torneio, Id_Jogador FROM vw_jogadores ORDER BY Jogador ASC';
$nome = @$_POST['NOME'];

if (!is_null($nome) && !empty($nome))
    $sql = "SELECT  Jogador, Login, Regional, Torneio, Id_Jogador FROM vw_jogadores WHERE Jogador LIKE '" . $nome . "' ORDER BY Jogador ASC";

$qry = mysqli_query($lnk, $sql) or die(mysqli_error($lnk));
$count = mysqli_num_rows($qry);
$num_fields = @mysqli_num_fields($qry); //Obtém o número de campos do resultado
$fields[] = array();
if ($num_fields > 0) {
    for ($i = 0; $i < $num_fields; $i++) { //Pega o nome dos campos
        $fields[] = mysqli_fetch_field_direct($qry, $i)->name;
    }
}
?>

<div class='container'>
    <main class="page-content">
        <div class='container'>
         <div class="form-group col-md-12">
            <form method="post">
                <div class='row'>
                    <div class="col-lg-6">
                        <label for="NOME">Nome: </label>
                        <input class="form-control" id="NOME" placeholder="Nome do Jogador" name="NOME">
                    </div>

                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary" style="margin-top: 24;">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
<!--Filtro de busca-->
<div class='container'>
    <main class="page-content">
        <div class="container">
            <?php
            if (!is_null($nome) && !empty($nome)) {
                if ($count > 0) {
                    echo 'Encontrado registros com o nome ' . $nome;
                } else {
                    echo 'Nenhum registro foi encontrado com o nome ' . $nome;
                }
            }
            ?>

            <style>
                .table {
                    margin-left: 10px;
                    background: #4cc065;
                    color: white !important;
                }

                .table td {
                    color: black;
                }

                .tbody {
                    color: white !important;
                }

                .title {
                    color: white;
                }
            </style>

            <!--Tabela com as buscas-->
            <?php
            //Montando o cabeçalho da tabela
            $table = '<table class="table" > <tr>';

            for ($i = 0; $i < $num_fields; $i++) {
                $table .= '<th>' . $fields[$i] . '</th>';
            }

            //Montando o corpo da tabela
            $table .= '<tbody class="table" style="
            background-color: white;
             color: black;    
            ">';
            while ($r = mysqli_fetch_array($qry)) {
                $table .= '<tr>';

                for ($i = 0; $i < $num_fields; $i++) {
                    $table .= '<td>' . $r[$fields[$i]] .  '</td>';
                    $table .= ' <div class="spinner-border text-primary "  id="spinnerexcluir" role="status" style="display:none; margin-left:50%;">';
                    
                }
                
                // Adicionando botão de exclusão
                $table .= '<td><form action="model/deletarJogador.php" method="post" style="margin:0px; padding:1px; border:none; ">';
                $table .= '<input type="hidden" name="Id_Jogador" value="' . $r['Id_Jogador'] . '">';
                $table .= '<button  class="btn btn-danger" id="reload" onchange="reload();" onclick="excluir()">Excluir</button> ';
                $table .= ' <div class="spinner-border text-primary " id="spinnerexcluir" role="status" style="display:none;">';
                $table .= '  <span class="sr-only">Loading...</span>';
                $table .= '  </div>';
                $table .= '</form></td>';
            }

            //Finalizando a tabela
            $table .= '</tbody></table>';

            //Imprimindo a tabela
            echo $table;

            ?>
        </div>
    </main>
</div>
<script>
   function excluir() {
      $.ajax({
         type: 'GET',
         url: 'model/resposta.php',
         beforeSend: function() {
            $('#spinnerexcluir').show();
            
         },
         success: function(data) {
            //sucesso
            $('#spinnerexcluir').text(data);
            
         },
         error: function() {
            //errp
            console.log('erro');
         },
         complete: function() {
            $('#spinnerexcluir').hide();
            location.reload();

         }
      })
   }
function reload(){
   $('#reload').click(function() {
    location.reload();
});
}
setTimeout(reload(),2000);
</script>
<?php
include_once("../controller/conexaoPoker.php");
$sql = "SELECT * FROM vw_jogadores ";
$resultado = mysqli_query($conexao, $sql);


?>
<!-- <div class='container'>
    <main class="page-content">
        <div class="container">
            <h3 class='classificacao'> <i class="fas fa-medal" style='margin-right: 10px;'></i> Jogadores cadastrados </h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <td class='stlform' scope="col"><strong>Jogadores</strong></td>
                        <td class='stlform' scope="col"><strong>Login</strong></td>
                        <td class='stlform' scope="col"><strong>Regional</strong></td>
                        <td class='stlform' scope="col"><strong>Torneio</strong></td>
                        <td class='stlform'></td>
                        <td class='stlform'></td>
                    </tr>
                    <?php
                    //  while ($row_poker = $resultado->fetch_array()) {
                    ?>
                        <tr>
                            <td style='background-color:#F7F7F7;'><strong><?php
                                                                            //  echo $row_poker[0];
                                                                            ?></strong></td>
                            <td><?php
                                //   echo $row_poker[1];
                                ?></td>
                            <td><?php
                                //  echo $row_poker[2];
                                ?></td>
                            <td><?php
                                //  echo $row_poker[4];
                                ?></td>

                            <td><a button class='btn btn-danger' href=' javascript: if(confirm("Tem certeza que deseja deletar o jogador <?php //
                                                                                                                                            echo $row_poker['Jogador'];
                                                                                                                                            ?> ? ")) location.href = "model/deletarJogador.php?&Id_Jogador=<?php echo $row_poker['Id_Jogador']; ?> ";'>Deletar</button></a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php //echo$row_time['Id_Time']; 
                                                                                                                                                ?>" data-whatevernome="<?php echo $row_time['Nome']; ?>" data-whateveremblema="<?php echo $row_time['Emblema']; ?>">Editar</button>
                                </a></td>
                        </tr>
                    <?php// } ?>
            </table>
            </thead>
    </main>
</div> -->
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