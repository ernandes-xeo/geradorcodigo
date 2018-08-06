<?php

include_once 'UsuarioDao.php';
session_start();

class Login {

    public function __construct() {
        
    }

    public function logar(Usuario $user) {
        $usuarioDao = new UsuarioDao();
        if ($usuarioDao->consultarLogin($user))
            return TRUE;
        else
            return FALSE;
    }

    public function sair() {
        session_destroy();
        return TRUE;
    }

    public function verificaLogin() {
        if (!isset($_SESSION["logado"])) {
            return false;
            session_destroy();
        } else {
            return true;
        }
    }



}
