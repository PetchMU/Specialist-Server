<?php

class Admin{
	
	function index(){
		echo md5(rand(1,1000) . time());
	}
	
}