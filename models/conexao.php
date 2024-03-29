<?php
class Conexao {

    private $con;
    public static $instance;

    public function __construct() {
        //$this->conectar();
    }
	
    /* configuração */
    public static function getInstance() {
		
		/** LIVE
		 * $host = 'cod_barras.mysql.dbaas.com.br';
         * $banco = 'cod_barras';
         * $user = 'cod_barras';
         * $senha = 'CodBarras!@#00';
		 */
        
		/*LOCALHOST*/
		$host = 'localhost';
        $banco = 'codigo_barras';
        $user = 'root';
        $senha = '';
        
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host='.$host.';dbname='.$banco.'', $user, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }

}