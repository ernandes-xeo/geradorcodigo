<?php

include_once 'conexao.php';
class Tamanho {

    private $idTamanho;
    private $nome;

    public function getIdTamanho() {
        return $this->idTamanho;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdTamanho($idTamanho) {
        $this->idTamanho = $idTamanho;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function salvar(){
        $sql = "INSERT INTO tamanho (nome) VALUES (:nome)";
        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(":nome", $this->getNome());
        if ($rs->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function editar() {
        $sql = "UPDATE tamanho SET nome = :nome WHERE idtamanho = :codigoId";
        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(":nome", $this->getNome());
        $rs->bindValue(":codigoId", $this->getIdTamanho());
        if ($rs->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function excluir() {
        $sql = "DELETE FROM tamanho WHERE idtamanho = :codigoId";
        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(":codigoId", $this->getIdTamanho());
        if ($rs->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function listar() {
        try {
            $sql = "SELECT * FROM tamanho";

            $result = Conexao::getInstance()->query($sql);

            $lista = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $obj = new Tamanho();
                $obj->setIdTamanho($row->idtamanho);
                $obj->setNome($row->nome);
                $lista[$i] = $obj;
                $i++;
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function buscarNome($id){
        try{
            $sql = "Select * from tamanho where idtamanho = :id";
            $result = Conexao::getInstance()->prepare($sql);
            $result->bindValue(':id', $id);
            
            if($result->execute()){
                if($result->rowCount() > 0){
                    while($row = $result->fetch(PDO::FETCH_OBJ)){
                        $nome = $row->nome;
                    }
                    
                    return $nome;
                }else{
                    return  false;
                }
            }
            
        } catch (Exception $e){
            print "Erro buscar tamanho";
        }
    }
    
    

}
