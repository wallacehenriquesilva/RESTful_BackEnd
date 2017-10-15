<?php
require_once("business/CursoBusiness.php");

/**
 * 
 * @author Wallace e Cias
 *
 */
class CursoService
{

    var $cursoBusiness;

    /**
    * Método construtor da classe CursoService
    */
    public function CursoService()
    {
        $this->cursoBusiness = new CursoBusiness();
    }

    /**
     * Função responsável por pesquisar todos os cursos.
     * @return String json com os dados dos cursos.
     */
    public function findAll()
    {
        $cursoBusiness = new CursoBusiness();
        $collection = $cursoBusiness->findAll();
        return json_encode($collection);
    }

     /**
     * Função responsável por pesquisar todas os dados dos cursos da instituição do usuário logado.
     * @return String json contando os dados do curso do aluno logado.
     */
    public function find()
    {
        $cursoBusiness = new CursoBusiness();
        $collection = $cursoBusiness->find();
        return json_encode($collection);
    }


    /**
     * Função responsável por inserir cursos.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção de curso.
     */
    public function insert($json)
    {
        $cursoBusiness = new CursoBusiness();
        $collection = $cursoBusiness->insert($json);
        return json_encode($collection);
    }


    /**
     * Função responsável por realizar o update dos dados do curso.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de update do curso.
     */
    public function update($json)
    {
        $cursoBusiness = new CursoBusiness();
        $collection = $cursoBusiness->update($json);
        return json_encode($collection);
    }



    /**
     * Função responsável por realizar a exclusão de um curso.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão de curso.
     */
    public function delete($json)
    {
        $cursoBusiness = new CursoBusiness();
        $collection = $cursoBusiness->delete($json);
        return json_encode($collection);
    }
}
?>