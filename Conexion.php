<?php
	function Conectar(){
		$con=pg_connect("host=localhost dbname=clinica port=5432 user=postgres password=''");
		if($con){
			return $con;			
		}
		else{
			return null;
		}
	}
	
	function Desconectar($conexion){
        return pg_close($conexion);
    }
?>