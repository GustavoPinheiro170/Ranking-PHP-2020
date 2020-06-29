<!-- PÁGINA DE UPLOAD DE TIMES E IMAGENS -->
<?php

include_once('../controller/conexao.php');

$msg = false;
// IF PARA EVITAR REQUEST REPETIDO E SALVAR OS DADOS DUAS OU MAIS VEZES
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request = md5(implode($_POST));

  if (isset($_SESSION['last_request']) && $_SESSION['last_request'] == $request) {
    echo '';
  } else {
    $_SESSION['last_request']  = $request;
    echo '';
  }
}
// UPLOAD E NOMEAÇÃO DE IMAGENS
if (isset($_POST["Enviar"])) {
  if (isset($_POST['nomeTime'])) {
    $nome = $_POST['nomeTime'];
    if (isset($_FILES['Emblema'])) {
      $extensao = strtolower(substr($_FILES['Emblema']['name'], -4));
      $emblema = md5(time()) . $extensao;
      $diretorio = "upload/";
      move_uploaded_file($_FILES['Emblema']['tmp_name'], $diretorio . $emblema);
    } else {
      $emblema = "logo.jpg";
    }

    $sql = "SELECT * FROM times WHERE Nome = '$nome'";
    $query = mysqli_query($conexao, $sql);
    $busca = mysqli_num_rows($query);

    if (($busca) == '0') {
      $sql_code = "CALL prc_InsereTime('$nome', '$emblema')";
      if ($conexao->query($sql_code))
        $msg = "Arquivo enviado com sucesso!";
    } else
      $msg = "Time já cadastrado";
    echo mysqli_error($conexao);
  }
}
// Script para não confirmar reenvio de formulario
?>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<!-- fim script -->
<main class="page-content">
  <div class="container-fluid">
    <div class="form-group col-md-12">
      <h3 class='titulo'> <i class="fas fa-users" style='margin-right: 10px;'></i> Cadatro de Time</h3>

      <form action='../futebol/vw_formulario.php' method='POST' enctype="multipart/form-data">
        <?php
        $Rand = rand();
        $_SESSION['Rand'] = $Rand;
        ?>
        <?php if ($msg != false) echo "<p> $msg  </p>"; ?>
        <div class="row">
          <div class="col-md-4 ">
            <label for='equipe2'> Time
              <input type="text" class="form-control" name='nomeTime' placeholder="Time" required><label>

          </div>
          <div class="col-md-4">
            <div class="custom-file">
              <input type='file' class="custom-file-input" name='Emblema' id='upload' required>
              <label class="custom-file-label" for="upload">Clique aqui e selecione o emblema</label>
            </div>
          </div>
          <div class="col ">
            <img id="img" style='width: 100px; height: 100px;' />
          </div>
          <div class='col'>
            <input class="btn btn-success" style='color:white; margin-top:20px;' type='submit' name='Enviar' value='Enviar' onclick='executartime()' />
          </div>
        </div>
        <div class="spinner-border text-primary" style='margin-left:0%; display:none;' id='sptime' role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </form>

      <!-- Função para Preview da imagem -->
      <script>
        function executartime() {
          $.ajax({
            type: 'GET',
            url: 'documentation/poker/model/resposta.php',
            beforeSend: function() {
              $('#sptime').show();
            },
            success: function(data) {
              //sucesso
              $('#sptime').text(data);
            },
            error: function() {
              //errp
              console.log('erro');
            },
            complete: function() {
              $('#sptime').hide();

            }
          })
        }

        $(function() {
          $('#upload').change(function() {
            const file = $(this)[0].files[0]
            const fileReader = new FileReader()
            fileReader.onloadend = function() {
              $('#img').attr('src', fileReader.result)
            }
            fileReader.readAsDataURL(file)
          })
        })
      </script>

    </div>

</main>
<style>
  .custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    height: calc(2.25rem + 2px);
    margin-bottom: 0;
    margin-top: 20px;
  }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>