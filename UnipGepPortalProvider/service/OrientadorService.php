<?php
require_once("business/OrientadorBusiness.php");

/**
 * Classe OrientadorService responsável pelo CRUD do Orientador.
 * @author Wallace e Cia
 *
 */
class OrientadorService
{

    var $orientadorBusiness;

    /**
    * Método construtor da classe que setta o valor da orientadorService.
    */
    public function OrientadorService()
    {
        $this->orientadorBusiness = new OrientadorBusiness();
    }

    /**
    * Função responsável por pesquisar todos os orientadores.
    * @return String json com todos os orientadores.
    */
    public function findAll()
    {
        header("Content-Type: application/json");
        $orientadorBusiness = new OrientadorBusiness();
        $collection = $orientadorBusiness->findAll();
        return json_encode($collection);
    }


    /**
     * Função responsável por retornar os dados do orientador logado.
     * @return string json contando os dados do orientador logado.
     */
    public function find()
    {
        header("Content-Type: application/json");
        $orientadorBusiness = new OrientadorBusiness();
        $collection = $orientadorBusiness->find();
        return json_encode($collection);
    }


    /**
     * Função responsável por inserir um orientador.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert($json)
    {
        $orientadorBusiness = new OrientadorBusiness();
        $collection = $orientadorBusiness->insert($json);
        return json_encode($collection);
    }


    /**
     * Função responsável por realizar o update de dados do aluno.
     * @param $json String json contendo os dados da request.
     * @return string json contendo a resposta da solicitação de update do aluno.
     */
    public function update($json)
    {
        $orientadorBusiness = new OrientadorBusiness();
        $collection = $orientadorBusiness->update($json);
        return json_encode($collection);
    }



    /**
     * Função responsável por excluir um orientador.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete($json)
    {
        $orientadorBusiness = new OrientadorBusiness();
        $collection = $orientadorBusiness->delete($json);
        return json_encode($collection);
    }

    /**
     * Função responsável por selecionar os 5 orientadores com mais publicações.
     * @return String json contendo dados dos 5 orientadores com mais publicações.
     */
    public function rank5()
    {
        $orientadorBusiness = new OrientadorBusiness();
        $collection = $orientadorBusiness->rank5();
        return json_encode($collection);
    }

    /**
     * Função responsável por retornar por realizar a contagem dos orientadores ativos e inativos.
     * @return String json contendo a contagem ativos/inativos.
     */
    public function status()
    {
        $orientadorBusiness = new OrientadorBusiness();
        $collection = $orientadorBusiness->status();
        return json_encode($collection);
    }
}
?>