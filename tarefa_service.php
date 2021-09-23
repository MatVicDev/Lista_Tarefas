<?php

class TarefaService
{
	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa)
	{
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	// CRUD
	public function inserir() // Create
	{
		$query = "INSERT INTO tb_tarefas(tarefa) VALUES (:TAREFA)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':TAREFA', $this->tarefa->__get('tarefa'));
		$stmt->execute();
	}

	public function recuperar() // Read
	{

	}

	public function atualizar() // Update
	{

	}

	public function remover() // Delete
	{

	}
}


?>