<?php
/*conexion a base de datos*/
$mysql_host='127.0.0.1'; //servidor
$mysql_usuario='root'; //usuario
$mysql_clave= '';//contraseña
$mysql_BD='ajax_usuarios';//nombre de la base de datos
/*Aquí abrimos la conexión en el servidor.
Normalmente se envian 3 parametros (los datos del servidor, usuario y contraseña) a la función mysql_connect,
si no hay ningún error la conexión será un éxito
El @ que se ponde delante de la funcion, es para que no muestre el error al momento de ejecutarse*/
$con=mysqli_connect($mysql_host, $mysql_usuario, $mysql_clave, $mysql_BD);

if(mysqli_connect_errno()){
	echo "Error en la conexion: " . mysqli_connect_error();
}else{
	//echo "Conectado";
}

?>
