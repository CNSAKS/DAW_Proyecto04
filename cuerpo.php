<?php
	require_once "elemento.php";

class cuerpo extends elemento{
	function __construct(){
		
	}
	//Crea una tabla con fotos segun la especificacion de filas y columnas
	//$filas Numero de filas
	//$columnas Numero de columnas
	function setTabla($filas,$columnas){
		$this->setTitulo("Fotos");	
		$str="";
		$contador=1;
		$str="<table>";
		for($i=0;$i<$filas;$i++){
			$str=$str."<tr>";
			for($j=0;$j<$columnas;$j++){
				$photo="photo_".$contador++.".png";
				$str=$str."<td><img src='".$photo."' width='150' height='150'></td>";
			}
			$str=$str."</tr>";
		}
		$str=$str."</table>";
		$this->setContenido($str);
	}
	
	//Añade un titulo y un texto a la pagina
	//$tit Titulo de la pagina
	//$str Texto de la pagina
	function setTexto($tit,$str){
		$this->setTitulo("<h2>".$tit."</h2>");
		$this->setContenido($str);		
	}
}
?>