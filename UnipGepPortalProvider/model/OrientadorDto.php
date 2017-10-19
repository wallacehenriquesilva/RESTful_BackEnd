<?php

/**
 * @author: Wallace Silva
 * @since: 1.0
 */

class OrientadorDto
{
    private $idOrientador;
    private $idInstituicao;
    private $nome;
    private $cpf;
    private $titulacao;
    private $ativo;

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
     * @return Int
     */
    public function getIdInstituicao(): Int
    {
        return $this->idInstituicao;
    }

    /**
     * @param Int $idInstituicao
     */
    public function setIdInstituicao(Int $idInstituicao)
    {
        $this->idInstituicao = $idInstituicao;
    }

    /**
     * @return String
     */
    public function getNome(): String
    {
        return $this->nome;
    }

    /**
     * @param String $nome
     */
    public function setNome(String $nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return String
     */
    public function getCpf(): String
    {
        return $this->cpf;
    }

    /**
     * @param String $cpf
     */
    public function setCpf(String $cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return String
     */
    public function getTitulacao(): String
    {
        return $this->titulacao;
    }

    /**
     * @param String $titulacao
     */
    public function setTitulacao(String $titulacao)
    {
        $this->titulacao = $titulacao;
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