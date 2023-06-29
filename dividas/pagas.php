<section class="divida" id="Jan">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Janeiro</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Janeiro";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Fev">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Fevereiro</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Fevereiro";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Mar">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Março</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Março";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Abril">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Abril</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Abril";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Maio">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Maio</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Maio";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Jun">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Junho</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Junho";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Jul">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Julho</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Julho";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Ago">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Agosto</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Agosto";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Set">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Setembro</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Setembro";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Out">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Outubro</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Outubro";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Nov">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Novembro</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Novembro";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida" id="Dez">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo">Dezembro</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ano</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Dezembro";
                            $ano = $pesquisa;
                            $situacao = "Paga";
                            $listar_divida_paga = $divida->listar_divida_paga($mes,$pesquisa);
                        
                            foreach ($listar_divida_paga as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                    </tr>

                    <?php       }
                            }
                        }catch(PDOException $e){
                            echo "Erro: ". $e->getMessage();
                        }
                    ?>     
                </tbody>
            </table>
            <h5>
                <?php
                    $total_divida_paga = $divida->total_divida_paga($mes,$pesquisa);
                    foreach ($total_divida_paga as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

<section class="divida">
    <div class="card">
        <div class="card-body">    
            <h3 class="titulo">Total do ano de <?php echo $pesquisa;?>: <?php $divida = new Divida();$total_ano = $divida->total_ano($pesquisa);foreach ($total_ano as $valor){echo "R$ ". number_format($valor['valor'],2,",",".");}?></h3>        
        </div>
    </div>
</section>