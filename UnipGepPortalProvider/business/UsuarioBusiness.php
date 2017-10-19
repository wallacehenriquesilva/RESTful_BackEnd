<?php
require 'vendor/autoload.php';
require_once("model/UsuarioDto.php");

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
     * @param UsuarioDto $usuarioDto dto de dados do usuário que ira fazer o login.
     * @return String json contendo os daods do usuário logado no sistema.
     */
    public function login(UsuarioDto $usuarioDto)
    {
        $query = "SELECT * FROM `usuario` "
            . "WHERE login = $usuarioDto->getLogin() "
            . "AND senha = $usuarioDto->getSenha();";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }
}

?>