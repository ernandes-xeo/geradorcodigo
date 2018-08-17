<?php

include_once ('conexao.php');
include_once ('tipo.php');
include_once ('referencia.php');

class Codigo {

    private $codigoId;
    private $nome;
    private $codigoProduto;
    private $nomeSite;
    private $marcaId;
    private $tipoId;
    private $referenciaId;
    private $corId;
    private $tamanhoId;

    public function getCodigoId() {
        return $this->codigoId;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCodigoProduto() {
        return $this->codigoProduto;
    }

    public function getNomeSite() {
        return $this->nomeSite;
    }

    public function getMarcaId() {
        return $this->marcaId;
    }

    public function getTipoId() {
        return $this->tipoId;
    }

    public function getReferenciaId() {
        return $this->referenciaId;
    }

    public function getCorId() {
        return $this->corId;
    }

    public function getTamanhoId() {
        return $this->tamanhoId;
    }

    public function setCodigoId($codigoId) {
        $this->codigoId = $codigoId;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCodigoProduto($codigoProduto) {
        $this->codigoProduto = $codigoProduto;
    }

    public function setNomeSite($nomeSite) {
        $this->nomeSite = $nomeSite;
    }

    public function setMarcaId($marcaId) {
        $this->marcaId = $marcaId;
    }

    public function setTipoId($tipoId) {
        $this->tipoId = $tipoId;
    }

    public function setReferenciaId($referenciaId) {
        $this->referenciaId = $referenciaId;
    }

    public function setCorId($corId) {
        $this->corId = $corId;
    }

    public function setTamanhoId($tamanhoId) {
        $this->tamanhoId = $tamanhoId;
    }

    public function gerarCodigo() {

        $codigoProduto = null;
        $codigoProduto = "{$this->marcaId}{$this->tipoId}{$this->referenciaId}";

        if (isset($this->corId))
            $codigoProduto .= $this->corId;

        if (isset($this->tamanhoId))
            $codigoProduto .= $this->tamanhoId;


        /* Código completo */
        $this->setCodigoProduto($codigoProduto);

        /* Formar nome do produto */
        $tipo = new Tipo();
        $nome = $tipo->buscarNome($this->tipoId); // erro esta retornando objeto inteiro

        $ref = new Referencia();
        $nome .= " " . $ref->buscarNome($this->referenciaId);  //erro esta retornando objeto inteiro

        if (!empty($this->corId)) {
            $objcor = new Cor ();
            $nome .= " " . $objcor->buscarNome($this->corId);
        }

        if (!empty($this->tamanhoId)) {
            $objT = new Tamanho();
            $nome .= " " . $objT->buscarNome($this->tamanhoId);
        }

        $objMarca = new Marca();
        $nome .= " " . $objMarca->buscarNome($this->marcaId);


        // setando nome no objeto
        $this->setNome($nome);

        if ($this->verificarCodigo()) {
            $_SESSION['codigo'] = true; // o codigo ja foi cadastrado
            $_SESSION['nome_produto'] = $this->getNome(); // o codigo ja foi cadastrado
            return true; // o código já existe
        } else {
            unset($_SESSION['codigo']);
            return false; // o produto não foi cadastrado
        }
    }

    public function salvar() {
        $sql = "INSERT INTO codigo (`nome`,`nome_site`,`codigo_produto`,`marca_id`,`tipo_id`,`referencia_id`,`cor_id`,`tamanho_id`)"
                . " VALUES (:nome, :nome_site, :codigo_produto, :marca_id, :tipo_id, :referencia_id, :cor_id, :tamanho_id)";


        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(":nome", $this->getNome());
        $rs->bindValue(":nome_site", $this->getNomeSite());
        $rs->bindValue(":codigo_produto", $this->getCodigoProduto());
        $rs->bindValue(":marca_id", $this->getMarcaId());
        $rs->bindValue(":tipo_id", $this->getTipoId());
        $rs->bindValue(":referencia_id", $this->getReferenciaId());
        $rs->bindValue(":cor_id", $this->getCorId());
        $rs->bindValue(":tamanho_id", $this->getTamanhoId());

        if ($rs->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($codigoId) {
        try {
            $sql = "DELETE FROM codigo where idcodigo = :codigoId";
            $rs = Conexao::getInstance()->prepare($sql);
            $rs->bindValue(":codigoId", $codigoId);
            if ($rs->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            print "Erro ao excluir código";
        }
    }

    public function salvarNomeSite() {
        try {
            $sql = "Update codigo set nome_site = :nomesite where idcodigo = :codigoId";
            $rs = Conexao::getInstance()->prepare($sql);
            $rs->bindValue(":nomesite", $this->getNomeSite());
            $rs->bindValue(":codigoId", $this->getCodigoId());
            if ($rs->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            print "Erro ao excluir código";
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM codigo";

            $result = Conexao::getInstance()->query($sql);

            $lista = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $obj = new Codigo();
                $obj->setCodigoId($row->idcodigo);
                $obj->setNome($row->nome);
                $obj->setNomeSite($row->nome_site);
                $obj->setCodigoProduto($row->codigo_produto);
                $obj->setMarcaId($row->marca_id);
                $obj->setTipoId($row->tipo_id);
                $obj->setReferenciaId($row->referencia_id);
                $obj->setCorId($row->cor_id);
                $obj->setTamanhoId($row->tamanho_id);

                $lista[$i] = $obj;
                $i++;
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public function localizar($codigoId) {
        try {
            $sql = "SELECT * FROM codigo where idcodigo = :idcodigo";
            $result = Conexao::getInstance()->prepare($sql);
            $result->bindValue(":idcodigo", $codigoId);


            if ($result->execute()) {
                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    $obj = new Codigo();
                    $obj->setCodigoId($row->idcodigo);
                    $obj->setNome($row->nome);
                    $obj->setNomeSite($row->nome_site);
                    $obj->setCodigoProduto($row->codigo_produto);
                    $obj->setMarcaId($row->marca_id);
                    $obj->setTipoId($row->tipo_id);
                    $obj->setReferenciaId($row->referencia_id);
                    $obj->setCorId($row->cor_id);
                    $obj->setTamanhoId($row->tamanho_id);
                }
            }
            // retornar apenas 1 objeto
            return $obj;
        } catch (Exception $e) {
            print "Ocorreu ao localizar o codigoId";
        }
    }
    
    public function editarNomeSite() {
        $sql = "UPDATE codigo set nome_site=:nome_site where idcodigo=:idcodigo";
        $result = Conexao::getInstance()->prepare($sql);
        $result->bindValue(":nome_site", $this->getNomeSite());
        $result->bindValue(":idcodigo", $this->getCodigoId());
        
        if ($result->execute()) {
            if ($result->rowCount() > 0)
                return true;
            else
                return false;
        }
    }

    public function verificarCodigo() {
        $sql = "SELECT * FROM codigo where codigo_produto = :codigo_produto";
        $result = Conexao::getInstance()->prepare($sql);
        $result->bindValue(":codigo_produto", $this->getCodigoProduto());
        if ($result->execute()) {
            if ($result->rowCount() > 0)
                return true;
            else
                return false;
        }
    }

}
