<?php

include_once 'conexao.php';
class Referencia {   

    private $idReferencia;
    private $nome;
    private $marcaId;
    private $tipoId;
    
    public function getIdReferencia() {
        return $this->idReferencia;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getMarcaId() {
        return $this->marcaId;
    }

    public function getTipoId() {
        return $this->tipoId;
    }

    public function setIdReferencia($idReferencia) {
        $this->idReferencia = $idReferencia;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setMarcaId($marcaId) {
        $this->marcaId = $marcaId;
    }

    public function setTipoId($tipoId) {
        $this->tipoId = $tipoId;
    }

        
    public function salvar(){
        
        $sql = "INSERT INTO referencia (nome, marca_id, tipo_id) VALUES (:nome, :marca_id, :tipo_id)";
        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(":nome", $this->getNome());
        $rs->bindValue(":marca_id", $this->getMarcaId());
        $rs->bindValue(":tipo_id", $this->getTipoId());
        if ($rs->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function listar() {
        try {
            $sql = "SELECT * FROM referencia";

            $result = Conexao::getInstance()->query($sql);

            $lista = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $obj = new Referencia();
                $obj->setNome($row->nome);
                $obj->setMarcaId($row->marca_id);
                $obj->setTipoId($row->tipo_id);
                $lista[$i] = $obj;
                $i++;
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function listarRefMarca($id) {
        try {
            $sql = "SELECT * FROM referencia where marca_id = :marca_id";
            $result = Conexao::getInstance()->prepare($sql);
            $result->bindValue(":marca_id", $id);

            $lista = array();
            $i = 0;
            $result->execute();
    //        echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $obj = new Referencia();
                $obj->setIdReferencia($row->idreferencia);
                $obj->setNome($row->nome);
                $obj->setMarcaId($row->marca_id);
                $obj->setTipoId($row->tipo_id);
                $lista[$i] = $obj;
                $i++;
            }
            return $lista;

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

}
