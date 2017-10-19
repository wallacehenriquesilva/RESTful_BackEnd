<?php
/**
 * @author: Wallace Silva
 * @since: 1.0
 */

class AlunoDto
{

    private $idAluno;
    private $idOrientador;
    private $idInstituicao;
    private $matricula;
    private $nome;
    private $sexo;
    private $dataNascimento;
    private $cpf;
    private $ativo;

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
    public function getMatricula(): String
    {
        return $this->matricula;
    }

    /**
     * @param String $matricula
     */
    public function setMatricula(String $matricula)
    {
        $this->matricula = $matricula;
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
     * @return Int
     */
    public function getSexo(): Int
    {
        return $this->sexo;
    }

    /**
     * @param Int $sexo
     */
    public function setSexo(Int $sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return String
     */
    public function getDataNascimento(): String
    {
        return $this->dataNascimento;
    }

    /**
     * @param String $dataNascimento
     */
    public function setDataNascimento(String $dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
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