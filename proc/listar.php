<?php

    require_once('../classes/Divida.php');

    $id = $_GET['id'];

    try{

        if (!empty($id)) {

            $divida = new Divida();
            $listar_divida = $divida->divida($id);

            $retorna = ['erro' => false, 'dados' => $listar_divida];

        } else {
            $retorna = ['erro' => true, 'msg' => "Erro: Nenhuma divída encontrada!"];
        }

        echo json_encode($retorna);

    }catch(PDOException $e){
        echo "Erro: ". $e->getMessage();
    }
    
?>