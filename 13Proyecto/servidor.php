<?php
error_reporting(E_ALL ^ E_NOTICE); // Para que no se muestren este tipo de error NOTICE en vuestra página, pero si el resto que podamos tener (errores código php,…)
require "conexion.php"; //Acceso a la conexion de BD*/
$nombre = $_GET['nombre'];

/*Revisar que los datos No esten vacios*/
if(!empty($nombre)){
 /*mysqli_real_escape_string() escapa los caracteres especiales de una cadena para usarla en una sentencia SQL.
	*mysqli_query() realiza una consulta a la base de datos. Para el éxito de consultas SELECT, SHOW, DESCRIBE, o EXPLAIN devolverá un objeto mysqli_result. Para otras consultas correctas devolverá TRUE. En caso de fallo FALSE.
  *mysqli_fetch_assoc() retorna un array asociativo de strings que representa a la fila obtenida del conjunto de resultados, donde cada clave del array representa el nombre de una de las columnas de de este. */
	$cliente = mysqli_real_escape_string($con, $nombre);
	$resultado = mysqli_query($con, "SELECT * FROM personas WHERE nombre LIKE '%".$cliente."%'");
	while($fila = mysqli_fetch_assoc($resultado)) {
		echo '<div class="miClase" onclick="toggleOverlay(this)">' .$fila['nombre'] . '</div>';
		echo '<input type="hidden" value="'.$fila['correo'].'">';
	}
		mysqli_close($con);
}else{
	mostrarUsuarios();
}


function mostrarUsuarios() {
 require "conexion.php";
 /*mysqli_query() realiza una consulta a la base de datos. Para el éxito de consultas SELECT, SHOW, DESCRIBE, o EXPLAIN devolverá un objeto mysqli_result. Para otras consultas correctas devolverá TRUE. En caso de fallo FALSE.
 *mysqli_fetch_assoc() retorna un array asociativo de strings que representa a la fila obtenida del conjunto de resultados, donde cada clave del array representa el nombre de una de las columnas de de este.*/
 $resultado = mysqli_query($con, "SELECT * FROM personas");
 while($fila = mysqli_fetch_assoc($resultado)) {
 	echo '<div class="miClase"  onclick="toggleOverlay(this)">' .$fila['nombre'] . '</div>';
 	echo '<input type="hidden" value="'.$fila['correo'].'">';
 }
 mysqli_close($con);
}
?>﻿
