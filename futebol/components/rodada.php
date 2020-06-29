<?php
            $consulta  = "SELECT Id_Rodada, status FROM rodada ORDER BY Id_Rodada DESC";
            $resultado = mysqli_query($conexao, $consulta);
            $linha     = mysqli_fetch_assoc($resultado);
            ?>
            <div class = 'row rodada'>
            <div class = 'col-sm-3 text-center' style = 'margin:10px;'>

                  <h5> Rodada Atual</h5>
                  <hr>
                  <p class = 'numRodada'><?php echo $linha['Id_Rodada']; ?></p>

                  <a button class='btn btn-danger' href=' javascript: if(confirm("Tem certeza que deseja finalizar a rodada <?php
                                                                                                                              echo $linha['Id_Rodada'];
                                                                                                                              ?> ? ")) location.href = "model/finalizaRodada.php?&Id_Rodada=<?php echo $linha['Id_Rodada']; ?>";'>Finalizar Rodada</button></a>
               </div>

               <div class = 'col-sm-4 text-center' style = 'margin:10px;'>

                  <h5>Rodada Anterior</h5>
                  <hr>
                  <p> Visualize a rodada anterior: </p>

                  <a button class = 'btn btn-success' href = "model/geraPdf.php">Visualizar Rodada</button></a>
               </div>
               <div class = 'col-sm-4 text-center' style = 'margin:10px;'>

                  <h5 style = 'color:red;'>Atenção</h5>
                  <hr></br>
                  <p>Ao finalizar a rodada a pontuação atual será zerada, iniciando um novo ranking</p>

               </div>


            </div>