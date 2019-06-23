<?php
/*Acceso a la conexion de BD*/
require "conexion.php";

$nombre = $_GET['nombre'];

if(!empty($nombre)){ //Si el nombre ingresado por el usuario No esta vacio, realiza lo siguiente.
	/*mysqli_real_escape_string() escapa los caracteres especiales de una cadena para usarla en una sentencia SQL.*/
	$persona = mysqli_real_escape_string($con, $nombre);
	/*resultadoBD extrae toda la informacion de la tabla personas.
	 *mysqli_query() realiza una consulta a la BD.
	 *Like se usa para hallar coincidencias dentro de una cadena bajo un patron dado.
	 *'% %' Encuentra cualquier valor que dentro de los porcentajes en cualquier posicion.*/
	$resultadoBD = mysqli_query($con, "SELECT * FROM personas WHERE nombre LIKE '%".$persona."%' ");

	/*Extraer cada fila de la BD*/
	/*mysqli_fetch_assoc() retorna un array asociativo de strings que representa a la fila obtenida del conjunto de resultados, donde cada clave del array representa el nombre de una de las columnas de de este. */
	while($fila = mysqli_fetch_assoc($resultadoBD)) {
		echo '<div class = "miClase">'.$fila['nombre'].'</div>';
	}
}

/*mysqli_close() function closes a previously opened database connection*/
mysqli_close($con);
?>
