<?php

    require_once('../classes/Divida.php');

    $opcao = $_POST['opcao'];
    $desc = $_POST['desc'];
    $valor = $_POST['valor'];
    $id = $_POST['id'];

    try{

        $divida = new Divida();
        $divida->setDesc_divida($desc);
        $divida->setValor_divida($valor);
        $divida->setMes_divida($opcao);
        $divida->setId_divida($id);
        $divida->alterar($divida);

        $retorna = ['erro' => false, 'msg' => "Dívida atualizada com sucesso!"];

        echo json_encode($retorna);

    }catch(PDOException $e){
        echo "Erro: ". $e->getMessage();
    }
    
?>