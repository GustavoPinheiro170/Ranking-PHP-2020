<?php
require "../controller/conexao.php";
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$consulta  = "SELECT * FROM vw_Jogos  ORDER BY data DESC";
$resultado = mysqli_query($conexao, $consulta);
//Contando total de jogos
$total_jogos = mysqli_num_rows($resultado);
//seta a quantidade de jogos por página
$quantidade_pg = 4;
// calcular o numero de páginas necessárias para apresentar os jogos
$num_paginas = ceil($total_jogos / $quantidade_pg);
//Calcular o inicio da vw
$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;
//selecionar os jogos a serem apresentados na página
$result_jogos = "SELECT * FROM vw_jogos LIMIT $inicio, $quantidade_pg";
$execute = mysqli_query($conexao, $result_jogos);
$total_jogos = mysqli_num_rows($execute);
$paginacao = $_POST['paginacao']
?>
<?php
//Verificar a pagina anterior e posterior 
$pagina_anterior = $pagina - 1;
$pagina_posterior = $pagina + 1;
?>
<nav aria-label="Page navigation example" class='text-center'>
    <ul class="pagination">
        <?php
        if ($pagina_anterior != 0) { ?>
            <li class="page-item">
                <a class="page-link" id='btn1' href="futebol.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Anterior</span>
                </a>
            <?php  } ?>
            </li>
            <?php
            for ($i = 1; $i < $num_paginas + 1; $i++) { ?>
                <li class="page-item"><a class="page-link" href="futebol.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php   } ?>
            <?php
            if ($pagina_posterior != 0) { ?>
                <li class="page-item">
                    <a class="page-link" id='btn2' href="futebol.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Proxima</span>
                </a>
                </li>
    </ul>
    </nav>
            <?php  } ?>


<hr>
<?php
while ($row_futebol = mysqli_fetch_assoc($execute)) { ?>
    <?php echo $row_futebol['Rodada']; ?>
    <div class="jogo theme border-left border-right">
        <div>
            <div class="jogo__informacoes"><span class="jogo__informacoes--data"> <?php
                                                                                    echo date("d/m/y", strtotime($row_futebol['Data']));
                                                                                    ?> </span><span class="jogo__informacoes--local"> <?php echo $row_futebol['Local']; ?> </span><span class="jogo__informacoes--hora"> <?php echo $row_futebol['Horario']; ?> </span></div>
            <div class="placar">
                <div class="placar__equipes placar__equipes--mandante">
                    <meta itemprop="name" content="Ituano"><span class="equipes__sigla"><?php echo $row_futebol['Time1']; ?></span><span class="equipes__nome"></span>
                    <img class="equipes__escudo equipes__escudo--mandante"  src='../futebol/upload/<?php echo $row_futebol['EmblemaTime1']; ?>' width="50" height="50">
                </div>
                <div class="placar-box"><span class="placar-box__valor placar-box__valor--mandante"><?php echo $row_futebol['GolTime1']; ?></span><span class="placar-box__valor placar-box__penaltis placar-box__penaltis-mandante"></span><span class="placar-box__versus"><svg viewBox="0 0 100 100" id="scoreboard-vs-icon" width="100%" height="100%">
                            <line x1="-3" x2="100" y1="1" y2="100" stroke="#555" stroke-width="5"></line>
                            <line x1="-3" x2="100" y1="100" y2="1" stroke="#555" stroke-width="5"></line>
                        </svg>
                    </span><span class="placar-box__valor placar-box__penaltis placar-box__penaltis-visitante"></span><span class="placar-box__valor placar-box__valor--visitante"><?php echo $row_futebol['GolTime2']; ?></span></div>
                <div class="placar__equipes placar__equipes--visitante">
                    <meta itemprop="name"><img class="equipes__escudo equipes__escudo--visitante" src='../futebol/upload/<?php echo $row_futebol['EmblemaTime2']; ?>' width="50" height="50"><span class="equipes__sigla"><?php echo $row_futebol['Time2']; ?></span><span class="equipes__nome"></span></div>
            </div>
        </div>
      </div>
      
 <hr id="person">
<?php } ?>
</div>
</div>
</div>

<script src="../futebol/js/jquery.2.1.3.min.js"></script>
<script src="../futebol/js/main.js"></script>


