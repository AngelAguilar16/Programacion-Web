<?php 

	namespace Models;

	use Models\DB;

	class City extends DB {

		public $table;

		function __construct(){
			parent::__constructor();
			$this->table = $this->db_connect();
		}

	protected $campos = ['Name','CountryCode','District','Population'];

	public $valores = [];
	
	}	