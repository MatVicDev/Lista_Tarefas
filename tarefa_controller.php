<?php

require_once "tarefa_model.php";
require_once "tarefa_service.php";
require_once "conexao.php";

$tarefa = new Tarefa();
$tarefa->__set('tarefa', $_POST['tarefa']);

$conexao = new Conexao();

$tarefaService = new TarefaService($conexao, $tarefa);
$tarefaService->inserir();

echo '<pre>';
print_r($tarefaService);
echo '</pre>';
?>