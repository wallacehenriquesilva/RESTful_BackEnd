<?php
require_once("business/AlunoBusiness.php");
require_once("model/AlunoDto.php");

/**
 * Classe AlunoService responsável por fazer a conexão com a busnisses e pegar seu retorno.
 * @author Wallace e Cia
 *
 */
class AlunoService
{

    var $alunoBusiness;
    var $alunoDto;

    /**
     * Método construtor da classe Aluno service.
     */
    public function AlunoService()
    {
        $this->alunoBusiness = new AlunoBusiness();
        $this->alunoDto = new AlunoDto();
    }

    /**
     * Função responsável por pesquisar todos os Alunos.
     * @return String json contendo o resultado do select realizado.
     */
    public function findAll()
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->findAll();
        return json_encode($collection);
    }


    /**
     * Função responsável por pesquisar todos os dados do aluno logado.
     * @return String json contando os dados do aluno logado.
     */
    public function find()
    {

        $this->alunoDto->setIdAluno($_GET['idAluno']);
        $this->alunoDto->setIdInstituicao($_GET['idInstituicao']);
        $this->alunoDto->setMatricula($_GET['matricula']);
        $this->alunoDto->setNome($_GET['nome']);
        $this->alunoDto->setSexo($_GET['sexo']);
        $this->alunoDto->setDataNascimento($_GET['dataNascimento']);
        $this->alunoDto->setCpf($_GET['cpf']);

        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->find($this->alunoDto);
        return json_encode($collection);
    }


    /**
     * Função responsável por inserir novos alunos
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta do server após a inserção.
     */
    public function insert($json)
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->insert($this->readJson($json));
        return json_encode($collection);
    }


    /**
     * Função responsável por realizar o update de dados do aluno.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de update do aluno.
     */
    public function update($json)
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->update($this->readJson($json));
        return json_encode($collection);
    }


    /**
     * Função responsável por realizar a exclusão de um aluno.
     * @param $json String json contendo os dados da request.
     * @return String json contendo a resposta da solicitação de exclusão do aluno.
     */
    public function delete($json)
    {
        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->delete($this->readJson($json));
        return json_encode($collection);
    }

    /**
     * Função responsável por selecionar os 5 alunos com mais publicações.
     * @return String json contendo dados dos 5 alunos com mais publicações.
     */
    public function rank5()
    {
        $this->alunoDto->setIdInstituicao($_GET['idInstituicao']);

        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->rank5($this->alunoDto);
        return json_encode($collection);
    }

    /**
     * Função responsável por realizar a contagem dos alunos ativos e inativos.
     * @return String json contendo o número de alunos ativos e inativos.
     */
    public function status()
    {
        $this->alunoDto->setIdInstituicao($_GET['idInstituicao']);

        $alunoBusiness = new AlunoBusiness();
        $collection = $alunoBusiness->status($this->alunoDto);
        return json_encode($collection);
    }

    /**
     * Converte o json no dto do aluno.
     * @param $json Json contendo os dados da requisição
     * @return AlunoDto retorna do dto do aluno.
     */
    public function readJson($json): AlunoDto
    {
        $aluno = json_decode($json, true);

        $this->alunoDto->setIdAluno($aluno[0]['idAluno']);
        $this->alunoDto->setIdOrientador($aluno[0]['idOrientador']);
        $this->alunoDto->setIdInstituicao($aluno[0]['idInstituicao']);
        $this->alunoDto->setMatricula($aluno[0]['matricula']);
        $this->alunoDto->setNome($aluno[0]['nome']);
        $this->alunoDto->setSexo($aluno[0]['sexo']);
        $this->alunoDto->setDataNascimento($aluno[0]['dataNascimento']);
        $this->alunoDto->setCpf($aluno[0]['cpf']);
        $this->alunoDto->setAtivo($aluno[0]['ativo']);

        return $this->alunoDto;
    }
}

?>