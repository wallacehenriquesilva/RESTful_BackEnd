<?php

require 'vendor/autoload.php';
require_once("util/Factory.php");
require_once("interface/PublicacaoInterface.php");
require_once("model/PublicacaoDto.php");

/**
 * @author Wallace e Cia
 *
 */
class AlunoPublicacaoBusiness implements PublicacaoInterface
{

    public $con;

    /**
     * Método construtor da classe e realiza a conexão com o BD
     */
    public function AlunoPublicacaoBusiness()
    {
        $this->con = new Factory();
    }

    /**
     * Função responsável por pesquisar todas as publicações do aluno.
     * @return String json contendo os dados das publicações do aluno.
     */
    public function findAll()
    {
        $query = "SELECT * FROM Publicacao";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por pesquisar as publicações do aluno logado.
     * @param PublicacaoDto $publicacaoDto dto da publicação que sera pesquisada.
     * @return String json contando os dados do publicacao do aluno logado.
     */
    public function find(PublicacaoDto $publicacaoDto)
    {
        $query = "SELECT * FROM publicacao AS p "
            . "INNER JOIN publicacaoaluno AS pa "
            . "ON p.idPublicacao = pa.idPublicacao "
            . "WHERE pa.idAluno = $publicacaoDto->getIdAluno() "
            . "AND  p.idInstituicao = $publicacaoDto->getIdInstituicao()";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }


    /**
     * Função responsável por inserir publicacoes do aluno.
     * @param PublicacaoDto $publicacaoDto dto da publicação que sera inserida.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert(PublicacaoDto $publicacaoDto)
    {
        $query = "INSERT INTO `publicacao` (`idPublicacao`, `idInstituicao`, `tipo`, `dataPublicacao`, `titulo`, `resumo`, `palavrasChave`, `ativo`) "
            . "VALUES (NULL, $publicacaoDto->getIdInstituicao(), "
            . "$publicacaoDto->getTipo(), "
            . "$publicacaoDto->getDataPublicacao(), "
            . "$publicacaoDto->getTitulo(), "
            . "$publicacaoDto->getResumo(), "
            . "$publicacaoDto->getPalavrasChave(), "
            . "$publicacaoDto->getAtivo());";

        $stmt = $this->con->getConnection()->prepare($query);

        $collection = $stmt->execute();

        return $collection;
    }


    /**
     * Função responsável por realizar o update dos dados da publicacao do aluno.
     * @param PublicacaoDto $publicacaoDto dto da publicação que sera atualizada.
     * @return string json contendo a resposta da solicitação de update da publicacao.
     */
    public function update(PublicacaoDto $publicacaoDto)
    {
        $query = "UPDATE `publicacao` SET  "
            . "`idInstituicao` = $publicacaoDto->getIdInstituicao(), "
            . "`tipo` = $publicacaoDto->getTipo(), "
            . "`dataPublicacao` = $publicacaoDto->getDataPublicacao(), "
            . "`titulo` = $publicacaoDto->getTitulo(), "
            . "`resumo` = $publicacaoDto->getResumo(), "
            . "`palavrasChave` = $publicacaoDto->getPalavrasChave(), "
            . "`ativo` = $publicacaoDto->getAtivo() "
            . "WHERE `idAluno` = $publicacaoDto->getIdAluno() "
            . "AND `idInstituicao` = $publicacaoDto->geIddInstituicao();";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }


    /**
     * Função responsávle por realizar a exclusão da publicação do aluno.
     * @param PublicacaoDto $publicacaoDto dto da publicação que sera apagada.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete(PublicacaoDto $publicacaoDto)
    {
        $query = "DELETE FROM `publicacao` "
            . "WHERE `idPublicacao` = $publicacaoDto->getIdPublicacao() "
            . "AND `idInstituicao` = $publicacaoDto->getIdPublicacao();";
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }
}

?>