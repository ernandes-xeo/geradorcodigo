<?php

include_once 'conexao.php';
class Tipo {

    private $idTipo;
    private $nome;
    
    public function getIdTipo() {
        return $this->idTipo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function salvar(){
        $sql = "INSERT INTO tipo (nome) VALUES (:nome)";
        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(":nome", $this->getNome());
        if ($rs->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function listar() {
        try {
            $sql = "SELECT * FROM tipo order by nome ASC";

            $result = Conexao::getInstance()->query($sql);

            $lista = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $obj = new Tipo();
                $obj->setIdTipo($row->idtipo);
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
        try {
            $sql = "SELECT * FROM tipo where idtipo = :idtipo";
            $result = Conexao::getInstance()->prepare($sql);
            $result->bindValue(":idtipo",$id);
            
            if ($result->execute()) {
                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                        $obj = new Tipo();
                        $obj->setIdTipo($row->idtipo);
                        $obj->setNome($row->nome);         
                    }
                    return $obj;
                }else{
                    return false;
                }
            }

        } catch (Exception $e) {
            print "Ocorreu um erro ao buscar referencia";
        }
    }

}
