<?php

		require_once("util/Factory.php");
	
		/**
		 * @author Robson
		 *
		 */
		class InstituicaoBusiness
		{
			
				public $con;

                /**
                * Método construtor da classe que setta o valor da instuicaoBusiness.
                * e realiza a conexão com  o BD.
                */
				public function InstituicaoBusiness()
				{
				   $this->con = new Factory();
				}
				
				/**
                 * Função responsável por pesquisar todas as instituições
                 * @return String json com todas as instituições.
                 */
				public function findAll()
				{
					$query = "select * from Instituicao";
					$rs = $this->con->getConnection()->query($query);

					$collection = $rs->fetchAll( PDO::FETCH_OBJ );
					return $collection;
				}	

			
                /**
                * Função responsável por pesquisar os dados da instituição do aluno logado.
                * @return string json contando os dados da instituição do aluno logado.
                */
				public function find()
				{
					$idInstituicao = $_GET['idInstituicao'];
					
					$query = "select * from Instituicao where idInstituicao = $idInstituicao;";
					$rs = $this->con->getConnection()->query($query);

					$collection = $rs->fetchAll( PDO::FETCH_OBJ );
					return $collection;
				}	


	            /**
                * Função responsável por inserir instituições
                * @param $json String json contendo os dados da request.
                * @return String json contendo a resposta da solicitação de inserção.
                */
                public function insert($json)
                {
                    $instituicao = json_decode($json, true);

                    $sigla = $instituicao['sigla'];
                    $descricao = $instituicao['descricao'];
                    $ativo = $instituicao['ativo'];

       

                    $query = "INSERT INTO `instituicao` (`sigla`, `descricao`, `ativo`) VALUES ('$sigla', '$descricao', '$ativo');";

                    $stmt =  $this->con->getConnection()->prepare($query);
     
                    $collection = $stmt->execute();

                    return $json;
                }   


   /**
                * Função responsável por realizar o update de dados da instituição.
                * @param $json String json contendo os dados da request.
                * @return String json contendo a resposta da solicitação de update da instituição.
                */
    public function update($json)
    {
        $instituicao = json_decode($json, true);

        $idInstituicao = $instituicao['idInstituicao'];
        $sigla = $instituicao['sigla'];
        $descricao = $instituicao['descricao'];
        $ativo = $instituicao['ativo'];
        
        
        $query = "UPDATE `instituicao` SET  `sigla` = '$sigla', `descricao` = '$descricao', `ativo` = '$ativo' WHERE `idInstituicao` = $idInstituicao;";
       
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();

        return $collection;
    }




   
                /**
                * Função responsável por excluir a instituição.
                * @param $json String json contendo os dados da request.
                * @return String json contendo a resposta da solicitação de exclusão.
                */
    public function delete($json)
    {
        $instituicao = json_decode($json, true);

        $idInstituicao = $instituicao['idInstituicao'];
    
        $query = "DELETE FROM `instituicao` WHERE `idInstituicao` = $idInstituicao";
        
        $rs = $this->con->getConnection()->prepare($query);

        $collection = $rs->execute();
        return $collection;
    }

        /**
                 * Função responsável por pegar os dados do painel indicador.
                 * @param $json String json contendo os dados da request.
                 * @return String json com os dados do painel indicador.
                 */
                public function indicador()
                {
                    $id = $_GET['idInstituicao'];
                    $query = "SELECT (SELECT COUNT(*) FROM Aluno WHERE idInstituicao = $id ) AS totalAluno, (SELECT COUNT(*) FROM Curso WHERE idInstituicao = $id) AS totalCursos, (SELECT COUNT(*) FROM Orientador WHERE idInstituicao = $id) AS totalOrientadores,    (SELECT COUNT(*) FROM Publicacao WHERE idInstituicao = $id) AS totalPublicacoes";
                    $rs = $this->con->getConnection()->query($query);

                    $collection = $rs->fetchAll( PDO::FETCH_OBJ );
                    return $collection;
                }   

}
?>