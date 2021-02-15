<?php

class Dbh {
	private static $_instance = null;
	private $_pdo, 
			$_query, 
			$_error = false, 
			$_results,
			$_count = 0;
	protected $_lastInsertId;

			
	private function __construct(){
		try {
			$this->_pdo = new PDO ('mysql:host='. Config::get('mysql/host') .';dbname='. Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'), array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}
	
	public static function getInstance() {
		if(!isset(self::$_instance)){
			self::$_instance = new Dbh();
			
		}
		return self::$_instance;
	}
	
	private function query($sql, $params = array()){
		
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)){
			$x = 1;
				
			if(count($params)) {
				foreach($params as $param) {
				
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}
			
			if($this->_query->execute()){
				if (strpos($sql, 'SELECT') !== false) {
    				
					$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
					
				}
			} else {
				$this->_error = true;
			}
		}
		return $this;
	}
	
	private function action($action, $table, $where = array()) {
		
		if((count($where))===3){//αν κάνει ερώτημα με ακριβώς τρία ορίσματα ( Α >=< Β)
			$operators = array('=', '>', '<', '>=', '<=');
			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];
			
			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				if(!$this->query($sql, array($value))->error()) {
					return $this;
					
				}
				return false;
			}
		}else if((count($where, 1))%4===0){//αν κάνει ερώτημα με τριάδες ορισμάτων ( Α >=< Β)
			
			$operators = array('=', '>', '<', '>=', '<=');
			$fields_and_operators = "";
			$valuess = array();
			$i = 1;
				foreach($where as $one_clause) {
					$field[$i] 		= $one_clause[0];
					$operator[$i] 	= $one_clause[1];
					$value[$i]		= $one_clause[2];
					
					$fields_and_operators .= $field[$i]." ".$operator[$i]." ?";
					array_push($valuess, $value[$i]);
					if($i<(count($where, 1)/4)){
						$fields_and_operators .= " AND ";
						$i++;
						
					}
				}
									
				$sql = "{$action} FROM {$table} WHERE {$fields_and_operators}";
				
				if(!$this->query($sql, $valuess)->error()) {
					
					return $this;
					
				}
				return false;
		
		}
		
		return false;
	}
	
	public function get($table, $where = array()) {
		
		return $this->action('SELECT *', $table, $where);
	}
	
	public function delete($table, $where = array()) {
		return $this->action('DELETE ', $table, $where);
	}
	
	public function insert($table, $fields = array()) {
		
		if(count($fields)) {
			$keys = array_keys($fields);
			$values = null;
			$x = 1;
			
			foreach($fields as $key=>$field) {
				
				if($field==='NOW()'){
					
					$values .= 'NOW()';
					if($x < count($fields)) {
						$values .= ', ';
					}
					unset($fields[$key]);
					$x++;
				}else {
					$values .= '?';
					if($x < count($fields)) {
						$values .= ', ';
					}
					$x++;
				}
			}
			
			$sql = "INSERT INTO {$table} (`". implode('`, `', $keys) ."`) VALUES ({$values})";
			//$this->_lastInsertId = $this->_pdo->lastInsertId('pk_forms');
			echo $this->_lastInsertId;
			echo $sql;
		
			if(!$this->query($sql, $fields)->error()) {
				
				return true;
				
			}
		}
		
	}
	
	public function update($table, $id, $fields) {
		$set = '';
		$x = 1;
		
		foreach($fields as $name=>$value) {
			if($value==='NOW()') {
				$set .= "{$name} = NOW()";
				unset($fields[$name]);
				if($x < count($fields)) {
							$set .= ',';
				}
				$x++;
			}else{
				$set .= "{$name} = ?";
				if($x < count($fields)) {
							$set .= ',';
				}
				$x++;
			}
		}
		
		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
		
		if(!$this->query($sql, $fields)->error()) {
				
				return true;
				
			}
			return false;
	}
	
	public function results() {
		return $this->_results;
	}
	
	public function error() {
		return $this->_error;
	}
	
	public function count() {
		return $this->_count;
	}

	public function getLastInsertId(){
		return $this->_lastInsertId;
	}
}