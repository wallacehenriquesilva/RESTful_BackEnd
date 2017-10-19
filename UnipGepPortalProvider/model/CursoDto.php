<?php

/**
 * @author: Wallace Silva
 * @since: 1.0
 */

class CursoDto
{
    private $idCurso;
    private $idInstituicao;
    private $nome;
    private $descricao;
    private $ativo;

    /**
     * @return Int
     */
    public function getIdCurso(): Int
    {
        return $this->idCurso;
    }

    /**
     * @param Int $idCurso
     */
    public function setIdCurso(Int $idCurso)
    {
        $this->idCurso = $idCurso;
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