<?php
require_once("business/InstituicaoBusiness.php");
require_once("model/InstituicaoDto.php");

/**
 * Classe do método InstituicaoService responsável pelo CRUD da instituição.
 * @author Wallace
 */
class InstituicaoService
{

    //Variável da instituicão
    var $instituicaoBusiness;
    var $instituicaoDto;


    /**
     * Método construtor da classe que setta o valor da instuicaoBusiness.
     */
    public function InstituicaoService()
    {
        $this->instituicaoBusiness = new InstituicaoBusiness();
        $this->instituicaoDto = new InstituicaoDto();
    }

    /**
     * Função responsável por pesquisar todas as instituições
     * @return String json com todas as instituições.
     */
    public function findAll()
    {
        $instituicaoBusiness = new InstituicaoBusiness();
        $collection = $instituicaoBusiness->findAll();
        echo json_encode($collection);
        return json_encode($collection);
    }

    /**
     * Função responsável por inserir instituições
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert($json)
    {
        $instituicao = json_decode($json, true);

        $this->instituicaoDto->setSigla($instituicao[0]['sigla']);
        $this->instituicaoDto->setDescricao($instituicao[0]['descricao']);
        $this->instituicaoDto->setAtivo($instituicao[0]['ativo']);

        $instituicaoBusiness = new InstituicaoBusiness();
        $collection = $instituicaoBusiness->insert($json);
        return json_encode($collection);
    }


    /**
     * Função responsável por pesquisar os dados da instituição do aluno logado.
     * @return string json contando os dados da instituição do aluno logado.
     */
    public function find()
    {
        $this->instituicaoDto->setIdInstituicao($_GET['idInstituicao']);

        $instituicaoBusiness = new InstituicaoBusiness();
        $collection = $instituicaoBusiness->find($this->instituicaoDto);
        return json_encode($collection);
    }


    /**
     * Função responsável por realizar o update de dados da instituição.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de update da instituição.
     */
    public function update($json)
    {
        $instituicao = json_decode($json, true);

        $this->instituicaoDto->setIdInstituicao($instituicao[0]['idInstituicao']);
        $this->instituicaoDto->setSigla($instituicao[0]['sigla']);
        $this->instituicaoDto->setDescricao($instituicao[0]['descricao']);
        $this->instituicaoDto->setAtivo($instituicao[0]['ativo']);

        $instituicaoBusiness = new InstituicaoBusiness();
        $collection = $instituicaoBusiness->update($json);
        return json_encode($collection);
    }


    /**
     * Função responsável por excluir a instituição.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete($json)
    {
        $instituicao = json_decode($json, true);

        $this->instituicaoDto->setIdInstituicao($instituicao[0]['idInstituicao']);

        $instituicaoBusiness = new InstituicaoBusiness();
        $collection = $instituicaoBusiness->delete($this->instituicaoDto);
        return json_encode($collection);
    }

    /**
     * Função responsável por pegar os dados do painel indicador.
     * @param $json String json contendo os dados da request.
     * @return String json com os dados do painel indicador.
     */
    public function indicador()
    {
        $this->instituicaoDto->setIdInstituicao($_GET['idInstituicao']);

        $instituicaoBusiness = new InstituicaoBusiness();
        $collection = $instituicaoBusiness->indicador($this->instituicaoDto);
        echo json_encode($collection);
        return json_encode($collection);
    }
}

?>