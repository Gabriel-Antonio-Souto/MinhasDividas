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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Janeiro";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Fevereiro";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Março";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Abril";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Maio";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Junho";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Julho";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Agosto";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Setembro";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Outubro";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Novembro";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            require_once('../classes/Divida.php');   
                            $divida = new Divida();
                            $mes = "Dezembro";
                            $situacao = "Pendente";
                            $listar_divida = $divida->listar_divida($mes);
                        
                            foreach ($listar_divida as $row){ 
                                if($row[5] == $situacao) {?>
                                    <tr>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[1] ?></td>		
                                        <td><?php echo "R$ ".$row[2] ?></td>
                                        <td>
                                        <a id="<?php echo $row[0];?>" class="btn btn-primary" onclick="editDados(<?php echo $row[0];?>)">        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $row[0];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagar<?php echo $row[0];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </a>
                                        </td>
                                    </tr>

                                    <!-- Excluir -->
                                    <div class="modal fade" id="excluir<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo excluir este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="apagar(<?php echo $row[0];?>)">Excluir</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagar -->
                                    <div class="modal fade" id="pagar<?php echo $row[0];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Deseja mesmo marcar como pago este item?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $row[1];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                
                                                    <button id="<?php echo $row[0];?>" type="button" class="btn btn-success" data-bs-dismiss="modal" 
                                                    onclick='marcar(<?php echo $row[0];?>,"<?php echo $row[1];?>",<?php echo $row[2];?>,"<?php echo $row[3];?>",<?php echo $row[4];?>)'>Marcar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    $total_divida = $divida->total_divida($mes);
                    foreach ($total_divida as $valor){echo " Total: R$ ". number_format($valor['valor'],2,",",".");}
                ?>
            </h5>
        </div>
    </div>
</section>

