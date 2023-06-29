<?php

    require_once('../classes/Divida.php');

    $opcao = $_POST['opcao'];
    $desc = $_POST['desc'];
    $valor = $_POST['valor'];

    try{

        $situacao = "Pendente";
        $ano = date('Y');

        $divida = new Divida();
        $divida->setDesc_divida($desc);
        $divida->setValor_divida($valor);
        $divida->setMes_divida($opcao);
        $divida->setAno_divida($ano);
        $divida->setSituacao_divida($situacao);
        $divida->cadastrar($divida);

        $retorna = ['erro' => false, 'msg' => "Dívida cadastrada com sucesso!"];

        echo json_encode($retorna);

    }catch(PDOException $e){
        echo "Erro: ". $e->getMessage();
    }
    
?>