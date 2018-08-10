<?php

include_once('../models/referencia.php');
include_once('../models/marca.php');
include_once('../models/tipo.php');
include_once('../models/tamanho.php');
include_once('../models/cor.php');

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
        var_dump($_POST);
        echo "continuar ...";
        
        break;
    default:
        echo "erro";
        break;
}