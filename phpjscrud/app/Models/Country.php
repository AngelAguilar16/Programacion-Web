<?php 

	namespace Models;

	use Models\DB;

	class Country extends DB {

		public $table;
		 function __construct(){
		 	parent::__constructor();
		 	$this->table = $this->db_connect();
		 }

	}

