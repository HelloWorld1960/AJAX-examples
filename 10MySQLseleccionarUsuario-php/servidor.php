<?php
/*tener acceso a la conexion de BD*/
require "conexion.php";

$usuario = $_GET['usuario'];
$usuario = (int)$usuario; //int asegura de que se trate de un numero entero.
/*mysqli_query() realiza una consulta a la base de datos.
 *Para el éxito de consultas SELECT, SHOW, DESCRIBE, o EXPLAIN devolverá un objeto mysqli_result. Para otras consultas correctas devolverá TRUE. En caso de fallo FALSE*/
$resultadoBD = mysqli_query($con, "SELECT * FROM personas WHERE id_persona = $usuario");

$usuariosBD ="";
$usuariosBD .="<table>";
$usuariosBD .="<tr>";
$usuariosBD .="<th>Nombre</th>";
$usuariosBD .="<th>Correo</th>";
$usuariosBD .="</tr>";

/*Extraer cada fila de la BD*/
/*mysqli_fetch_assoc() retorna un array asociativo de strings que representa a la fila obtenida del conjunto de resultados, donde cada clave del array representa el nombre de una de las columnas de de este. */
while ($fila = mysqli_fetch_assoc($resultadoBD)) {
	$usuariosBD .= "<tr>";
	$usuariosBD .= "<td>". $fila['nombre']."</td>";
	$usuariosBD .= "<td>". $fila['correo']."</td>";
	$usuariosBD .= "</tr>";
}

$usuariosBD.="</table>";

echo $usuariosBD;

/*mysqli_close() function closes a previously opened database connection*/
mysqli_close($con);

?>
