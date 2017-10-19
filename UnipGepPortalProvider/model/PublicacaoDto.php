<?php

/**
 * @author: Wallace Silva
 * @since: 1.0
 */
class PublicacaoDto
{
    private $idPublicacao;
    private $idInstituicao;
    private $tipo;
    private $dataPublicacao;
    private $titulo;
    private $resumo;
    private $palavrasChave;
    private $ativo;

    /**
     * @return Int
     */
    public function getIdPublicacao(): Int
    {
        return $this->idPublicacao;
    }

    /**
     * @param Int $idPublicacao
     */
    public function setIdPublicacao(Int $idPublicacao)
    {
        $this->idPublicacao = $idPublicacao;
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
    public function getTipo(): String
    {
        return $this->tipo;
    }

    /**
     * @param String $tipo
     */
    public function setTipo(String $tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return String
     */
    public function getDataPublicacao(): String
    {
        return $this->dataPublicacao;
    }

    /**
     * @param String $dataPublicacao
     */
    public function setDataPublicacao(String $dataPublicacao)
    {
        $this->dataPublicacao = $dataPublicacao;
    }

    /**
     * @return String
     */
    public function getTitulo(): String
    {
        return $this->titulo;
    }

    /**
     * @param String $titulo
     */
    public function setTitulo(String $titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return String
     */
    public function getResumo(): String
    {
        return $this->resumo;
    }

    /**
     * @param String $resumo
     */
    public function setResumo(String $resumo)
    {
        $this->resumo = $resumo;
    }

    /**
     * @return String
     */
    public function getPalavrasChave(): String
    {
        return $this->palavrasChave;
    }

    /**
     * @param String $palavrasChave
     */
    public function setPalavrasChave(String $palavrasChave)
    {
        $this->palavrasChave = $palavrasChave;
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