<?php 

namespace Models;

class DB {
	public $db_host;
	public $db_name;
	private $db_user;
	private $db_passwd;

	public $conex;

	public $s = " * ";
	public $w = " 1 ";
	public $r;

	function __constructor($dbh="localhost",$dbn = "world"){
		$this->db_user = "root";
		$this->db_host = $dbh;
		$this->db_name = $dbn;
	}

	public function db_connect(){
		$this->conex = new \mysqli($this->db_host,$this->db_user,"",$this->db_name);
		$this->conex->set_charset("utf8");
		if($this->conex->connect_error){
			echo "Falló la conexión.";
		}else{
			return $this->conex;
		}
	} 

	public function select($cc=[]){
		if(count($cc) > 0){
			$this->s = implode(",",$cc);
		}
		return $this;
	}

	public function where($ww=[]){
		$this->w = "";
		if(count($ww) > 0){
			foreach($ww as $wheres){
				$this->w .= $wheres[0] . " like '" . $wheres[1] . "' " . ' and '; 
			}
			$this->w .= ' 1 ';
		}
		return $this;
	}

	public function get(){
		$sql = 'select ' . $this->s . ' from ' . str_replace("Models\\","",get_class($this)) . ' where ' . $this->w;

		$this->r = $this->table->query($sql);
		
		while ($f = $this->r->fetch_assoc()) {
			$result[] = $f;
		}
		return json_encode($result);
	}

	public function insert(){
		$sql = 'insert into ' . str_replace("Models\\","",get_class($this)) . "(" . implode(",",$this->campos) .") values ('" . implode("','", $this->valores) . "')";
		return $this->table->query($sql);
	}

	public function delete(){
		$sql = 'delete from ' . str_replace("Models\\","",get_class($this)) . ' where ' . $this->w;
		return $this->table->query($sql);
	} 

	public function updateOrCreate($dd){
		$find = 'select ' . $dd[0] . ' from ' . str_replace("Models\\","",get_class($this)) . ' where ' . $dd[0] . ' = ' . $dd[1];
		if($this->table->query($find)->field_count){
			$sets = [];
			foreach ($this->valores as $key => $value) {
				$sets[] = $key . " = '" . $value . "'";
			}
			$update = 'update ' . str_replace("Models\\","",get_class($this)) . ' set ' . implode(",",$sets) . ' where ' . $dd[0] . ' = ' . $dd[1];
			return $this->table->query($update);
		}else{
			return $this->insert();
		}
	}
}
