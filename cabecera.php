<?php
	require_once "elemento.php";

class cabecera extends elemento{
	
	//array para crear el menu. Las lineas comentadas son de las URL en una de las VMs
	private $menu=array(
			"Inicio"=>array(
					"txt"=>"Inicio",
					"url"=>"http://169.254.154.238/Proyecto04/index.php"
					//"url"=>"http://192.168.1.22/Proyecto03/index.php"
									
				),
			"Fotos"=>array(
					"txt"=>"Fotos",
					"url"=>"http://169.254.154.238/Proyecto04/fotos.php"
					//"url"=>"http://192.168.1.22/Proyecto03/fotos.php"					
				),
			"Contacto"=>array(
					"txt"=>"Contacto",
					"url"=>"http://169.254.154.238/Proyecto04/contacto.php"
					//"url"=>"http://192.168.1.22/Proyecto03/contacto.php"				
				),
	);
	
	function __construct(){
		$this->setTitulo("");	
	}
	
	//Cambia la direccion url del elemento seleccionado
	//$txt Elemento seleccionado
	//$url Nueva url
	function setDireccion($txt,$url){
		$this->menu[$txt]["url"]=$url;
	}
	
	//Crea un menu apartir del array $menu
	function setMenu(){
		$str="";
		$str=$str."<div class='nav'><ul>";
		foreach ($this->menu as $Indice => $Index){			
			$str=$str."<li><a href='".$Index["url"]."'>".$Index["txt"]."</a></li>";
		}
		$str=$str."</ul></div>";
		$this->setContenido($str);
	}
}
?>