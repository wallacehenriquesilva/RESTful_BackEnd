<?php
require 'vendor/autoload.php';
require_once("util/Factory.php");
require_once("model/OrientadorDto.php");

/**
 * @author Wallace e Cia
 *
 */
class OrientadorBusiness
{

    public $con;

    /**
     * Método construtor da classe que setta o valor da orientadorBusiness.
     * e realiza a conexão com o BD.
     */
    public function OrientadorBusiness()
    {
        $this->con = new Factory();
    }

    /**
     * Função responsável por pesquisar todos os orientadores.
     * @return String json com todos os orientadores.
     */
    public function findAll()
    {
        $query = "select * from orientador";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Pesquisa todos os Orientadores
     * @param OrientadorDto $orientadorDto dto do orientador a ser pesquisado.
     * @return String json contendo os Orientadores
     */
    public function find(OrientadorDto $orientadorDto)
    {
        $query = "SELECT * FROM orientador "
            . "WHERE idOrientador = $orientadorDto->getIdOrientador() "
            . "AND idInstituicao = $orientadorDto->getIdInstituicao()";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por inserir um orientador.
     * @param OrientadorDto $orientadorDto dto do orientador que sera inserido na base.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert(OrientadorDto $orientadorDto)
    {
        $query = "INSERT INTO `orientador` "
            . "(`idOrientador`, `idInstituicao`, `nome`, `cpf`, `titulacao`, `ativo`) "
            . "VALUES (NULL, $orientadorDto->getIdInstituicao(), "
            . "$orientadorDto->getNome(), "
            . "$orientadorDto->getCpf(), "
            . "$orientadorDto->getTitulacao(), "
            . "$orientadorDto->getAtivo());";

        $stmt = $this->con->getConnection()->prepare($query);

        $collection = $stmt->execute();

        return $collection;
    }


    /**
     * Função responsável por realizar o update de dados do aluno.
     * @param OrientadorDto $orientadorDto dto do orientador que sera alterado na base.
     * @return string json contendo a resposta da solicitação de update do aluno.
     */
    public function update(OrientadorDto $orientadorDto)
    {
        $query = "UPDATE `orientador` SET  "
            . "`nome` = $orientadorDto->getNome(), "
            . "`cpf` = $orientadorDto->getCpf(), "
            . "`titulacao` = $orientadorDto->getTitulacao(), "
            . "`ativo` = $orientadorDto->getAtivo() "
            . "WHERE `idOrientador` = $orientadorDto->getIdOrientador() "
            . "AND `idInstituicao` = $orientadorDto->getIdInstituicao();";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }

    /**
     * Função responsável por excluir um orientador.
     * @param OrientadorDto $orientadorDto dto do orientador que sera apagado da base.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete(OrientadorDto $orientadorDto)
    {
        $query = "DELETE FROM `orientador` "
            . "WHERE `idOrientador` = $orientadorDto->getIdOrientador()"
            . "AND `idInstituicao` = $orientadorDto->getIdInstituicao();";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }

    /**
     * Função responsável por selecionar os 5 orientadores com mais publicações.
     * @param OrientadorDto $orientadorDto dto com o id da instituição que sera feito o top 5.
     * @return String json contendo dados dos 5 orientadores com mais publicações.
     */
    public function rank5(OrientadorDto $orientadorDto)
    {
        $query = "SELECT * FROM "
            . "(SELECT COUNT(*) AS nPublicacoes, o.nome "
            . "FROM orientador "
            . "AS o INNER JOIN publicacaoorientador AS po "
            . "ON o.idOrientador = po.idOrientador "
            . "WHERE o.idInstituicao = $orientadorDto->getIdInstituicao()"
            . "GROUP BY o.idOrientador) AS tabelaResultado "
            . "ORDER BY tabelaResultado.nPublicacoes DESC "
            . "LIMIT 5;";

        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por retornar por realizar a contagem dos orientadores ativos e inativos.
     * @param OrientadorDto $orientadorDto dto com o id da instituição que sera feito o select de status.
     * @return String json contendo a contagem ativos/inativos.
     */
    public function status(OrientadorDto $orientadorDto)
    {
        $query = "SELECT (SELECT COUNT(*) FROM orientador "
            . "WHERE  ativo = 'N' "
            . "AND idInstituicao = $orientadorDto->getIdInstituicao()) AS orientadoresInativos, "
            . "(SELECT COUNT(*) FROM orientador "
            . "WHERE ativo = 'S' "
            . "AND idInstituicao = $orientadorDto->getIdInstituicao()) AS orientadoresAtivos;";

        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }
}

?>