<?php 
	
	namespace Controllers;

	use Models\City;

	class ControllerCiudad {
		function index(){}

		public function listar($cuales="%%"){
			$cd = new City;
			$result = $cd->select(['ID','Name','CountryCode','Population'])
						->where([['CountryCode',$cuales]])
						->get();
			return $result;
		}

		public function insertar($datos){
			$cd = new City;
			$cd->valores = [
					'Name' => $datos['Name'],
					'CountryCode' => $datos['CountryCode'],
					'District' => $datos['District'],
					'Population' => $datos['Population']
					];
			if(!isset($datos['idciudad'])){
				return $cd->insert();
			}else{
				return $cd->updateOrCreate(['id',$datos['idciudad']]);
			}
		}

		public function eliminar($id){
			$cd = new City;
			return $cd->where([['ID',$id]])->delete();
		}

		public function buscar($id){
			$cd = new City;
			$result = $cd->where([['ID',$id]])->get();
			return $result;
		}
	}