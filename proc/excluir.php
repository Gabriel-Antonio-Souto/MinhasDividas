<?php

    require_once('../classes/Divida.php');

    $id = $_GET['id'];

    try{

        $divida = new Divida();
        $divida->setId_divida($id);
        $divida->excluir($divida);

        $retorna = ['erro' => false, 'msg' => "Dívida excluida com sucesso!"];

        echo json_encode($retorna);

    }catch(PDOException $e){
        echo "Erro: ". $e->getMessage();
    }
    
?>