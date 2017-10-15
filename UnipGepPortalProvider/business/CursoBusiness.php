<?php

require_once("util/Factory.php");

/**
 * @author Wallace e Cia
 *
 */
class CursoBusiness
{

    public $con;


    /**
    * Método construtor da classe CursoBusiness
    * responsável por realizar a conexão com o BD.
    */
    public function CursoBusiness()
    {
        $this->con = new Factory();
    }

     /**
     * Função responsável por pesquisar todos os cursos.
     * @return String json com os dados dos cursos.
     */
    public function findAll()
    {
        $query = "select * from Curso";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por pesquisar todas os dados dos cursos da instituição do usuário logado.
     * @return String json contando os dados do curso do aluno logado.
     */
    public function find()
    {
        $idAluno = $_GET['idAluno'];
        $idInstituicao = $_GET['idInstituicao'];
        $query = "SELECT * FROM Curso WHERE `idAluno` = $idAluno AND `idInstituicao` = $idInstituicao;";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por inserir cursos.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de inserção de curso.
     */
    public function insert($json)
    {
        $curso = json_decode($json, true);

        $idInstituicao = $curso['idInstituicao'];
        $nome = $curso['nome'];
        $descricao = $curso['descricao'];
        $ativo = $curso['ativo'];

        $query = "INSERT INTO `curso` (`idInstituicao`, `nome`, `descricao`, `ativo`) VALUES ('$idInstituicao', '$nome', '$descricao', '$ativo');";

        $stmt =  $this->con->getConnection()->prepare($query);
     
        $collection = $stmt->execute();

        return $collection;
    }


    /**
     * Função responsável por realizar o update dos dados do curso.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de update do curso.
     */
    public function update($json)
    {
        $curso = json_decode($json, true);

        $idCurso = $curso['idCurso'];
        $idInstituicao = $curso['idInstituicao'];
        $nome = $curso['nome'];
        $descricao = $curso['descricao'];
        $ativo = $curso['ativo'];
                
        $query = "UPDATE `curso` SET  `nome` = '$nome', `descricao` = '$descricao' WHERE `idAluno` = $idAluno AND `idInstituicao` = $idInstituicao;";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }




    /**
     * Função responsável por realizar a exclusão de um curso.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão de curso.
     */
    public function delete($json)
    {
        $curso = json_decode($json, true);

        $idCurso = $curso['idCurso'];
        $idInstituicao = $curso['idInstituicao'];
    
        $query = "DELETE FROM `curso` WHERE `idCurso` = $idCurso AND `idInstituicao` = $idInstituicao;";
        
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }

}

?>