<?php

		require_once("util/Factory.php");
	
		/**
		 * @author Robson
		 *
		 */
		class IndicadorBusiness
		{
			
				public $con;

				public function IndicadorBusiness()
				{
				   $this->con = new Factory();
				}
				
				/**
				 * Pesquisa todas as instituições
				 * @return string
				 */
				public function findAll()
				{
					$id = $_GET['idInstituicao'];
					$query = "SELECT (SELECT COUNT(*) FROM Aluno WHERE idInstituicao = $id ) AS totalAluno, (SELECT COUNT(*) FROM Curso WHERE idInstituicao = $id) AS totalCursos, (SELECT COUNT(*) FROM Orientador WHERE idInstituicao = $id) AS totalOrientadores,    (SELECT COUNT(*) FROM Publicacao WHERE idInstituicao = $id) AS totalPublicacoes";
					$rs = $this->con->getConnection()->query($query);

					$collection = $rs->fetchAll( PDO::FETCH_OBJ );
					return $collection;
				}	

		}

?>