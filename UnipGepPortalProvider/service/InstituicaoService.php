<?php
		require_once("business/InstituicaoBusiness.php");
	
		/**
         * Classe do método InstituicaoService responsável pelo CRUD da instituição.
		 * @author Wallace
		 */
		class InstituicaoService
		{
		
				//Variável da instituicão
                var $instituicaoBusiness;


                /**
                * Método construtor da classe que setta o valor da instuicaoBusiness.
                */
				public function InstituicaoService()
				{
				   $this->instituicaoBusiness = new InstituicaoBusiness();
				}
				
				/**
				 * Função responsável por pesquisar todas as instituições
				 * @return String json com todas as instituições.
				 */
				public function findAll()
				{
					$instituicaoBusiness = new InstituicaoBusiness();
					$collection = $instituicaoBusiness->findAll();
					echo json_encode($collection);
					return json_encode($collection);
				}	

				/**
     			* Função responsável por inserir instituições
                * @param $json String json contendo os dados da request.
     			* @return String json contendo a resposta da solicitação de inserção.
     			*/
    			public function insert($json)
    			{
        			$instituicaoBusiness = new InstituicaoBusiness();
        			$collection = $instituicaoBusiness->insert($json);
        			return json_encode($collection);
    			}


				/**
     			* Função responsável por pesquisar os dados da instituição do aluno logado.
			    * @return string json contando os dados da instituição do aluno logado.
    			*/
    			public function find()
    			{	
        			$instituicaoBusiness = new InstituicaoBusiness();
        			$collection = $instituicaoBusiness->find();
        			return json_encode($collection);
    			}


    			/**
     			* Função responsável por realizar o update de dados da instituição.
                * @param $json String json contendo os dados da request.
     			* @return String json contendo a resposta da solicitação de update da instituição.
     			*/
    			public function update($json)
    			{
        			$instituicaoBusiness = new InstituicaoBusiness();
        			$collection = $instituicaoBusiness->update($json);
        			return json_encode($collection);
    			}



    			/**
     			* Função responsável por excluir a instituição.
                * @param $json String json contendo os dados da request.
     			* @return String json contendo a resposta da solicitação de exclusão.
     			*/
    			public function delete($json)
    			{
        			$instituicaoBusiness = new InstituicaoBusiness();
        			$collection = $instituicaoBusiness->delete($json);
        			return json_encode($collection);
    			}

                /**
                 * Função responsável por pegar os dados do painel indicador.
                 * @param $json String json contendo os dados da request.
                 * @return String json com os dados do painel indicador.
                 */
                public function indicador()
                {
                    $instituicaoBusiness = new InstituicaoBusiness();
                    $collection = $instituicaoBusiness->indicador();
                    echo json_encode($collection);
                    return json_encode($collection);
                }   
		}

?>