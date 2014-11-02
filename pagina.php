<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";
require_once "db.php";

class pagina{
	public $titulo="Titulo de la pagina";
	private $cabecera,$cuerpo,$pie;
	
	function __construct($numFil,$numCol,$tit,$text){
		$this->cabecera = new cabecera();
		//$this->cabecera->setDireccion("Contacto","http://169.254.154.238/Proyecto03/contacto.php");
		$this->cabecera->setMenu();		
		$this->cuerpo = new cuerpo();
		if(!is_null($numFil) && !is_null($numCol)){
		$db=new db("UserViajes","verify");
		$db->conectar_base_datos();
		echo $db->getInfo();
		$this->cuerpo->setTexto("Tabla", $db->getLugares());
		}
		if(!is_null($tit) && !is_null($text)){
		$this->cuerpo->setTexto($tit,$text);
		}
		$this->pie = new pie();
		$this->pie->setPie();	
	}
	
	function getPagina(){
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}
}
?>