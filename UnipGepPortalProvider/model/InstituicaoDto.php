<?php

/**
 * @author: Wallace Silva
 * @since: 1.0
 */

class InstituicaoDto
{
    private $idInstituicao;
    private $sigla;
    private $descricao;
    private $ativo;

    /**
     * @return String
     */
    public function getIdInstituicao(): String
    {
        return $this->idInstituicao;
    }

    /**
     * @param String $idInstituicao
     */
    public function setIdInstituicao(String $idInstituicao)
    {
        $this->idInstituicao = $idInstituicao;
    }

    /**
     * @return String
     */
    public function getSigla(): String
    {
        return $this->sigla;
    }

    /**
     * @param String $sigla
     */
    public function setSigla(String $sigla)
    {
        $this->sigla = $sigla;
    }

    /**
     * @return String
     */
    public function getDescricao(): String
    {
        return $this->descricao;
    }

    /**
     * @param String $descricao
     */
    public function setDescricao(String $descricao)
    {
        $this->descricao = $descricao;
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