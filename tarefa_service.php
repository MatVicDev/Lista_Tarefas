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
		$query = 'UPDATE tb_tarefas SET tarefa = :TAREFA WHERE id_tarefa = :ID';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':TAREFA', $this->tarefa->__get('tarefa'));
		$stmt->bindValue(':ID', $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function remover() // Delete
	{
		$query = 'DELETE FROM tb_tarefas WHERE id_tarefa = :ID';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':ID', $this->tarefa->__get('id'));
		$stmt->execute();
	}

	public function marcarRealizada()
	{
		$query = 'UPDATE tb_tarefas SET fk_id_status = :ID_STATUS WHERE id_tarefa = :ID';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':ID_STATUS', $this->tarefa->__get('id_status'));
		$stmt->bindValue(':ID', $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function recuperarTarefasPendentes()
	{
		$query = '
			SELECT 
				t.id_tarefa, s.status, t.tarefa 
			FROM 
				tb_tarefas as t
			LEFT JOIN
				tb_status as s ON (t.fk_id_status = s.id_status)
			WHERE
				t.fk_id_status = :ID_STATUS
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':ID_STATUS', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}


?>