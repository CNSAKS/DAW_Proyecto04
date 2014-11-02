<?php
	/**
    *Clase que gestiona la conexion con la base de datos
    */
class db
{
	/**
	* ip del servidor
	*/
	private $servidor="localhost";
	/**
	* nombre del usuario
	*/
	private $usuario="UserViajes";
	/**
	* password del usuario
	*/
	private $pass="verify";
	/**
	* base de datos a la que vamos a acceder
	*/
	private $base_datos="Viajes";
	/**
	* descriptor a la conexión con la base de datos
	*/
	private $descriptor;
	/**
	* boolean que nos indica si ha habido exito al conectar o no
	*/
	private $conectado;
	/**
	* información del error o conexión habilitada
	*/
	private $info;
	function __construct()
	{
		echo "Numero de argumentos: ".func_num_args();
		if(func_num_args()==1){
			$this->usuario = func_get_arg(0);
			$this->conectado=false;
			$this->info="";
		}elseif(func_num_args()==2){
			$this->usuario = func_get_arg(0);
			$this->pass = func_get_arg(1);
			$this->conectado=false;
			$this->info="";			
		}
	}
	
	/**
		* Realiza la conexión con la base de datos devolviendo el estado de la misma
		*
		* @return conectado boolean
	*/	
	public function conectar_base_datos()
	{
		$this->descriptor = new mysqli($this->servidor, $this->usuario, $this->pass, $this->base_datos);
		if ($this->descriptor->connect_errno) {
    		$this->$info="Fallo al contenctar a MySQL: (" . $this->descriptor->connect_errno . ") " . $this->descriptor->connect_error;
			$this->conectado=false;
		}else{
			$this->info="Conectado al servidor MySQL: " .$this->descriptor->host_info;
			$this->conectado=true;
			$this->descriptor->query("SET NAMES 'utf8'");
		}
		
		return $this->conectado;
	}
	
	/**
		* Devuelve el estado de la conexión actual
		*
		* @return info string
	*/	
	public function getInfo(){
		return $this->info;
	}

	/**
		* Devuelve una tabla con todos los lugares almacenados en la tabla de la base de datos lugares
		*
		* @return str string
	*/	
	public function getLugares(){
		$str="";
		if($resultado = $this->descriptor->query("SELECT * FROM viajes")){
			$str=$str."<table border=1><tr bgcolor='#dddddd'><td>ID</td><td>Pais</td><td>Ciudad</td><td>Lugar</td><td>Descripción</td><td>Fecha</td></tr>";
			for ($num_fila = 0; $num_fila < $resultado->num_rows; $num_fila++) {
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
				$str=$str."<tr>";
				$str=$str."<td>".$fila['id']."</td>";
				$str=$str."<td>".$fila['pais']."</td>";
				$str=$str."<td>".$fila['ciudad']."</td>";
				$str=$str."<td>".$fila['lugar']."</td>";
                $str=$str."<td>".$fila['descripcion']."</td>";
                $str=$str."<td>".$fila['fecha']."</td>";
				$str=$str."</tr>";
			}
			$str=$str."</table>";
		}else{
			 printf("Error: %s\n", $this->descriptor->error);
		}
		return $str;
	}
	
	public function setLugar($lugar,$descripcion,$fecha){
		if($resultado = $this->descriptor->query("INSERT INTO lugares (nombre,descripcion,fecha) VALUES ('$lugar','$descripcion','$fecha')")){
			echo "OK<br>";
		}else{
			echo "ERROR<br>";
			 printf("Error: %s\n", $this->descriptor->error);
		}
	}
}