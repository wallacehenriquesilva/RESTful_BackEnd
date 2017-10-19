<?php

require_once("util/Factory.php");
require_once("model/InstituicaoDto.php");

/**
 * @author Robson
 *
 */
class InstituicaoBusiness
{

    public $con;

    /**
     * Método construtor da classe que setta o valor da instuicaoBusiness.
     * e realiza a conexão com  o BD.
     */
    public function InstituicaoBusiness()
    {
        $this->con = new Factory();
    }

    /**
     * Função responsável por pesquisar todas as instituições
     * @return String json com todas as instituições.
     */
    public function findAll()
    {
        $query = "select * from Instituicao";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por pesquisar os dados da instituição do aluno logado.
     * @param CursoDto $cursoDto dto da instituição que esta sendo pesquisado.
     * @return string json contando os dados da instituição do aluno logado.
     */
    public function find(CursoDto $cursoDto)
    {
        $query = "SELECT * FROM Instituicao "
            . "WHERE idInstituicao = $cursoDto->getIdInstituicao();";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por inserir instituições
     * @param InstituicaoDto $instituicaoDto dto da instituicao que sera inserida.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert(InstituicaoDto $instituicaoDto)
    {
        $query = "INSERT INTO `instituicao` (`sigla`, `descricao`, `ativo`) "
            . "VALUES ($instituicaoDto->getSigla(), $instituicaoDto->getDescricao(), $instituicaoDto->getAtivo());";

        $stmt = $this->con->getConnection()->prepare($query);

        $collection = $stmt->execute();

        return $collection;
    }

    /**
     * Função responsável por realizar o update de dados da instituição.
     * @param InstituicaoDto $instituicaoDto dto da instituição que sera alterada na base de dados.
     * @return String json contendo a resposta da solicitação de update da instituição.
     */
    public function update(InstituicaoDto $instituicaoDto)
    {
        $query = "UPDATE `instituicao` SET  "
            . "`sigla` = $instituicaoDto->getSigla(), "
            . "`descricao` = $instituicaoDto->getDescricao(), "
            . "`ativo` = $instituicaoDto->getAtivo() "
            . "WHERE `idInstituicao` = $instituicaoDto->getIdInstituicao();";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }


    /**
     * Função responsável por excluir a instituição.
     * @param InstituicaoDto $instituicaoDto dto da instituição que sera apagada da base de dados.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete(InstituicaoDto $instituicaoDto)
    {
        $query = "DELETE FROM `instituicao` "
            . "WHERE `idInstituicao` = $instituicaoDto->getIdInstituicao()";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }

    /**
     * Função responsável por pegar os dados do painel indicador.
     * @param InstituicaoDto $instituicaoDto dto da instituição que aparecerá o indicador.
     * @return String json com os dados do painel indicador.
     */
    public function indicador(InstituicaoDto $instituicaoDto)
    {

        $query = "SELECT (SELECT COUNT(*) FROM Aluno "
            . "WHERE idInstituicao = $instituicaoDto->getIdInstituicao()) AS totalAluno, "
            . "(SELECT COUNT(*) FROM Curso "
            . "WHERE idInstituicao = $instituicaoDto->getIdInstituicao()) AS totalCursos, "
            . "(SELECT COUNT(*) FROM Orientador "
            . "WHERE idInstituicao = $instituicaoDto->getIdInstituicao()) AS totalOrientadores, "
            . "(SELECT COUNT(*) FROM Publicacao "
            . "WHERE idInstituicao = $instituicaoDto->getIdInstituicao()) AS totalPublicacoes";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }
}

?>