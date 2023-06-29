<?php 
    $pesquisa = @$_POST['pesquisa'];
    include('assets/layout/cabecalho.php');
?>
    <div class="container">
        <a type="button" id="botao" class="btn btn-primary" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" style="margin-top:12px" height="30" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </a>

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

        <?php include('dividas/pagas.php');?>

    </div>

<?php include('assets/layout/rodape.php');?>