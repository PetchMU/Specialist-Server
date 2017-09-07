<?php

class Database{
	
	private $conn;
	
	static function create(){
		return new Database();
	}
	
	function __construct(){
		$servername = "localhost";
		$username = "team";
		$password = "qwerty555";

		// Create connection
		$this->conn = mysqli_connect($servername, $username, $password, "speciali_main");
	}
	
	function read($sql){
		
		$arr = [];
		
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;
			}
		} 
		
		return $arr;
	}
	
	function write($sql){
		mysqli_query($this->conn, $sql);
		return mysqli_affected_rows($this->conn);
	}
	
}