<?php
require_once("business/OrientadorBusiness.php");
require_once("model/OrientadorDto.php");

/**
 * Classe OrientadorService responsável pelo CRUD do Orientador.
 * @author Wallace e Cia
 *
 */
class OrientadorService
{
    var $orientadorBusiness;
    var $orientadorDto;

    /**
     * Método construtor da classe que setta o valor da orientadorService.
     */
    public function OrientadorService()
    {
        $this->orientadorBusiness = new OrientadorBusiness();
        $this->orientadorDto = new OrientadorDto();
    }

    /**
     * Função responsável por pesquisar todos os orientadores.
     * @return String json com todos os orientadores.
     */
    public function findAll()
    {
        return json_encode($this->orientadorBusiness->findAll());
    }


    /**
     * Função responsável por retornar os dados do orientador logado.
     * @return string json contando os dados do orientador logado.
     */
    public function find()
    {
        $this->orientadorDto->setIdOrientador($_GET['idOrientador']);
        $this->orientadorDto->setIdInstituicao($_GET['idInstituicao']);

        return json_encode($this->orientadorBusiness->find($this->orientadorDto));
    }


    /**
     * Função responsável por inserir um orientador.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert($json)
    {
        return json_encode($this->orientadorBusiness->insert(readJson($json)));
    }

    /**
     * Função responsável por realizar o update de dados do aluno.
     * @param $json String json contendo os dados da request.
     * @return string json contendo a resposta da solicitação de update do aluno.
     */
    public function update($json)
    {
        return json_encode($this->orientadorBusiness->update(readJson($json)));
    }

    /**
     * Função responsável por excluir um orientador.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete($json)
    {
        return json_encode($this->orientadorBusiness->delete(readJson($json)));
    }

    /**
     * Função responsável por selecionar os 5 orientadores com mais publicações.
     * @return String json contendo dados dos 5 orientadores com mais publicações.
     */
    public function rank5()
    {
        $this->orientadorDto->setIdInstituicao($_GET['idInstituicao']);

        return json_encode($this->orientadorBusiness->rank5($this->orientadorDto));
    }

    /**
     * Função responsável por retornar por realizar a contagem dos orientadores ativos e inativos.
     * @return String json contendo a contagem ativos/inativos.
     */
    public function status()
    {
        $this->orientadorDto->setIdInstituicao($_GET['idInstituicao']);

        return json_encode($this->orientadorBusiness->status($this->orientadorDto));
    }


    /**
     * Método responsável por ler o json e retornar um Dto
     * @param $json Json da requisição
     * @return OrientadorDto dto do json tratado.
     */
    public function readJson($json): OrientadorDto
    {
        $orientador = json_decode($json, true);

        $this->orientadorDto->setIdOrientador($_GET['idOrientador']);
        $this->orientadorDto->setIdInstituicao($_GET['idInstituicao']);
        $this->orientadorDto->setNome($orientador[0]['nome']);
        $this->orientadorDto->setCpf($orientador[0]['cpf']);
        $this->orientadorDto->setTitulacao($orientador[0]['titulacao']);
        $this->orientadorDto->setAtivo($orientador[0]['ativo']);

        return $this->orientadorDto;
    }
}

?>