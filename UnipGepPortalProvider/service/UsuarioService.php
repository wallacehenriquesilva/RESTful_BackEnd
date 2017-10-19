<?php
require_once("business/UsuarioBusiness.php");
require_once("model/UsuarioDto.php");

/**
 * Classe de login do usuário.
 * @author Wallace e Cia
 *
 */
class UsuarioService
{

    var $usuarioBusiness;
    var $usuarioDto;

    public function usuarioService()
    {
        $this->usuarioBusiness = new UsuarioBusiness();
        $this->usuarioDto = new UsuarioDto();
    }

    /**
     * Função responsável por realizar o login do usuário no sistema.
     * @return String json contendo os daods do usuário logado no sistema.
     */
    public function login()
    {
        $this->usuarioDto->setLogin($_GET['login']);
        $this->usuarioDto->setSenha($_GET['senha']);

        $usuarioBusiness = new UsuarioBusiness();
        $collection = $usuarioBusiness->login($this->usuarioDto);
        return json_encode($collection);
    }
}

?>