<?php 

namespace Controllers;

use Models\Country;

class ControllerPais {

	function index(){

	}

	public function listar(){
		$cd = new Country;
		$result = $cd->select(['Code','Name'])->get();
		return $result; 
	}

}