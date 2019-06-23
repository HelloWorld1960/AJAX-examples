<?php
header('Content-Type: text/html; charset=ISO-8859-1');
/*accedemos a los datos que nos pasa la variable cadena por medio de $_GET[]*/
$num1=$_GET['num1'];
$num2=$_GET['num2'];
$respuesta="";

//revisar que son numeros
//ctype_digit() retorna true si los caracteres son numeros.
if(!ctype_digit($num1) || !ctype_digit($num2)){
	$respuesta .="Por favor ingrese dos numeros";
}
else{
/*con el punto estamos concatenando la respuesta*/
	$respuesta .="<table>";
	$respuesta .="<tr><td>" . $num1." + ".$num2." = ".($num1+$num2) . "<td></tr>";
	$respuesta .="<tr><td>" . $num1." - ".$num2." = ".($num1-$num2) . "<td></tr>";
	$respuesta .="<tr><td>" . $num1." x ".$num2." = ".($num1*$num2) . "<td></tr>";
	$respuesta .="<tr><td>" . $num1." / ".$num2." = ".($num1/$num2) . "<td></tr>";
	$respuesta .="</table>";
}

echo $respuesta;

?>
