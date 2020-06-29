<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
  <title>Afresp | Esportes</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="../css/sidebar.css" rel="stylesheet">


</head>

<body>
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="../index/painel.php">Afresp | Esportes</a>
          <a href="../index/model/logout.php">
            <i class="fa fa-power-off"></i>
          </a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>

          </div>
        </div>
        <div class="sidebar-header">

          <div class="user-info">

            <span class="user-name"><?php echo  strtoupper($_SESSION["usuario"]); ?>

            </span>

            <span class="user-role">Administrator</span>
            <span class="user-status">
              <i class="fa fa-circle"></i>
              <span>Online</span>
            </span><br />

          </div>

        </div>

        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>Visão Geral</span>
            </li>

            <li class="sidebar-dropdown">
              <a href="../index/painel.php">
                <i class="fas fa-home"></i>
                <span>Home</span>

              </a>
            </li>

            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fas fa-futbol"></i>
                <span>Futebol</span>

              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="../futebol/vw_formulario.php">Cadastro Jogos | Times
                    </a>
                  </li>
                  <li>
                    <a href="../futebol/vw_PartidaFutura.php">Partidas Futuras </a>
                  </li>
                  <li>
                    <a href="../futebol/vw_tabela.php">Jogos | Ranking </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="far fa-heart"></i>
                <span>Poker</span>

              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="../poker/formPoker.php">
                     Torneio Online
                    </a>
                  </li>
                  <li>
                    <a href="../poker/PokerPresencial.php">
                    Torneios Presenciais
                    </a>
                  </li>
                  <li>
                    <a href="../poker/PokerRegional.php">
                    Torneios Regionais
                    </a>
                  </li>
                  <li>
                    <a href="../poker/formTorneioFuturo.php">
                    Cadastrar Torneio Futuro
                    </a>
                  </li>
                  <li>
                    <a href="../poker/formJogadores.php">
                    Cadastrar Jogadores
                    </a>
                  </li>

                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="far fa-map"></i>
                <span>Corrida</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#"></a>
                  </li>

                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fas fa-table-tennis"></i>
                <span>Tênis</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#"> </a>
                  </li>

                </ul>
              </div>
            </li>


        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">


        </div>
    </nav>


    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      jQuery(function($) {

        $(".sidebar-dropdown > a").click(function() {
          $(".sidebar-submenu").slideUp(200);
          if (
            $(this)
            .parent()
            .hasClass("active")
          ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
              .parent()
              .removeClass("active");
          } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
              .next(".sidebar-submenu")
              .slideDown(200);
            $(this)
              .parent()
              .addClass("active");
          }
        });

        $("#close-sidebar").click(function() {
          $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
          $(".page-wrapper").addClass("toggled");
        });
        $('#show-sidebar').click(function(){
          $("#sidebar").show();
        })




      });
    </script>