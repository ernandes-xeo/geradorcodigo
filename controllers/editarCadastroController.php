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

$classe = trim(stripslashes(strip_tags($_POST['table'])));
$codigoId = stripslashes(strip_tags($_POST['codigoId']));
$valor =  (!empty($_POST['valor'])? stripslashes(strip_tags($_POST['valor'])) : null);

$obj = new $classe ();
$setId = 'setId'.$classe;
$getId= 'getId'.$classe;
$obj->$setId($codigoId);
$obj->setNome($valor);

switch ($action){
    case 'editar':        
        if($obj->editar()){
            echo $obj->getNome();
        }else{
            echo "erro ao editar";
        }
    break;
    case "excluir":
        if($obj->excluir()){
            echo true;
        }else{
            echo "erro ao excluir";
        }      
    break;
    case "listar":
        
        $itens = $obj->listar();
        foreach ($itens as $item){
            echo "<tr>";
            echo "<td>" . $item->getNome() ."</td>";
            echo "<td>";
            if(get_class($item) != "Codigo"){
                echo "<i  id='".$classe."_editar_". $item->$getId()  ."' class='fa editarcodigo'>&#xf044;</i>";
            }
            echo "<i  id='".$classe."_excluir_". $item->$getId()  ."' class='fa excluir'>&#xf1f8;</i>";
            echo "</td>";
            echo "</tr>";
        }
        
    break;
default:
    echo "Erro Edição de cadastro";
    break;
    
}
