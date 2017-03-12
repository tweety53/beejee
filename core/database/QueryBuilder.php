<?php

/**
* Create a query builder
*/
class QueryBuilder
{
	protected $pdo;

	function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function selectAll($table)
	{
		$statement = $this->pdo->prepare("select * from {$table};");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function selectUserFromDB($table, $email, $password)
	{
		$statement = $this->pdo->prepare("select * from {$table} where 
			email='{$email}' and
			password='{$password}';");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function insertIntoDatabase($table, $parameters)
	{
		

		$sql = sprintf(
				'insert into %s (%s) values (%s)',
				$table,
				implode(', ', array_keys($parameters)),
				':' . implode(', :', array_keys($parameters))
			);


		$statement = $this->pdo->prepare($sql);

		$statement->execute($parameters);
	}

	public function updateStatusInDB($table, $taskId)
	{
		$statement = $this->pdo->prepare("update {$table} set status='1' where 
			id={$taskId}");

		$statement->execute();
	}

	public function updateTextInDB($table, $taskId, $text)
	{
		$statement = $this->pdo->prepare("update {$table} set text='{$text}' where 
			id={$taskId}");

		$statement->execute();
	}
	
	public function selectFiltered($table, $parameters)
	{
		if(!empty($parameters['username']) && !empty($parameters['useremail']) )
		{
			$sql = "select * from {$table} where status={$parameters['status']} 
				and username='{$parameters['username']}' 
				and useremail='{$parameters['useremail']}'";
		}

		elseif (!empty($parameters['username']) && empty($parameters['useremail'])) 
		{
			$sql = "select * from {$table} where status={$parameters['status']} 
				and username='{$parameters['username']}' ";
		}

		elseif (!empty($parameters['useremail']) && empty($parameters['username'])) 
		{
			$sql = "select * from {$table} where status={$parameters['status']} 
				and useremail='{$parameters['useremail']}' ";
		}

		else
		{
			$sql = "select * from {$table} where status={$parameters['status']} ";
		}


		$statement = $this->pdo->prepare($sql);

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

}