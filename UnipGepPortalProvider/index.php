<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('X-Requested-With: *');
    
//Imports
require 'vendor/autoload.php';
require_once 'service/InstituicaoService.php';
require_once 'service/CursoService.php';
require_once 'service/AlunoService.php';
require_once 'service/PublicacaoService.php';
require_once 'service/IndicadorService.php';
require_once 'service/OrientadorService.php';
require_once 'service/UsuarioService.php';


//instancie o objeto do Slim
$app = new \Slim\Slim();

//Aluno INICIO
//Define a rota do verbo GET para o aluno.
$app->get('/api/aluno', function () { 
  $alunoService = new ALunoService();
  echo $alunoService->find();
}); 

//Define a rota do verbo POST para o aluno.
$app->post('/api/aluno', function () use ($app){ 
  $json = $app->request->getBody();
  $alunoService = new ALunoService();
  echo $alunoService->insert($json);
}); 

//Define a rota do verbo PUT para o aluno.
$app->put('/api/aluno', function () use ($app) { 
  $json = $app->request->getBody();
  $alunoService = new ALunoService();
  echo $alunoService->update($json);
}); 

//Define a rota do verbo DELETE para o aluno.
$app->delete('/api/aluno', function () use ($app){ 
  $json = $app->request->getBody();
  $alunoService = new ALunoService();
  echo $alunoService->delete($json);
}); 

//Define a rota do verbo GET do top 5 para o aluno.
$app->get('/api/aluno/rank/5', function () { 
  $alunoService = new ALunoService();
  echo $alunoService->rank5();
}); 

//Define a rota do verbo GET do comparativo ativo/inativo para o aluno.
$app->get('/api/aluno/status', function () { 
  $alunoService = new ALunoService();
  echo $alunoService->status();
}); 

//Aluno FIM


//Orientador INICIO
//Define a rota do verbo GET para o orientador.
$app->get('/api/orientador', function () { 
  $orientadorService = new OrientadorService();
  echo $orientadorService->find();
}); 

//Define a rota do verbo POST para o orientador.
$app->post('/api/orientador', function () use ($app){ 
  $json = $app->request->getBody();
  $orientadorService = new OrientadorService();
  echo $orientadorService->insert($json);
}); 

//Define a rota do verbo PUT para o orientador.
$app->put('/api/orientador', function () use ($app) { 
  $json = $app->request->getBody();
  $orientadorService = new OrientadorService();
  echo $orientadorService->update($json);
}); 

//Define a rota do verbo DELETE para o orientador.
$app->delete('/api/orientador', function () use ($app){ 
  $json = $app->request->getBody();
  $orientadorService = new OrientadorService();
  echo $orientadorService->delete($json);
}); 

//Define a rota do verbo GET dot top 5 para o orientador.
$app->get('/api/orientador/rank/5', function () { 
  $orientadorService = new OrientadorService();
  echo $orientadorService->rank5();
}); 

//Define a rota do verbo GET do comparativo ativo/inativo para o orientador.
$app->get('/api/orientador/status', function () { 
  $orientadorService = new OrientadorService();
  echo $orientadorService->status();
}); 

//Orientador FIM


//Instituicao INICIO
//Define a rota do verbo GET para a instituicao.
$app->get('/api/instituicao', function () { 
  $instituicaoService = new InstituicaoService();
  echo $instituicaoService->find();
}); 

//Define a rota do verbo POST para a instituicao.
$app->post('/api/instituicao', function () use ($app){ 
  $json = $app->request->getBody();
  $instituicaoService = new InstituicaoService();
  echo $instituicaoService->insert($json);
}); 

//Define a rota do verbo PUT para a instituicao.
$app->put('/api/instituicao', function () use ($app){ 
  $json = $app->request->getBody();
  $instituicaoService = new InstituicaoService();
  echo $instituicaoService->update($json);
}); 

//Define a rota do verbo DELETE para a instituicao.
$app->delete('/api/instituicao', function () use ($app){ 
  $json = $app->request->getBody();
  $instituicaoService = new InstituicaoService();
  echo $instituicaoService->delete($json);
}); 

//Define a rota do verbo GET para o indicador de dados da instituicao.
$app->get('/api/instituicao/indicador', function () { 
  header('Content-Type: application/json; charset=utf-8');
  $instituicaoService = new instituicaoService();
  echo $instituicaoService->indicador();
}); 
//Instituicao FIM

//Curso INICIO
//Define a rota do verbo GET para o curso.
$app->get('/api/curso', function () { 
  $cursoService = new CursoService();
  echo $cursoService->find();
}); 

//Define a rota do verbo POST para o curso.
$app->post('/api/curso', function () use ($app) { 
  $json = $app->request->getBody();
  $cursoService = new CursoService();
  echo $cursoService->insert($json);
}); 

//Define a rota do verbo PUT para o curso.
$app->put('/api/curso', function () use ($app){ 
  $json = $app->request->getBody();
  $cursoService = new CursoService();
  echo $cursoService->update($json);
}); 

//Define a rota do verbo DELETE para o curso.
$app->delete('/api/curso', function () use ($app){ 
  $json = $app->request->getBody();
  $cursoService = new CursoService();
  echo $cursoService->delete($json);
}); 


//Curso FIM


//Publicacao INICIO
//Define a rota do verbo GET para a publicacao usando padrão Adapter.
$app->get('/api/publicacao', function () { 
  $publicacaoService = new PublicacaoService("orientador");
  echo $publicacaoService->find();
}); 

//Define a rota do verbo POST para a publicacao usando padrão Adapter.
$app->post('/api/publicacao', function () use ($app){ 
  $json = $app->request->getBody();
  $publicacaoService = new PublicacaoService("orientador");
  echo $publicacaoService->insert($json);
}); 

//Define a rota do verbo PUT para a publicacao usando padrão Adapter.
$app->put('/api/publicacao', function () use ($app){ 
  $json = $app->request->getBody();
  $publicacaoService = new PublicacaoService("orientador");
  echo $publicacaoService->update($json);
}); 

//Define a rota do verbo DELETE para a publicacao usando padrão Adapter.
$app->delete('/api/publicacao', function () use ($app){ 
  $json = $app->request->getBody();
  $publicacaoService = new PublicacaoService("orientador");
  echo $publicacaoService->delete($json);
}); 

//Publicaocao FIM

//Usuario Login inicio
//Define a rota de login que utiliza o verbo GET.
$app->get('/api/usuario/login', function () { 
  $usuarioService = new usuarioService();
  echo $usuarioService->login();
}); 

//Usuario Login fim

//roda a aplicação Slim 
$app->run();
?>