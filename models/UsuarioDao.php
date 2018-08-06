<?php

include_once 'conexao.php';
include_once 'usuario.php';

class UsuarioDao {

    public static $instance;

    public function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new UsuarioDao();

        return self::$instance;
    }

    public function consultarLogin(Usuario $usuario) {
        // Prepara a sql para consulta
        $sql = "SELECT  nome from usuario where usuario = ? and senha = ?";
        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(1, $usuario->getNome());
        $rs->bindValue(2, $usuario->getSenha());

        $rs->execute();
        if ($rs->rowCount() == 1):
            $dados = $rs->fetch(PDO::FETCH_OBJ);
            $_SESSION['usuario'] = $dados->usuario;
            $_SESSION['nome'] = $dados->nome;
            $_SESSION['logado'] = true;
            return true;
        else:
            return false;
        endif;
    }

    public function localizar(Usuario $user) {

        // metodo preparament 
        $sql = "SELECT * FROM usuario  where id = :id";
        $rs = Conexao::getInstance()->prepare($sql);

        $rs->bindValue(":id", $user->getId());

        if ($rs->execute()) {
            if ($rs->rowCount() > 0) {
                while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                    $usario = new Usuario();
                    $usario->setId($row->id);
                    $usario->setNome($row->nome);
                    $usario->setEmail($row->mail);
                    $usario->setUsuario($row->usuario);
                    $usario->setSenha($row->senha);
                }
                return $usario;
            } else {
                return false;
            }
        }
    }

    /* cadastrar usuario */

    public function inserir(Usuario $user) {

        $sql = "INSERT INTO usuario (usuario, nome, mail, senha) VALUES (:usuario,:nome, :mail, :senha)";
        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(":usuario", $user->getUsuario());
        $rs->bindValue(":nome", $user->getNome());
        $rs->bindValue(":mail", $user->getEmail());
        $rs->bindValue(":senha", md5($user->getSenha()));
        if ($rs->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function alterar(Usuario $user) {

        try {

            if ($user->getSenha() == null) {
                $sql = "UPDATE usuario SET usuario= :usuario, nome=:nome, mail=:mail  where id = :id";
            } else {
                $sql = "UPDATE usuario SET usuario= :usuario, nome=:nome, mail=:mail, senha=:senha where id = :id";
            }

            $rs = Conexao::getInstance()->prepare($sql);
            $rs->bindValue(":usuario", $user->getUsuario());
            $rs->bindValue(":nome", $user->getNome());
            $rs->bindValue(":mail", $user->getEmail());

            /* REMOVE SENHA DO UPDATE */
            if ($user->getSenha() != null)
                $rs->bindValue(":senha", md5($user->getSenha()));

            $rs->bindValue(":id", $user->getId());

            if ($rs->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            print_r($ex);
        }
    }

    public function excluir($user_id) {
        $sql = 'DELETE FROM usuario where id = :id';
        $rs = Conexao::getInstance()->prepare($sql);
        $rs->bindValue(":id", $user_id);

        if ($rs->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listarPaginas($p, $qnt) {
        try {
            
            $inicio = ($p*$qnt) - $qnt;
            
            $sql = "SELECT * FROM usuario LIMIT {$inicio},{$qnt}";

            $result = Conexao::getInstance()->prepare($sql);
            $result->execute();
            
            $lista = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $usario = new Usuario();
                $usario->setId($row->id);
                $usario->setNome($row->nome);
                $usario->setEmail($row->mail);
                $usario->setUsuario($row->usuario);
                $lista[$i] = $usario;
                $i++;
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM usuario order by nome";

            $result = Conexao::getInstance()->query($sql);

            $lista = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $usario = new Usuario();
                $usario->setId($row->id);
                $usario->setNome($row->nome);
                $usario->setEmail($row->mail);
                $usario->setUsuario($row->usuario);
                $lista[$i] = $usario;
                $i++;
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

}
