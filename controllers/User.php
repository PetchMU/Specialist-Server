<?php

class User{
	
	function listAll(){
		echo 'will list all users';
	}
	
	function detail($id){
		$db = Database::create();
		$r = $db->read("select * from Users where uid = " . $id);
		
		echo json_encode([
			'detail' => $r[0]
		]);
	}
	
}