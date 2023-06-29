<?php include('assets/layout/cabecalho.php'); ?>
    <div class="container">
        <a type="button" id="botao" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cad">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" style="margin-top:9px" height="40" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
         <div class="modal fade" id="cad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <form id="cad-form">
                            <div class="mb-3">
                            <label class="form-label">Mês</label>
                            <select name="opcao" id="opcao" class="form-select" aria-label=".form-select-lg example">
                                <option value="">Selecione um mês</option>
                                <option value="Janeiro">Janeiro</option>
                                <option value="Fevereiro">Fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>
                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <textarea name="desc" id="desc" value="" rows="6"  class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Valor</label>
                                <input name="valor" type="number" id="valor" value="" step="0.01" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" id="cad-usuario-btn" class="btn btn-primary">Salvar</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Visualizar -->
        <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formulário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-divida-form"> 
                            <div class="mb-3">
                                <label class="form-label">Mês</label>
                                <select name="opcao" id="option" class="form-select" aria-label=".form-select-lg example">
                                    <option value="Janeiro">Janeiro</option>
                                    <option value="Fevereiro">Fevereiro</option>
                                    <option value="Março">Março</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Maio">Maio</option>
                                    <option value="Junho">Junho</option>
                                    <option value="Julho">Julho</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Setembro">Setembro</option>
                                    <option value="Outubro">Outubro</option>
                                    <option value="Novembro">Novembro</option>
                                    <option value="Dezembro">Dezembro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <textarea name="desc" id="editText" rows="6" value="" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Valor</label>
                                <input name="valor" type="number" id="editValor" value="" step="0.01" class="form-control" value="<?php echo $row[2]?>">
                                <input name="id" type="hidden" id="id" value="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="edit-usuario-btn">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="card-group" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Dívidas Pagas</h5>
                    <form class="d-flex" action="busca.php" method="POST" role="search">
                        <input class="form-control me-2" type="search" name="pesquisa" placeholder="Digite o Ano ex: 2022" aria-label="Search" required>
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </form>                      
                </div>
            </div>         
        </div>
        
        <span class="listar-dividas"></span>
     
    </div>

<?php include('assets/layout/rodape.php'); ?>