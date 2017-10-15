<?php
require_once("business/AlunoBusiness.php");

/**
 * Classe AlunoService responsável por fazer a conexão com a busnisses e pegar seu retorno.
 * @author Wallace e Cia
 *
 */
class AlunoService
{

    var $alunoBusiness;

    /**
     * Método construtor da classe Aluno service.
     */
    public function AlunoService()
    {
        $this->alunoBusiness = new AlunoBusiness();
    }

    /**
     * Função responsável por pesquisar todos os Alunos.
     * @return String json contendo o resultado do select realizado.
     */
    public function findAll()
    {
        header("Content-Type: application/json");
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->findAll();
        return json_encode($collection);
    }


    /**
     * Função responsável por pesquisar todos os dados do aluno logado.
     * @return String json contando os dados do aluno logado.
     */
    public function find()
    {
        header("Content-Type: application/json");
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->find();
        return json_encode($collection);
    }


    /**
     * Função responsável por inserir novos alunos
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta do server após a inserção.
     */
    public function insert($json)
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->insert($json);
        return json_encode($collection);
    }


    /**
     * Função responsável por realizar o update de dados do aluno.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de update do aluno.
     */
    public function update($json)
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->update($json);
        return json_encode($collection);
    }



    /**
     * Função responsável por realizar a exclusão de um aluno.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão do aluno.
     */
    public function delete($json)
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->delete($json);
        return json_encode($collection);
    }

    /**
     * Função responsável por selecionar os 5 alunos com mais publicações.
     * @return String json contendo dados dos 5 alunos com mais publicações.
     */
    public function rank5()
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->rank5();
        return json_encode($collection);
    }

    /**
     * Função responsável por realizar a contagem dos alunos ativos e inativos.
     * @return String json contendo o número de alunos ativos e inativos.
     */
    public function status()
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->status();
        return json_encode($collection);
    }
}
?>