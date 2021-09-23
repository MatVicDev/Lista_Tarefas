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
		$query = "
			SELECT 
				t.id_tarefa, s.status, t.tarefa 
			FROM 
				tb_tarefas as t
			LEFT JOIN
				tb_status as s ON (t.fk_id_status = s.id_status)
		";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar() // Update
	{

	}

	public function remover() // Delete
	{

	}
}


?>