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

switch ($action) {
    case 'marca':
        $obj = new Marca();        
        $obj->setNome($nome);
        if ($obj->salvar()) {
            $url = 'location: ../views/index.php?op=produtos&sucesso=ok';
            header($url);
        }else{
            echo 'error - marca';
        }
            
        break;
    case 'tipo':
        $obj = new Tipo();
        $obj->setNome($nome);
        if ($obj->salvar()) {
            $url = 'location: ../views/index.php?op=produtos&sucesso=ok';
            header($url);
        }else{
            echo 'error - tipo';
        }
        break;
    case 'referencia':
        $objref = new Referencia();
        $objref->setNome($nome);
        $objref->setMarcaId($marcaId);
        $objref->setTipoId($tipoId);
        
        if ($objref->salvar()) {
            $url = 'location: ../views/index.php?op=produtos&sucesso=ok';
            header($url);
        }else{
            echo 'error - referencia';
        }
        
        break;
    case 'cor':
        $obj = new Cor();
        $obj->setNome($nome);
        if ($obj->salvar()) {
            $url = 'location: ../views/index.php?op=produtos&sucesso=ok';
            header($url);
        }else{
            echo 'error - tipo';
        }
        break;
    case 'tamanho':
        $obj = new Tamanho();
        $obj->setNome($nome);
        if ($obj->salvar()) {
            $url = 'location: ../views/index.php?op=produtos&sucesso=ok';
            header($url);
        }else{
            echo 'error - tipo';
        }
        break;
    case 'buscaref':
        $objref = new Referencia();
        $listRef = $objref->listarRefMarca($marcaId);
        foreach ($listRef as $list){
            echo "<option value='".$list->getIdReferencia() ."'>".$list->getNome()."</option>";
        }        
        break;
    case 'gerarcodigo':
        /*Dados do formulário Cadastrar Produto*/
        $referenciaId = (int)$_POST['referencia_id'];
        $corId =     (!empty($_POST['cor_id'])? (int)$_POST['cor_id'] : null);
        $tamanhoId = (!empty($_POST['tamanho_id'])? (int)$_POST['tamanho_id'] : null); 
                
        $codigo = new Codigo();
        $codigo->setMarcaId($marcaId);
        $codigo->setTipoId($tipoId);
        $codigo->setReferenciaId($referenciaId);
        $codigo->setCorId($corId);
        $codigo->setTamanhoId($tamanhoId);
        
        
        
        if($codigo->salvar()){
            $url = 'location: ../views/index.php?op=produtos&sucesso=ok';
            header($url);
        }else{
            echo 'error - codigo';
        }
        break;
    default:
        echo "erro";
        break;
}