<?php
require 'vendor/autoload.php';
require_once("util/Factory.php");

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
     * Função responsável por retornar os dados do orientador logado.
     * @return string json contando os dados do orientador logado.
     */

    /**
     * Pesquisa todos os Alunos
     * @return String json contendo os Alunos
     */
    public function find()
    {
        
        $idOrientador = $_GET['idOrientador'];
        $idInstituicao = $_GET['idInstituicao'];

        $query = "select * from orientador where idOrientador = $idOrientador and idInstituicao = $idInstituicao";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }


    /**
     * Função responsável por inserir um orientador.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert($json)
    {
        $orientador = json_decode($json, true);

        $idOrientador = $orientador[0]['idOrientador'];
        $idInstituicao = $orientador[0]['idInstituicao'];
        $nome = $orientador[0]['nome'];
        $cpf = $orientador[0]['cpf'];
        $titulacao = $orientador[0]['titulacao'];
        $ativo = $orientador[0]['ativo'];

        $query = "INSERT INTO `orientador` (`idOrientador`, `idInstituicao`, `nome`, `cpf`, `titulacao`, `ativo`) VALUES (NULL, '$idInstituicao', '$nome', '$cpf', '$titulacao', '$ativo');";

        $stmt =  $this->con->getConnection()->prepare($query);
     
        $collection = $stmt->execute();

        return $collection;
    }


 /**
     * Função responsável por realizar o update de dados do aluno.
     * @param $json String json contendo os dados da request.
     * @return string json contendo a resposta da solicitação de update do aluno.
     */
    public function update($json)
    {
        $orientador = json_decode($json, true);


        $idOrientador = $orientador[0]['idOrientador'];
        $idInstituicao = $orientador[0]['idInstituicao'];
        $nome = $orientador[0]['nome'];
        $cpf = $orientador[0]['cpf'];
        $titulacao = $orientador[0]['titulacao'];
        $ativo = $orientador[0]['ativo'];
        
        $query = "UPDATE `orientador` SET  `nome` = '$nome', `cpf` = '$cpf', `titulacao` = '$titulacao', `ativo` = '$ativo' WHERE `idOrientador` = $idOrientador AND `idInstituicao` = $idInstituicao;";
        
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }



  /**
     * Função responsável por excluir um orientador.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete($json)
    {
        $orientador = json_decode($json, true);

        $idOrientador = $orientador[0]['idOrientador'];
        $idInstituicao = $orientador[0]['idInstituicao'];
    
        $query = "DELETE FROM `orientador` WHERE `idOrientador` = $idOrientador AND `idInstituicao` = $idInstituicao;";
        
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }

    /**
     * Função responsável por selecionar os 5 orientadores com mais publicações.
     * @return String json contendo dados dos 5 orientadores com mais publicações.
     */
    public function rank5()
    {
        
        $idInstituicao = $_GET['idInstituicao'];

        $query = "SELECT * FROM (SELECT COUNT(*) AS nPublicacoes, o.nome from orientador as o inner join publicacaoorientador as po on o.idOrientador = po.idOrientador where o.idInstituicao = $idInstituicao group by o.idOrientador) as tabelaResultado ORDER BY tabelaResultado.nPublicacoes DESC LIMIT 5;";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por retornar por realizar a contagem dos orientadores ativos e inativos.
     * @return String json contendo a contagem ativos/inativos.
     */
     public function status()
    {
        
        $idInstituicao = $_GET['idInstituicao'];

        $query = "SELECT (SELECT COUNT(*) FROM orientador WHERE  ativo = 'N' AND idInstituicao = $idInstituicao) AS orientadoresInativos, (SELECT COUNT(*) FROM orientador WHERE ativo = 'S' AND idInstituicao = $idInstituicao) AS orientadoresAtivos;";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }


}

?>