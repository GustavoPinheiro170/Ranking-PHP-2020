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

            <form id='form'>
               <div class="row">
                  <input type="hidden" class="form-control" name='Id_Time' placeholder="Id_Time" />
                  <input type="hidden" class="form-control" name='Id_Tabela' placeholder="Id_Tabela" />
                  <div class="col-md-3 ">
                     <label for='data'> Data
                        <input type="date" class="form-control" name='data' placeholder="Data" required><label>
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
               <div class="row" id='formjogo'>
                  <div class="col-md-4">

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
                  <div class="col-md-2">
                     <label for='placar'> Placar
                        <input type="number" class="form-control" name='golEquipe1' value='0' required> <label>
                  </div><p>VS</p>
                  <div class="col-md-2">
                     <label for='placar2'> Placar
                        <input type="number" class="form-control" name='golEquipe2' value='0' required><label>
                  </div>
                  <div class="col-md-3">
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
               <div class='row '>

                  <div class='col-4'>
                     <i class="fas fa-redo rotate" id='reload' onclick='updateDiv()' type="button" value="Atualizar"></i>
                     <p style='display:inline'>Atualizar Times</p>
                  </div>
                  <div class="col-4 text-center">
                     <input class="btn btn-success " type='submit' id='salvar' name="SalvarJogo" value="Cadastrar" onclick='executar()' />
                  </div>

                  <div class="col-4 text-center">
                     <a href='vw_tabela.php' class="btn btn-info">Visualizar Jogos </button></a>
                  </div>
               </div>

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
         function ListarCampeonatos($conexao)
         {
            include_once("../controller/conexao.php");

            $sql = "SELECT * FROM campeonato ORDER BY Id_Campeonato DESC Limit 1";
            $resultado = mysqli_query($conexao, $sql);
            $time = array();
            while ($item = mysqli_fetch_assoc($resultado)) {
               $time[] = $item;
            }
            return $time;
         }
         $times = ListarCampeonatos($conexao);
         ?>
         <form method='POST' action='model/insereCampeonato.php'>
            <div class='row'>
               <div class="col-md-4" style='display:none;'>
                  <label for='id_campeonato'> Campeonato
                     <select class="custom-select" name="id_campeonato" id="select">
                        <?php
                        foreach ($times as $item) {
                           echo "<option ";
                           echo "value=";
                           echo $item["Id_Campeonato"];
                           echo ">";
                           echo $item['Nome'];
                           echo "</option>";
                        }
                        ?>
                        </option>
                     </select>
                  </label>
               </div>
               <div class="col-md-6">
                  <label for='Campeonato'>Campeonato
                     <input type="text" class="form-control" name='campeonato' placeholder ='<?php echo $item['Nome']; ?>'><label>
               </div>
               <div class="col-md-6">
                     <input class="btn btn-success " style='margin-top: 20px;' type='submit' id='camp' name="camp" value="Cadastrar Campeonato"  required/>
                  </div>
            </div>
         </form>
   </main>
</div>

<div class='container'>
   <?php include('components/tabela.php'); ?>
</div>

<div class='container'>
   <?php include('../futebol/model/upload.php') ?>
</div>

<?php
$sql = "SELECT * FROM times";
$resultado = mysqli_query($conexao, $sql);
?>
<div class='container'>
   <main class="page-content">
      <div class="container">
         <div class="form-group col-md-12">
            <h3 class='titulo'> <i class="fas fa-angle-double-right" style='margin-right: 10px;'></i> Times Cadastrados </h3>
            <table class="table table-sm">
               <thead class="thead-dark">
                  <tr>
                     <td scope="col"><strong>Time</strong></td>
                     <td scope="col"><strong>Emblema</strong></td>
                  </tr>
                  <?php
                  while ($row_time = $resultado->fetch_array()) {
                  ?>
                     <tr>
                        <td style='background-color:#F7F7F7;'><?php
                                                               echo $row_time['Nome'];
                                                               ?>
                        </td>
                        <td>
                           <img class='imgTime' src='upload/<?php echo $row_time['Emblema']; ?>'>
                           <input type='hidden' name='Id_Time'></input>
                        </td>

                        <td><a button class='btn btn-danger' href=' javascript: if(confirm("Tem certeza que deseja deletar o time <?php echo $row_time['Nome']; ?> ? ")) location.href = "model/deletarTime.php?&Id_Time=<?php echo $row_time['Id_Time']; ?>";'>Deletar</button></a>
                        </td>
                        <td>
                           <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row_time['Id_Time']; ?>" data-whatevernome="<?php echo $row_time['Nome']; ?>" data-whateveremblema="<?php echo $row_time['Emblema']; ?>">Editar</button>
                           </a></td>
                     <?php } ?>
                     </tr>
               </thead>
            </table>
         </div>
      </div>
</div>
</main>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Time</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method='POST' action='model/EditarTime.php' enctype="multipart/form-data">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Time:</label>
                  <input type="text" class="form-control" name='nome' id="recipient-name">
                  <input type="text" name='Id_Time' id='Id_Time' hidden>
               </div>
               <input type='text' name='emblema' id='emblema' hidden>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Salvar</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script type='text/javascript'>

jQuery(document).ready(function() {
        jQuery('#form').submit(function() {
            var dados = jQuery(this).serialize();

            $.ajax({
                type: "POST",
                data: dados,
                url: "model/insereJogo.php",
                success: function() {
                    jQuery(document).ready(function() {
                     swal("Jogo Cadastrado!", "", "success");
                     location.reload(); 
                    });
                    
                }
            });

            return false;
        });
    });


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

   swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
  button: "Aww yiss!",
});
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src='js/jquery.2.1.3.min.js'></script>

<style>
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