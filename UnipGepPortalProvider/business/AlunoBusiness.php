<?php
require 'vendor/autoload.php';
require_once("util/Factory.php");
require_once("model/AlunoDto.php");

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
     * <p> Função responsável por pesquisar todos os dados do aluno logado por qualquer campo. </p>
     * @param AlunoDto $alunoDto dto dos dados do aluno a ser consultado.
     * @return array json contando os dados do aluno logado.
     */
    public function find(AlunoDto $alunoDto)
    {
        $query = "SELECT * FROM aluno"
            . " WHERE `idAluno` = $alunoDto->getIdAluno()"
            . " AND `idInstituicao` = $alunoDto->getIdInstituica()"
            . " AND (`matricula` = $alunoDto->getMatricula()"
            . " OR `nome` = $alunoDto->getNome()"
            . " OR `sexo` = $alunoDto->getSexo()"
            . " OR `dataNascimento` = $alunoDto->getDataNasciment()"
            . " OR `cpf` = $alunoDto->getCpf())";
        $rs = $this->con->getConnection()->query($query);

        if ($rs) {
            $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Erro";
        }
        return $collection;
    }

    /**
     * Função responsável por executar a query e inserir novos alunos
     * @param AlunoDto $alunoDto dto dos dados do aluno que sera inserido na base de dados.
     * @return String json contendo a resposta do server após a inserção.
     */
    public function insert(AlunoDto $alunoDto)
    {
        $query = "INSERT INTO `aluno`"
            . " (`idAluno`, `idOrientador`, `idInstituicao`, `matricula`, `nome`, `sexo`, `dataNascimento`, `cpf`, `ativo`) "
            . "VALUES (NULL, $alunoDto->getIdOrientador(), "
            . "$alunoDto->getIdInstituicao(), "
            . "$alunoDto->getMatricula(),g"
            . "$alunoDto->getNomeetSexo"
            . "$alunoDto->getSexo()"
            . "$alunoDto->getDataNascimento(), "
            . "$alunoDto->getCpf(), "
            . "$alunoDto->getAtivo());";

        $stmt = $this->con->getConnection()->prepare($query);

        $collection = $stmt->execute();

        return $collection;
    }


    /**
     * Função responsável por executar a query e realizar o update de dados do aluno.
     * @param AlunoDto $alunoDto dto dos dados do aluno que sera alterado na base de dados.
     * @return String json contendo a resposta da solicitação de update do aluno.
     */
    public function update(AlunoDto $alunoDto)
    {
        $query = "UPDATE `aluno` SET "
            . " `nome` = $alunoDto->getNome(), "
            . "`sexo` = $alunoDto->getSexo(), "
            . "`dataNascimento` = $alunoDto->getDataNascimento(), "
            . "`cpf` = $alunoDto->getCpf() "
            . "WHERE `idAluno` = $alunoDto->getIdAluno() "
            . "AND `idInstituicao` = $alunoDto->getIdInstituicao();";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }


    /**
     * Função responsável por executar a query e realizar a contagem dos alunos ativos e inativos.
     * @param AlunoDto $alunoDto dto dos dados do aluno que sera apagado da base de dados.
     * @return String json contendo o número de alunos ativos e inativos.
     */
    public function delete(AlunoDto $alunoDto)
    {
        $query = "DELETE FROM `aluno` "
            . "WHERE `idAluno` = $alunoDto->getIdAluno() "
            . "AND `idInstituicao` = $alunoDto->getIdInstituicao();";

        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }

    /**
     * Função responsável por executar a query e selecionar os 5 alunos com mais publicações.
     * @param AlunoDto $alunoDto dto utilizado parar guardar o id da instituição que sera feito o top5.
     * @return String json contendo dados dos 5 alunos com mais publicações.
     */
    public function rank5(AlunoDto $alunoDto)
    {
        $query = "SELECT * FROM "
            . "(SELECT COUNT(*) AS nPublicacoes, "
            . "a.nome FROM aluno AS a "
            . "INNER JOIN publicacaoaluno AS pa ON a.idAluno = pa.idAluno "
            . "WHERE a.idInstituicao = $alunoDto->getIdInstituicao() "
            . "GROUP BY a.idAluno) AS tabelaResultado "
            . "ORDER BY tabelaResultado.nPublicacoes DESC LIMIT 5;";

        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }

    /**
     * Função responsável por executar a query realizar a contagem dos alunos ativos e inativos.
     * @param AlunoDto $alunoDto dto utilizado parar guardar o id da instituição que sera feito o select de
     * comparativo ativos/inativos.
     * @return String json contendo o número de alunos ativos e inativos.
     */
    public function status(AlunoDto $alunoDto)
    {
        $query = "SELECT (SELECT COUNT(*) FROM aluno "
            . "WHERE  ativo = 'N' "
            . "AND idInstituicao = idInstituicao) AS alunosInativos, "
            . "(SELECT COUNT(*) FROM aluno "
            . "WHERE ativo = 'S' "
            . "AND idInstituicao = $alunoDto->getIdInstituicao()) AS alunosAtivos;";
        $rs = $this->con->getConnection()->query($query);

        $collection = $rs->fetchAll(PDO::FETCH_OBJ);
        return $collection;
    }
}

?>