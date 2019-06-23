<?php
/*solo es una prueba de las funciones*/
$cadena = "los colores primarios";
/*substr(string $cadena, int $start, int $length) devuelve una parte de la cadena definida por los parametros start y length*/
$resultado=substr($cadena, 2, 10);
echo $resultado; //s colores
echo "</br></br>";

/*Revisar si dentro de cadena1 esta la cadena "los".*/
$cadena1 = "los colores primarios";
/*stristr() determina si una cadena se encuentra dentro de otra cadena, devolviendo el substring coincidente. Si no se encuentra devuelve FALSE */
if (stristr($cadena1, "lor") !== false) {
	echo "lor fue encontrado";
	echo "</br>";
	echo "substring: ".stristr($cadena1, "lor"); //lores primarios
}else
	echo "lor no fue encontrado";
?>
