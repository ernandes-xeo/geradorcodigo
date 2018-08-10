<?php

include_once 'conexao.php';
class Marca {

    private $idMarca;
    private $nome;
    public function getIdMarca() {
        return $this->idMarca;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }   
    
    public function salvar(){
        $sql = "INSERT INTO marca (nome) VALUES (:nome)";
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
            $sql = "SELECT * FROM marca order by nome ASC";

            $result = Conexao::getInstance()->query($sql);

            $lista = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $obj = new Marca();
                $obj->setIdMarca($row->idmarca);
                $obj->setNome($row->nome);
                $lista[$i] = $obj;
                $i++;
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

}
