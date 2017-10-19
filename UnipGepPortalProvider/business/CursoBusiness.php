<?php

require_once("util/Factory.php");
require_once("model/CursoDto.php");

/**
 * @author Wallace e Cia
 *
 */
class CursoBusiness
{

    public $con;


    /**
     * Método construtor da classe CursoBusiness
     * responsável por realizar a conexão com o BD.
     */
    public function CursoBusiness()
    {
        $this->con = new Factory();
    }

    /**
     * Função responsável por pesquisar todos os cursos.
     * @return String json com os dados dos cursos.
     */
    public function findAll()
    {
        $query = "select * from Curso";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por pesquisar todas os dados dos cursos da instituição do usuário logado.
     * @return String json contando os dados do curso do aluno logado.
     */
    public function find(CursoDto $cursoDto, int $idAluno)
    {
        $query = "SELECT * FROM Curso AS c "
            . "INNER JOIN CursoAluno AS ca"
            . "ON ca.idCurso = c.idCurso"
            . "WHERE `ca.idAluno` = $idAluno "
            . "AND `cidInstituicao` = $cursoDto->getIdInstituicao();";

        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por inserir cursos.
     * @param CursoDto $cursoDto dto do curso que será inserido na base de dados.
     * @return String json contendo a resposta da solicitação de inserção de curso.
     */
    public function insert(CursoDto $cursoDto)
    {
        $query = "INSERT INTO `curso` "
            . "(`idInstituicao`, `nome`, `descricao`, `ativo`) "
            . "VALUES ($cursoDto->getIdInstituicao(), $cursoDto->getNome(), $cursoDto->getDescricao(), $cursoDto->getAtivo());";

        $stmt = $this->con->getConnection()->prepare($query);

        $collection = $stmt->execute();

        return $collection;
    }

    /**
     * Função responsável por realizar o update dos dados do curso.
     * @param CursoDto $cursoDto dto do curso que será alterado na base de dados.
     * @return String json contendo a resposta da solicitação de update do curso.
     */
    public function update(CursoDto $cursoDto)
    {
        $query = "UPDATE `curso` SET  "
            . "`nome` = $cursoDto->getNome(), "
            . "`descricao` = $cursoDto->getDescricao() "
            . "WHERE `idCurso` = $cursoDto->getIdCurso() "
            . "AND `idInstituicao` = $cursoDto->getIdInstituicao();";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }


    /**
     * Função responsável por realizar a exclusão de um curso.
     * @param CursoDto $cursoDto dto do curso que será apagado da base de dados.
     * @return String json contendo a resposta da solicitação de exclusão de curso.
     */
    public function delete(CursoDto $cursoDto)
    {
        $query = "DELETE FROM `Curso`"
            . " WHERE `idCurso` = $cursoDto->getIdCurso() "
            . "AND `idInstituicao` = $cursoDto->getIdInstituicao();";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }
}

?>