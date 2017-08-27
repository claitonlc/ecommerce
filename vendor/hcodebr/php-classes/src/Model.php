<?php  

namespace Hcode;

class Model {

	private $values = [];

	public function __call($name, $args){

		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

		//var_dump($method, $fieldName); verificar o que esta retornando 
		//exit;

		switch ($method) {
			case "get":
				return $this->values[$fieldName];
				break;

			case "set":
				return $this->values[$fieldName] = $args[0];
				break;
		}
	}

	public function setData($data = array())
	{

		foreach ($data as $key => $value) {
			$this->{"set".$key}($value);
		}
	}
}

?>