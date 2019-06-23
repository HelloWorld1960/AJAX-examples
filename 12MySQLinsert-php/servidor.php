<?php
/*Acceso a la conexion de BD*/
require "conexion.php";

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
/*Revisar que los datos No esten vacios*/
if(empty($nombre) || empty($correo)){
	echo "<span class='error'>"."Por favor, ingrese su nombre y correo"."</span>";
}else{
	/*resultadoBD extrae toda la informacion de la tabla personas.
	 *mysqli_query() realiza una consulta a la BD.
	 *Para el éxito de consultas SELECT, SHOW, DESCRIBE, o EXPLAIN devolverá un objeto mysqli_result. Para otras consultas correctas devolverá TRUE. En caso de fallo FALSE*/
	$resultadoBD =mysqli_query($con, "INSERT INTO personas VALUES('','$nombre','$correo')");
	echo "<span class='pass'>"."Gracias ".$nombre." ".$correo."</span>";
}

/*mysqli_close() function closes a previously opened database connection*/
mysqli_close($con);
?>
