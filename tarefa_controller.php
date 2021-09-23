<?php

require_once "tarefa_model.php";
require_once "tarefa_service.php";
require_once "conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao; 

if($acao  == 'inserir') {
	$tarefa = new Tarefa();
	$tarefa->__set('tarefa', $_POST['tarefa']);

	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefaService->inserir();

	header('Location: nova_tarefa.php?inclusao=sucesso');
}

else if($acao == 'recuperar') {

	$tarefa = new Tarefa();
	$conexao = new Conexao();
	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefas = $tarefaService->recuperar();
}
?>