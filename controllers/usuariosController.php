<?php

include_once '../models/login.php';
include_once '../models/usuario.php';
include_once '../models/UsuarioDao.php';

// início de sessão php
if (!isset($_SESSION)) {
    session_start();
}

if ($_REQUEST['botao'])
    $botao = $_REQUEST['botao'];

$usuario = new Usuario();
$userDao = new UsuarioDao(); // instancia da classe dao

switch ($botao) {

    case 'exibir':
        // echo "Receber paramento do cliente para consultar no banco de dados";
        //var_dump($_REQUEST);
        $id = $_REQUEST['id'];
        $usuario->setId($id);
        $res = $usuario->localizar($usuario);
        $_SESSION['dadosUser'] = $res;
        header('location: ../views/index.php?op=userview');
        break;
    case 'editar':
        $editarUser = new Usuario();
        $editarUser->setId($_POST['id']);
        $editarUser->setUsuario($_POST['user']);
        $editarUser->setNome($_POST['nome']);
        $editarUser->setEmail($_POST['email']);

        if (!empty($_POST['senha']))
            $editarUser->setSenha($_POST['senha']);
        else {
            $editarUser->setSenha(null);
        }

        if ($userDao->alterar($editarUser)) {
            header('location: ../views/index.php?op=usuarios&editar=ok');
        }


        break;
    case 'cadastrar':
        header("location: ../views/index.php?op=cadastrar");
        break;

    case 'Salvar':

        /*
         * Validar se o post da senha é igual - Implementar
         * Validar os campos recebido do formulário
         */
        $usuario->setUsuario($_POST['user']);
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);

        if ($userDao->inserir($usuario)) {
            $url = 'location: ../views/index.php?op=usuarios&sucesso=ok';
            header($url);
        }
        break;
    case 'excluir':
        var_dump($_REQUEST);
        $id = $_REQUEST['id'];
        
        if($userDao->excluir($id)){
            $url = 'location: ../views/index.php?op=usuarios&excluir=ok';
            header($url);
        }
        break;
    default:

        break;
}
