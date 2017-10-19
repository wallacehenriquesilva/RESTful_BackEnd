<?php

/**
 * @author: Wallace Silva
 * @since: 1.0
 */
class UsuarioDto
{
    private $idUsuario;
    private $idAluno;
    private $idOrientador;
    private $login;
    private $senha;
    private $administrador;
    private $ativo;

    /**
     * @return Int
     */
    public function getIdUsuario(): Int
    {
        return $this->idUsuario;
    }

    /**
     * @param Int $idUsuario
     */
    public function setIdUsuario(Int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return Int
     */
    public function getIdAluno(): Int
    {
        return $this->idAluno;
    }

    /**
     * @param Int $idAluno
     */
    public function setIdAluno(Int $idAluno)
    {
        $this->idAluno = $idAluno;
    }

    /**
     * @return Int
     */
    public function getIdOrientador(): Int
    {
        return $this->idOrientador;
    }

    /**
     * @param Int $idOrientador
     */
    public function setIdOrientador(Int $idOrientador)
    {
        $this->idOrientador = $idOrientador;
    }

    /**
     * @return String
     */
    public function getLogin(): String
    {
        return $this->login;
    }

    /**
     * @param String $login
     */
    public function setLogin(String $login)
    {
        $this->login = $login;
    }

    /**
     * @return String
     */
    public function getSenha(): String
    {
        return $this->senha;
    }

    /**
     * @param String $senha
     */
    public function setSenha(String $senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return String
     */
    public function getAdministrador(): String
    {
        return $this->administrador;
    }

    /**
     * @param String $administrador
     */
    public function setAdministrador(String $administrador)
    {
        $this->administrador = $administrador;
    }

    /**
     * @return String
     */
    public function getAtivo(): String
    {
        return $this->ativo;
    }

    /**
     * @param String $ativo
     */
    public function setAtivo(String $ativo)
    {
        $this->ativo = $ativo;
    }


}