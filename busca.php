<?php 
    $pesquisa = @$_POST['pesquisa'];
    include('assets/layout/cabecalho.php');
?>
    <div class="container">
        <a type="button" id="botao" class="btn btn-success" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" style="margin-top:9px" height="40" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg>
        </a>
        
        <div class="card-group" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Dívidas Pagas</h5>
                    <form class="d-flex" action="busca.php" method="POST" role="search">
                        <input class="form-control me-2" type="number" name="pesquisa" placeholder="Digite o ano da dívida paga" aria-label="Search" required>
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>
                                         
                </div>
            </div>
        </div>

        <?php include('dividas/pagas.php');?>

    </div>

<?php include('assets/layout/rodape.php');?>