<?php
require 'vendor/autoload.php';
require_once("util/Factory.php");

/**
 * @author Wallace e Cia
 *
 */
class UsuarioBusiness
{

    public $con;

    public function UsuarioBusiness()
    {
        $this->con = new Factory();
    }

    /**
     * Função responsável por executar a query e realizar o login do usuário no sistema.
     * @return String json contendo os daods do usuário logado no sistema.
     */
    public function login()
    {
        
        $login = $_GET['login'];
        $senha = $_GET['senha'];

        $query = "SELECT * FROM `usuario` WHERE login = '$login' and senha = '$senha';";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }
}

?>