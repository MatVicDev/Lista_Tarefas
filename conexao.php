<?php

class Conexao
{
	private $host = 'localhost';			// Servidor
	private $dbname = 'db_lista_tarefas';	// Nome do banco de dados
	private $user = 'root';					// Usuário
	private $pass = '';						// Senha

	public function conectar()
	{
		try {

			$conn = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);

			return $conn;

		} catch(PDOException $e) {

			echo '<p>' . $e->getMessage() . '</p>';
		}
	}
}
?>