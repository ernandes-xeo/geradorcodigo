<?php

include_once '../models/login.php';
include_once '../models/usuario.php';




// início de sessão php
if (!isset($_SESSION)) {
    session_start();
}

if ($_REQUEST['botao'])
    $botao = $_REQUEST['botao'];

// Instancia classe Login
$login = new Login();

switch ($botao) {
    case 'Entrar':
        // verificação se o login nao está vazio
        $usuario = new Usuario();
        if (!empty($_POST['user'])) 
            $usuario->setNome($_POST['user']);
        
        // verifica se a senha nao está vazia
        if (!empty($_POST['senha']))
            $usuario->setSenha(md5($_POST['senha']));

        if (!$login->verificaLogin() && $login->logar($usuario)) {
            $_SESSION['usuario'] = $usuario->getNome();
            $url = 'location: ../views/index.php';
            header($url);
        } else {
            $_SESSION['erro'] = 'Usuário ou senha inválidos. Por favor tente novamente!';
            $url = 'location:../index.php';
            header($url);
        }

        break;
    case 'exibir':
        
        echo "Receber paramento do cliente para consultar no banco de dados";
        
        break;
    
    case 'editar':
        
        echo "Lógica para Editar";
        
        break;
     case 'excluir':
        
        echo "Lógica para Excluir";
        
        break;
    case 'sair':
        if ($login->sair())
            $url = 'location:../index.php';
        header($url);
        break;
    default:
        $login->sair();
        $_SESSION['erro'] = 'Você não tem permissão de acesso.';
        $url = 'location:../index.php';
        header($url);
        break;
}
