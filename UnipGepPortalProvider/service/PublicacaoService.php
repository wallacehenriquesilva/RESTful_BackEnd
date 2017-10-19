<?php
require_once("business/PublicacaoBusiness.php");
require_once("business/AlunoPublicacaoBusiness.php");
require_once("business/OrientadorPublicacaoBusiness.php");

/**
 * Classe Adapter da Publicação.
 * @author Wallace e Cia
 *
 */
class PublicacaoService implements PublicacaoInterface
{

    var $publicacaoBusiness;

    /**
     * Método construtor da classe, que realiza o adapter.
     *
     */
    public function PublicacaoService($tipo)
    {
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
        $collection = $this->publicacaoBusiness->insert($json);
        return json_encode($collection);
    }


    /**
     * Função responsável por realizar o update dos dados da publicacao.
     * @param $json String json contendo os dados da request.
     * @return string json contendo a resposta da solicitação de update da publicacao.
     */
    public function update($json)
    {
        $collection = $this->publicacaoBusiness->update($json);
        return json_encode($collection);
    }


    /**
     * Função responsávle por realizar a exclusão da publicação.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete($json)
    {
        $collection = $this->publicacaoBusiness->delete($json);
        return json_encode($collection);
    }
}

?>