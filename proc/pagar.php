<?php

    require_once('../classes/Divida.php');

    $id = $_GET['id'];

    try{
        $situacao = "Paga";
        
        $divida = new Divida();
        $divida->setId_divida($id);
        $divida->setSituacao_divida($situacao);
        $divida->pagar($divida);

        $retorna = ['erro' => false, 'msg' => "Dívida paga com sucesso!"];

        echo json_encode($retorna);

    }catch(PDOException $e){
        echo "Erro: ". $e->getMessage();
    }
    
?>