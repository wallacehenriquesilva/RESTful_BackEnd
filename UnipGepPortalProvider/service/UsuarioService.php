<?php
require_once("business/UsuarioBusiness.php");

/**
 * Classe de login do usuário.
 * @author Wallace e Cia
 *
 */
class UsuarioService
{

    var $usuarioBusiness;

    public function usuarioService()
    {
        $this->usuarioBusiness = new UsuarioBusiness();
    }

    /**
     * Função responsável por realizar o login do usuário no sistema.
     * @return String json contendo os daods do usuário logado no sistema.
     */
    public function login()
    {
        header("Content-Type: application/json");
        $usuarioBusiness = new UsuarioBusiness();
        $collection = $usuarioBusiness->login();
        return json_encode($collection);
    }
}
?>