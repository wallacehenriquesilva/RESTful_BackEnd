<?php

require 'vendor/autoload.php';
require_once("util/Factory.php");
require_once("interface/PublicacaoInterface.php");


/**
 * @author Wallace e Cia
 *
 */
class AlunoPublicacaoBusiness 
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
        $query = "select * from Publicacao";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

 /**
     * Função responsável por pesquisar as publicações do aluno logado.
     * @return String json contando os dados do publicacao do aluno logado.
     */
    public function find()
    {
        $idAluno = $_GET['idAluno'];
        $idInstituicao = $_GET['idInstituicao'];

        $query = "SELECT * FROM publicacao as p INNER JOIN publicacaoaluno as pa ON p.idPublicacao = pa.idPublicacao where pa.idAluno = $idAluno and  p.idInstituicao = $idInstituicao";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }



    /**
     * Função responsável por inserir publicacoes do aluno.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção.
     */
    public function insert($json)
    {
        $publicacao = json_decode($json, true);

        $idInstituicao = $publicacao[0]['idInstituicao'];
        $tipo = $publicacao[0]['tipo'];
        $dataPublicacao = $publicacao[0]['dataPublicacao'];
        $titulo = $publicacao[0]['titulo'];
        $resumo = $publicacao[0]['resumo'];
        $palavrasChave = $publicacao[0]['palavrasChave'];
        $ativo = $publicacao[0]['ativo'];

        $query = "INSERT INTO `publicacao` (`idPublicacao`, `idInstituicao`, `tipo`, `dataPublicacao`, `titulo`, `resumo`, `palavrasChave`, `ativo`) VALUES (NULL, '$idInstituicao', '$tipo', '$dataPublicacao', '$titulo', '$resumo', '$palavrasChave', '$ativo');";

        $stmt =  $this->con->getConnection()->prepare($query);
     
        $collection = $stmt->execute();

        return $collection;
    }


 /**
     * Função responsável por realizar o update dos dados da publicacao do aluno.
     * @param $json String json contendo os dados da request.
     * @return string json contendo a resposta da solicitação de update da publicacao.
     */
    public function update($json)
    {
        $publicacao = json_decode($json, true);

        $idPublicacao = $publicacao[0]['idInstituicao'];
        $idInstituicao = $publicacao[0]['idInstituicao'];
        $tipo = $publicacao[0]['tipo'];
        $dataPublicacao = $publicacao[0]['dataPublicacao'];
        $titulo = $publicacao[0]['titulo'];
        $resumo = $publicacao[0]['resumo'];
        $palavrasChave = $publicacao[0]['palavrasChave'];
        $ativo = $publicacao[0]['ativo'];
        
        $query = "UPDATE `publicacao` SET  `idInstituicao` = '$idInstituicao', `tipo` = '$tipo', `dataPublicacao` = '$dataPublicacao', `titulo` = '$titulo', `resumo` = '$resumo', `palavrasChave` = '$palavrasChave', `ativo` = '$ativo' WHERE `idAluno` = $idAluno AND `idInstituicao` = $idInstituicao;;";
        
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }




      /**
     * Função responsávle por realizar a exclusão da publicação do aluno.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão.
     */
    public function delete($json)
    {
        $publicacao = json_decode($json, true);

        $idPublicacao = $publicacao[0]['idPublicacao'];
        $idPublicacao = $publicacao[0]['idInstituicao'];
    
        $query = "DELETE FROM `publicacao` WHERE `idPublicacao` = $idPublicacao AND `idInstituicao` = $idInstituicao;";
        
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }


}

?>