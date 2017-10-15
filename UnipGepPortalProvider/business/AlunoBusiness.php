<?php
require 'vendor/autoload.php';
require_once("util/Factory.php");

/**
 * @author Wallace e Cia
 *
 */
class AlunoBusiness
{

    public $con;

    public function AlunoBusiness()
    {
        $this->con = new Factory();
    }

    /**
     * Função responsável por executar a query de select.
     * @return String json contendo os Alunos
     */
    public function findAll()
    {
        $query = "select * from Aluno";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }



    /**
     * Função responsável por pesquisar todos os dados do aluno logado por qualquer campo. 
     * @return String json contando os dados do aluno logado.
     */
    public function find()
    {
        
        $idAluno = $_GET['idAluno'];
        $idInstituicao = $_GET['idInstituicao'];
        $matricula = $_GET['matricula'];
        $nome = $_GET['nome'];
        $sexo = $_GET['sexo'];
        $dataNascimento =  $_GET['dataNascimento'];
        $cpf = $_GET['cpf'];

        $query = "SELECT * FROM Aluno WHERE (matricula = '$matricula' OR nome = $nome OR sexo = $sexo OR dataNascimento = $dataNascimento OR cpf = $cpf) AND idAluno = $idAluno AND idInstituicao = $idInstituicao";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }



    /**
     * Função responsável por executar a query e inserir novos alunos
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta do server após a inserção.
     */
    public function insert($json)
    {
        $aluno = json_decode($json, true);

        $idOrientador = $aluno['idOrientador'];
        $idInstituicao = $aluno['idInstituicao'];
        $matricula = $aluno['matricula'];
        $nome = $aluno['nome'];
        $sexo = $aluno['sexo'];
        $dataNascimento = $aluno['dataNascimento'];
        $cpf = $aluno['cpf'];
        $ativo = $aluno['ativo'];

        $query = "INSERT INTO `aluno` (`idAluno`, `idOrientador`, `idInstituicao`, `matricula`, `nome`, `sexo`, `dataNascimento`, `cpf`, `ativo`) VALUES (NULL, '$idOrientador', '$idInstituicao', '$matricula', '$nome', '$sexo', '$dataNascimento', '$cpf', '$ativo');";

        $stmt =  $this->con->getConnection()->prepare($query);
     
        $collection = $stmt->execute();

        return $collection;
    }


    /**
     * Função responsável por executar a query e realizar o update de dados do aluno.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de update do aluno.
     */
    public function update($json)
    {
        $aluno = json_decode($json, true);

        $idAluno = $aluno['idAluno'];
        $idInstituicao = $aluno['idInstituicao'];
        $nome = $aluno['nome'];
        $sexo = $aluno['sexo'];
        $dataNascimento = $aluno['dataNascimento'];
        $cpf = $aluno['cpf'];
        
        $query = "UPDATE `aluno` SET  `nome` = '$nome', `sexo` = '$sexo', `dataNascimento` = '$dataNascimento', `cpf` = '$cpf' WHERE `idAluno` = $idAluno AND `idInstituicao` = $idInstituicao;";
        
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }




    /**
     * Função responsável por executar a query e realizar a contagem dos alunos ativos e inativos.
     * @return String json contendo o número de alunos ativos e inativos.
     */
    public function delete($json)
    {
        $aluno = json_decode($json, true);

        $idAluno = $aluno['idAluno'];
        $idInstituicao = $aluno['idInstituicao'];
    
        $query = "DELETE FROM `aluno` WHERE `idAluno` = $idAluno AND `idInstituicao` = $idInstituicao;";
        
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }

     /**
     * Função responsável por executar a query e selecionar os 5 alunos com mais publicações.
     * @return String json contendo dados dos 5 alunos com mais publicações.
     */
    public function rank5()
    {
        
        $idInstituicao = $_GET['idInstituicao'];

        $query = "SELECT * FROM (SELECT COUNT(*) AS nPublicacoes, a.nome from aluno as a inner join publicacaoaluno as pa on a.idAluno = pa.idAluno where a.idInstituicao = $idInstituicao group by a.idAluno) as tabelaResultado ORDER BY tabelaResultado.nPublicacoes DESC LIMIT 5;";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

     /**
     * Função responsável por executar a query realizar a contagem dos alunos ativos e inativos.
     * @return String json contendo o número de alunos ativos e inativos.
     */
    public function status()
    {
        
        $idInstituicao = $_GET['idInstituicao'];

        $query = "SELECT (SELECT COUNT(*) FROM aluno WHERE  ativo = 'N' AND idInstituicao = idInstituicao) AS alunosInativos, (SELECT COUNT(*) FROM aluno WHERE ativo = 'S' AND idInstituicao = $idInstituicao) AS alunosAtivos;";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

}

?>