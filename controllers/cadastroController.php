<?php

include_once('../models/referencia.php');
include_once('../models/marca.php');
include_once('../models/tipo.php');
include_once('../models/tamanho.php');
include_once('../models/cor.php');
include_once ('../models/codigo.php');

// início de sessão php
if (!isset($_SESSION)) {
    session_start();
}

if ($_REQUEST['acao'])
    $action = $_REQUEST['acao'];

@$nome = stripslashes(strip_tags($_POST['nome']));
@$marcaId = (int) stripslashes(strip_tags($_POST['marca_id']));
@$tipoId = (int) stripslashes(strip_tags($_POST['tipo_id']));

$obTipo = new Tipo();
$codigo = new Codigo();

switch ($action) {
    case 'marca':
        $obj = new Marca();
        $obj->setNome($nome);
        if ($obj->salvar()) {
            $_SESSION['sucesso'] = true;
            $url = 'location: ../views/index.php?op=produtos';
            header($url);
        } else {
            echo 'error - marca';
        }

        break;
    case 'tipo':
        $obTipo->setNome($nome);
        if ($obTipo->salvar()) {
            $_SESSION['sucesso'] = true;
            $url = 'location: ../views/index.php?op=produtos';
            header($url);
        } else {
            echo 'error - tipo';
        }
        break;
    case 'referencia':
        $objref = new Referencia();
        $objref->setNome($nome);
        $objref->setMarcaId($marcaId);
        $objref->setTipoId($tipoId);

        if ($objref->salvar()) {
            $_SESSION['sucesso'] = true;
            $url = 'location: ../views/index.php?op=produtos';
            header($url);
        } else {
            echo 'error - referencia';
        }

        break;
    case 'cor':
        $obj = new Cor();
        $obj->setNome($nome);
        if ($obj->salvar()) {
            $_SESSION['sucesso'] = true;
            $url = 'location: ../views/index.php?op=produtos';
            header($url);
        } else {
            echo 'error - tipo';
        }
        break;
    case 'tamanho':
        $obj = new Tamanho();
        $obj->setNome($nome);
        if ($obj->salvar()) {
            $_SESSION['sucesso'] = true;
            $url = 'location: ../views/index.php?op=produtos';
            header($url);
        } else {
            echo 'error - tipo';
        }
        break;
    case 'buscaref':
        $objref = new Referencia();
        
        $listRef = $objref->listarRefMarca($marcaId);
        foreach ($listRef as $list) {
            echo "<option value='" . $list->getIdReferencia() . "'>" . $obTipo->buscarNome($list->getTipoId()) ."_". $list->getNome() . "</option>";
        }
        break;
    case 'buscatiporef':
        $resTipo = $obTipo->listarTiposRef($marcaId);
        
        foreach ($resTipo as $tipo) {
            echo "<option value='" . $tipo->getIdTipo() . "'>" . $tipo->getNome()  . "</option>";
        }
        
        break;
    case 'gerarcodigo':
        /* Dados do formulário Cadastrar Produto */
        $referenciaId = (int) $_POST['referencia_id'];
        $corId = (!empty($_POST['cor_id']) ? (int) $_POST['cor_id'] : null);
        $tamanhoId = (!empty($_POST['tamanho_id']) ? (int) $_POST['tamanho_id'] : null);


        
        $codigo->setTipoId($tipoId);
        $codigo->setMarcaId($marcaId);
        $codigo->setReferenciaId($referenciaId);
        $codigo->setCorId($corId);
        $codigo->setTamanhoId($tamanhoId);
        
        if (!$codigo->gerarCodigo()) {
            if ($codigo->salvar()) {
                $_SESSION['sucesso'] = true;
                $url = 'location: ../views/index.php?op=produtos';
               // header($url);
                echo "<span class='success'>Produto Cadastrado com Sucesso!</span>";
            }
        } else {
            echo "<span class='error'>Este produto já foi cadastrado.</span>";
        }
        break;
    case 'listarcodigos':
        
        $listaCodigos = $codigo->listar('idcodigo DESC', 10);
        foreach ($listaCodigos as $codigo){
            echo "<tr>";
            echo "<td>" . $codigo->getCodigoProduto() . "</td>";
            echo "<td>" . $codigo->getNome() . "</td>";
            echo "<td><a class='excluir' href='#' id='" . $codigo->getCodigoId() . "'> Excluir</a></td>";
            echo "</tr>";
        }
        
    break;
    case 'excluircodigo':
        $codigoId = (int) $_REQUEST['codigoid'];
        if(!empty($codigoId)){
            if($codigo->excluir($codigoId)){
                $_SESSION['excluido'] = true;
                $url = 'location: ../views/index.php?op=produtos';
                header($url);
            }
        }
        break;
    case 'excluirItem':
        $codigoId = (int) $_REQUEST['codigoid'];
        if(!empty($codigoId)){
            if($codigo->excluir($codigoId)){
                $_SESSION['excluido'] = true;
                $url = 'location: ../views/index.php?op=listar-produtos';
                header($url);
            }
        }
    break;    
    case 'editarNomeSite':
        $codigoId = $_GET['codigoid'];
        $nomeSite = $_GET['nomesite'];
        $codigo->setCodigoId($codigoId);
        $codigo->setNomeSite($nomeSite);
        $codigo->salvarNomeSite();
        
        echo $codigo->localizar($codigo->getCodigoId())->getNomeSite();
        break; 
    case "update-list":
        
        $nomes = $_POST['nome-site'];
      //  var_dump($nomes);
        $retorno = array();
        foreach ($nomes as $ind=>$value){
            $codigo->setCodigoId($ind);
            $codigo->setNomeSite($value);
            if($codigo->salvarNomeSite()){                
                $retorno[$ind] = $codigo->localizar($ind)->getNome() . "RETORNO ";
            }else{
                $retorno[$ind] = $codigo->getCodigoId(). " Não foi atualizado";
            }
        }
        
       // $_SESSION['retorno'] = $retorno;
       unset($_SESSION['retorno']);
        $url = 'location: ../views/index.php?op=listar-produtos';
        header($url);
        
        break;
    default:
        echo "erro";
        break;
}