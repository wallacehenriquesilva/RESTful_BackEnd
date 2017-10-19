<?php
require_once("business/PublicacaoBusiness.php");
require_once("business/AlunoPublicacaoBusiness.php");
require_once("business/OrientadorPublicacaoBusiness.php");
require_once("model/PublicacaoDto.php");

/**
 * Classe Adapter da Publicação.
 * @author Wallace e Cia
 *
 */
class PublicacaoService implements PublicacaoInterface
{

    var $publicacaoBusiness;
    var $publicacaoDto;

    /**
     * Método construtor da classe
     *
     */
    public function PublicacaoService($tipo)
    {
        $publicacaoDto = new PublicacaoDto();

        switch ($tipo) {
            case "orientador":
                $this->publicacaoBusiness = new OrientadorPublicacaoBusiness();
                break;
            case "aluno":
                $this->publicacaoBusiness = new AluPublicacaoBusiness();
                break;
            case "admin":
                $this->publicacaoBusiness = new PublicacaoBusiness();
                break;
        }
    }

    /**
     * Função responsável por pesquisar todas as publicações.
     * @return String json contendo os dados das publicações.
     */
    public function findAll()
    {
        $this->publicacaoDto->setIdInstituicao($_GET['idInstituicao']);

        $collection = $this->publicacaoBusiness->findAll();
        return json_encode($collection);
    }

    /**
     * Função responsável por pesquisar as publicações do usuário logado.
     * @return String json contando os dados do publicacao do usuário logado.
     */
    public function find()
    {
        $collection = $this->publicacaoBusiness->find();
        return json_encode($collection);
    }


    /**
     * Função responsável por inserir publicacoes.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert($json)
    {
        $collection = $this->publicacaoBusiness->insert($this->readJson($json));
        return json_encode($collection);
    }


    /**
     * Função responsável por realizar o update dos dados da publicacao.
     * @param $json String json contendo os dados da request.
     * @return string json contendo a resposta da solicitação de update da publicacao.
     */
    public function update($json)
    {
        $collection = $this->publicacaoBusiness->update($this->readJson($json));
        return json_encode($collection);
    }


    /**
     * Função responsávle por realizar a exclusão da publicação.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete($json)
    {
        $collection = $this->publicacaoBusiness->delete($this->readJson($json));
        return json_encode($collection);
    }

    /**
     * <p> Função responável por ler os dados do json e coloca-los em um Dto.</p>
     * @param $json Json contendo o corpo da requisição
     * @return PublicacaoDto Dto com os dados vindos do Json.
     */
    public function readJson($json): PublicacaoDto
    {
        $publicacao = json_decode($json, true);

        $this->publicacaoDto->setIdPublicacao($publicacao[0]['idPublicacao']);
        $this->publicacaoDto->setIdInstituicao($publicacao[0]['idInstituicao']);
        $this->publicacaoDto->setTipo($publicacao[0]['tipo']);
        $this->publicacaoDto->setDataPublicacao($publicacao[0]['dataPublicacao']);
        $this->publicacaoDto->setTitulo($publicacao[0]['titulo']);
        $this->publicacaoDto->setResumo($publicacao[0]['resumo']);
        $this->publicacaoDto->setPalavrasChave($publicacao[0]['palavrasChave']);
        $this->publicacaoDto->setAtivo($publicacao[0]['ativo']);

        return $this->publicacaoDto;
    }
}

?>