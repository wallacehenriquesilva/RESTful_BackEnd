<?php
require_once("business/CursoBusiness.php");
require_once("model/CursoDto.php");

/**
 *
 * @author Wallace e Cias
 *
 */
class CursoService
{

    var $cursoBusiness;
    var $cursoDto;

    /**
     * Método construtor da classe CursoService
     */
    public function CursoService()
    {
        $this->cursoBusiness = new CursoBusiness();
        $this->cursoDto = new CursoDto();
    }

    /**
     * Função responsável por pesquisar todos os cursos.
     * @return String json com os dados dos cursos.
     */
    public function findAll()
    {
        return json_encode($this->cursoBusiness->findAll());
    }

    /**
     * Função responsável por pesquisar todas os dados dos cursos da instituição do usuário logado.
     * @return String json contando os dados do curso do aluno logado.
     */
    public function find()
    {
        $idAluno = $_GET['idAluno'];
        $this->cursoDto->getIdInstituicao($_GET['idInstituicao']);

        return json_encode($this->cursoBusiness->find($this->cursoDto, $idAluno));
    }


    /**
     * Função responsável por inserir cursos.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção de curso.
     */
    public function insert($json)
    {
        return json_encode($this->cursoBusiness->insert($this->readJson($json)));
    }


    /**
     * Função responsável por realizar o update dos dados do curso.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de update do curso.
     */
    public function update($json)
    {
        return json_encode($this->cursoBusiness->update($this->readJson($json)));
    }


    /**
     * Função responsável por realizar a exclusão de um curso.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão de curso.
     */
    public function delete($json)
    {
        return json_encode($this->cursoBusiness->delete($this->readJson($json)));
    }

    public function readJson($json): CursoDto
    {
        $curso = json_decode($json, true);

        $this->cursoDto->setIdCurso($curso['idCurso']);
        $this->cursoDto->setIdInstituicao($curso['idInstituicao']);
        $this->cursoDto->setNome($curso['nome']);
        $this->cursoDto->setDescricao($curso['descricao']);
        $this->cursoDto->setAtivo($curso['ativo']);

        return $this->cursoDto;
    }
}

?>