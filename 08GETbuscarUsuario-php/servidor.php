<?php
header('Content-Type: text/html; charset=ISO-8859-1');

$personas= array("Jorge", "Julio", "Julian", "Ivan", "Irina", "Cesar", "Fernando", "Ferraz", "Flamingo", "Rebeca", "Rufino");
/*Obtenemos el nombre ingresado en el input*/
$nombre=$_GET["nombre"];
$sugerencia="";

	if($nombre !== ""){
		/*strtolower() devuelve una string con todos los caracteres alfabéticos convertidos a minúsculas*/
		$nombre=strtolower($nombre);
		/*strlen() retorna el numero de caracteres*/
		$cantidadDeCaracteres = strlen($nombre);

		foreach ($personas as $persona) {
			/*Almacenamos una subcadena de cada nombre que se encuentra dentro del arreglo.
			 *substr(string $cadena, int $start, int $length) devuelve una parte de la cadena definida por los parametros start y length. */
			$nombreEnServidor = substr($persona, 0, $cantidadDeCaracteres);
			/*stristr() determina si una cadena se encuentra dentro de otra cadena, devolviendo el substring coincidente. Si no se encuentra devuelve FALSE */
			if(stristr($nombre, $nombreEnServidor) !== false){//si nombreEnServidor se encuantra dentro del nombre ingresado por el usuario.
				if($sugerencia===""){
					$sugerencia=$persona;
				}else{
					$sugerencia.=", $persona";
				}
			}
		}
	}
/*si sugerencia es igual a "" entonces devuelve No fue encontrado. Si es verdadero devuelve $sugerencia*/
	echo $sugerencia === "" ? "No fue encontrado XD" : $sugerencia;
?>
