<?php
	require_once "elemento.php";

class pie extends elemento{
	function __construct(){
		$this->setTitulo("");	
	}
	
	//Añade la informacion al pie de la pagina
	function setPie(){
		$str="";
		$str="<hr><center>Creado por CNSAKS</center></hr>";
		$this->setContenido($str);
	}
}
?>