<?php

    require_once('Conexao.php');

    class Divida
    {
        // Atributos
        private $id_divida;
        private $desc_divida;
        private $valor_divida;
        private $mes_divida;
        private $ano_divida;
        private $situacao_divida;

        // Getters e Setters
        public function setId_divida($id_divida) { $this->id_divida = $id_divida; }
        public function getId_divida() { return $this->id_divida; }
        public function setDesc_divida($desc_divida) { $this->desc_divida = $desc_divida; }
        public function getDesc_divida() { return $this->desc_divida; }
        public function setValor_divida($valor_divida) { $this->valor_divida = $valor_divida; }
        public function getValor_divida() { return $this->valor_divida; }
        public function setMes_divida($mes_divida) { $this->mes_divida = $mes_divida; }
        public function getMes_divida() { return $this->mes_divida; }
        public function setAno_divida($ano_divida) { $this->ano_divida = $ano_divida; }
        public function getAno_divida() { return $this->ano_divida; }
        public function setSituacao_divida($situacao_divida) { $this->situacao_divida = $situacao_divida; }
        public function getSituacao_divida() { return $this->situacao_divida; }

        // Métodos
        public function cadastrar($divida){
            $con = Conexao::conectar();    
            $stmt = $con->prepare("INSERT INTO tb_divida(desc_divida, valor_divida, mes_divida, ano_divida, situacao_divida) VALUES (?,?,?,?,?)");
            $stmt->bindValue(1, $divida->getDesc_divida());
            $stmt->bindValue(2, $divida->getValor_divida());
            $stmt->bindValue(3, $divida->getMes_divida());  
            $stmt->bindValue(4, $divida->getAno_divida());  
            $stmt->bindValue(5, $divida->getSituacao_divida());  
            $stmt->execute();
        }
        public function alterar($divida){
            $con = Conexao::conectar();
            $stmt = $con->prepare("UPDATE tb_divida SET desc_divida = ?, valor_divida = ?, mes_divida = ? WHERE id_divida = ?");
            $stmt->bindValue(1, $divida->getDesc_divida());
            $stmt->bindValue(2, $divida->getValor_divida());
            $stmt->bindValue(3, $divida->getMes_divida());  
            $stmt->bindValue(4, $divida->getId_divida());  
            $stmt->execute();
        }
        public function excluir($divida){
            $con = Conexao::conectar();
            $stmt = $con->prepare("DELETE FROM tb_divida WHERE id_divida = ? ");
            $stmt->bindValue(1, $divida->getId_divida());          
            $stmt->execute();
        }
        public function pagar($divida){
            $con = Conexao::conectar();       
            $stmt = $con->prepare("UPDATE tb_divida SET situacao_divida = ? WHERE id_divida = ?"); 
            $stmt->bindValue(1, $divida->getSituacao_divida());  
            $stmt->bindValue(2, $divida->getId_divida());  
            $stmt->execute();
        }
        public function divida($id){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT * FROM tb_divida WHERE id_divida = $id LIMIT 1";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function listar_divida($mes){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT * FROM tb_divida WHERE mes_divida = '$mes'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
        public function listar_divida_paga($mes, $ano){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT * FROM tb_divida WHERE mes_divida = '$mes' AND situacao_divida = 'Paga' AND ano_divida = $ano";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
        public function total_divida($mes){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT SUM(valor_divida)AS valor FROM tb_divida WHERE mes_divida = '$mes' AND situacao_divida = 'Pendente'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function total_divida_paga($mes, $ano){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT SUM(valor_divida)AS valor FROM tb_divida WHERE mes_divida = '$mes' AND situacao_divida = 'Paga' AND ano_divida = $ano";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function total_ano($ano){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT SUM(valor_divida)AS valor FROM tb_divida WHERE ano_divida = $ano AND situacao_divida = 'Paga'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
    }
?>