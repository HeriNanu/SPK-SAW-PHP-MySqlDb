<?php
class dbload{
	private $host=DB_HOST;
	private $user=DB_USER;
	private $pass=DB_PASS;
	private $dbname=DB_NAME;
	//private $dbcollation=DB_COLLATE;
	
	function ConnectDB(){
		try {
			$pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
			}
		catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		exit();
	}
		
	}
	function get_results($query_var){
		try {
			$pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
			}
		catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		exit();
	}
		$sql 	= $query_var;
		$stmt 	= $pdo->prepare($sql); // Mencegah SQL injection . stmt artinya statement
		$stmt->execute();
		$cols=array();
		while ($row = $stmt->fetch()){
			
			$cols[]=$row;
		}
		return $cols;
	}
	

}