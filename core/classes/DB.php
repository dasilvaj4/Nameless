<?php
class DB {
	private static $_instance = null;
<<<<<<< HEAD
	private $_pdo, 
			$_query, 
			$_error = false, 
			$_results, 
=======
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			$_prefix,
			$_count = 0;

	private function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';port=' . Config::get('mysql/port') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
<<<<<<< HEAD
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
=======
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			$this->_prefix = Config::get('mysql/prefix');
		} catch(PDOException $e) {
			die("<strong>Error:<br /></strong><div class=\"alert alert-danger\">" . $e->getMessage() . "</div>Please check your database connection settings.");
		}
<<<<<<< HEAD
		
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	}

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
<<<<<<< HEAD
	
		return self::$_instance;
	
	}
	
=======

		return self::$_instance;

	}

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function query($sql, $params = array()) {
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;
			if(count($params)) {
				foreach($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}
<<<<<<< HEAD
			
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			if($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			} else {
				print_r($this->_pdo->errorInfo());
				$this->_error = true;
			}
<<<<<<< HEAD
			
			
		}
		
		return $this;
		
	}
	
=======


		}

		return $this;

	}

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function createQuery($sql, $params = array()) {
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;
			if(count($params)) {
				foreach($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}
<<<<<<< HEAD
			
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			if($this->_query->execute()) {
				$this->_count = $this->_query->rowCount();
			} else {
				print_r($this->_pdo->errorInfo());
				$this->_error = true;
			}
<<<<<<< HEAD
			
			
		}
		
		return $this;
		
=======


		}

		return $this;

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	}

	public function createTable($name, $table_data, $other){
		$name = $this->_prefix . $name;
		$sql = "CREATE TABLE `{$name}` ({$table_data}) {$other}";
			if(!$this->createQuery($sql)->error()) {
				return $this;
			}
		return false;
	}
<<<<<<< HEAD
	
	public function action($action, $table, $where = array()) {
		if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=', '<>');
			
			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];
			
			$table = $this->_prefix . $table;
			
			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				
=======

	public function action($action, $table, $where = array()) {
		if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=', '<>');

			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

			$table = $this->_prefix . $table;

			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
				if(!$this->query($sql, array($value))->error()) {
					return $this;
				}
			}
		}
		return false;
	}
<<<<<<< HEAD
	
	public function deleteAction($action, $table, $where = array()) {
		if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=', '<>');
			
			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];
			
			$table = $this->_prefix . $table;
			
			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				
=======

	public function deleteAction($action, $table, $where = array()) {
		if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=', '<>');

			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

			$table = $this->_prefix . $table;

			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
				if(!$this->createQuery($sql, array($value))->error()) {
					return $this;
				}
			}
		}
		return false;
	}
<<<<<<< HEAD
	
	public function get($table, $where) {
		return $this->action('SELECT *', $table, $where);
	}
	
=======

	public function get($table, $where) {
		return $this->action('SELECT *', $table, $where);
	}

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function like($table, $column, $like) {
		$table = $this->_prefix . $table;
		$sql = "SELECT * FROM {$table} WHERE {$column} LIKE '{$like}'";

		if(!$this->query($sql)->error()) {
			return $this;
		}
		return false;
	}

	public function delete($table, $where) {
		return $this->deleteAction('DELETE', $table, $where);
	}
<<<<<<< HEAD
	
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function insert($table, $fields = array()) {
			$keys = array_keys($fields);
			$values = '';
			$x = 1;
<<<<<<< HEAD
			
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			foreach($fields as $field) {
				$values .= '?';
				if ($x < count($fields)) {
					$values .= ', ';
				}
				$x++;
			}
<<<<<<< HEAD
			
			$table = $this->_prefix . $table;
			$sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) . "`) VALUES ({$values})";
			
=======

			$table = $this->_prefix . $table;
			$sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) . "`) VALUES ({$values})";

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			if(!$this->createQuery($sql, $fields)->error()){
				return true;
			}
			return false;
	}
<<<<<<< HEAD
	
	public function update($table, $id, $fields) {
		$set = '';
		$x = 1;
		
		foreach($fields as $name => $value){
			$set .= "{$name} = ?";
			
=======

	public function update($table, $id, $fields) {
		$set = '';
		$x = 1;

		foreach($fields as $name => $value){
			$set .= "{$name} = ?";

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			if($x < count($fields)) {
				$set .= ', ';
			}
			$x++;
		}
		$table = $this->_prefix . $table;
		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
<<<<<<< HEAD
		
		if(!$this->createQuery($sql, $fields)->error()) {
			return true;
		}
		
		return false;
	}
	
	public function increment($table, $id, $field) {
		$table = $this->_prefix . $table;
		$sql = "UPDATE {$table} SET {$field} = {$field} + 1 WHERE id = {$id}";
		
		if(!$this->createQuery($sql)->error()) {
			return true;
		}
		
		return false;
	}
	
	public function decrement($table, $id, $field) {
		$table = $this->_prefix . $table;
		$sql = "UPDATE {$table} SET {$field} = {$field} - 1 WHERE id = {$id}";
		
		if(!$this->createQuery($sql)->error()) {
			return true;
		}
		
		return false;
	}
	
	public function results() {
		return $this->_results;
	}
	
=======

		if(!$this->createQuery($sql, $fields)->error()) {
			return true;
		}

		return false;
	}

	public function increment($table, $id, $field) {
		$table = $this->_prefix . $table;
		$sql = "UPDATE {$table} SET {$field} = {$field} + 1 WHERE id = ?";

		if(!$this->createQuery($sql, array($id))->error()) {
			return true;
		}

		return false;
	}

	public function decrement($table, $id, $field) {
		$table = $this->_prefix . $table;
		$sql = "UPDATE {$table} SET {$field} = {$field} - 1 WHERE id = ?";

		if(!$this->createQuery($sql, array($id))->error()) {
			return true;
		}

		return false;
	}

	public function results() {
		return $this->_results;
	}

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function first() {
		$results = $this->results();
		return $results[0];
	}
<<<<<<< HEAD
	
	public function error() {
		return $this->_error;
	}
	
=======

	public function error() {
		return $this->_error;
	}

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function count() {
		return $this->_count;
	}

	public function lastid() {
		return $this->_pdo->lastInsertId();
	}
<<<<<<< HEAD
	
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function alterTable($name, $column, $attributes) {
		$name = $this->_prefix . $name;
		$sql = "ALTER TABLE `{$name}` ADD {$column} {$attributes}";
		if(!$this->createQuery($sql)->error()) {
			return $this;
		}
		return false;
	}
<<<<<<< HEAD
	
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function modifyColumn($name, $column, $attributes) {
		$name = $this->_prefix . $name;
		$sql = "ALTER TABLE `{$name}` MODIFY {$column} {$attributes}";
		if(!$this->createQuery($sql)->error()) {
			return $this;
		}
		return false;
	}
<<<<<<< HEAD
	
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function removeColumn($name, $column) {
		$name = $this->_prefix . $name;
		$sql = "ALTER TABLE `{$name}` DROP COLUMN {$column}";
		if(!$this->createQuery($sql)->error()) {
			return $this;
		}
		return false;
	}
<<<<<<< HEAD
	
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	public function orderAll($table, $order, $sort) {
		$table = $this->_prefix . $table;
		if(isset($sort)){
			$sql = "SELECT * FROM {$table} ORDER BY {$order} {$sort}";
		} else {
			$sql = "SELECT * FROM {$table} ORDER BY {$order}";
		}
<<<<<<< HEAD
				
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
		if(!$this->query($sql)->error()) {
			return $this;
		}
		return false;
	}

	public function orderWhere($table, $where, $order, $sort) {
		$table = $this->_prefix . $table;
		if(isset($sort)){
			$sql = "SELECT * FROM {$table} WHERE {$where} ORDER BY {$order} {$sort}";
		} else {
			$sql = "SELECT * FROM {$table} WHERE {$where} ORDER BY {$order}";
		}
<<<<<<< HEAD
				
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
		if(!$this->query($sql)->error()) {
			return $this;
		}
		return false;
	}
<<<<<<< HEAD
	
	public function showTables($showTable) {
		$showTable = $this->_prefix . $showTable;
		$sql = "SHOW TABLES LIKE '{$showTable}'";
			
=======

	public function showTables($showTable) {
		$showTable = $this->_prefix . $showTable;
		$sql = "SHOW TABLES LIKE '{$showTable}'";

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
		if(!$this->query($sql)->error()) {
			return $this->_query->rowCount();
		}
		return false;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
