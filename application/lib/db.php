<?php

namespace application\lib;

use PDO;

class Db{
	
	protected $db;
	
	public function __construct() {
		$config = require 'application/config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';port=3306;dbname='.$config['name'].'', $config['user'], $config['password']);
	}
	
	public function query($sql, $params = [])
	{
		$stmt = $this->db->prepare($sql);
		if(!empty($params))
		{
			foreach($params as $key => $val)
			{
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}
	
	public function row($sql, $params = [])
	{
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function column($sql, $params = [])
	{
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}
}