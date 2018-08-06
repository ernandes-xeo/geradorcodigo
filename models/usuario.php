<?php
class Usuario {
    /* atributos do usuário */

    private $id;
    private $nome;
    private $usuario;
    private $email;
    private $senha;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

     
    public function localizar(Usuario $user) {
        $usuarioDao = new UsuarioDao();
        if ($usuario = $usuarioDao->localizar($user)){
            return $usuario;
        }else {
            return null;
        }
    }
    
    function __construct() {
        
    }

}