<?php
error_reporting(E_ALL ^ E_NOTICE); //que no se muestren este tipo de error NOTICE en vuestra página, pero si el resto que podamos tener (errores código php,…)
require "conexion.php";

$personas             = $_GET["personas"];
// Usuario eliminado
$usuarioIDEliminado   = $_GET["usuarioIDEliminado"];
// Datos actualizados
$usuarioIDActualizado = $_GET["usuarioIDActualizado"];
$nombreActualizado    = $_GET["nombreActualizado"];
/*Ingresar nuevo usuario y correo*/
$nuevoUsuario         = $_GET["nuevoUsuario"];
$nuevoEmail           = $_GET["nuevoEmail"];

/*Variables para asignarle un determinado id a cada usuario de la tabla*/
$nombreID        = "nombreID";
$emailID         = "emailID";
$actualizar      = "actualizar";
$borrar          = "borrar";

if ($personas === "personas") {
    /*mysqli_query() realiza una consulta a la base de datos. Para el éxito de consultas SELECT, SHOW, DESCRIBE, o EXPLAIN devolverá un objeto mysqli_result. Para otras consultas correctas devolverá TRUE. En caso de fallo FALSE.*/
    $resultado = mysqli_query($con, "SELECT * FROM personas");
    $table  = "";
    $table .= '<div class="container">';
    $table .= '<table class="table table-striped table-bordered">';
    $table .= '<tr>';
    $table .= '<th>ID</th>';
    $table .= '<th>Nombre</th>';
    $table .= '<th>Email</th>';
    $table .= '<th>Editar Usuario</th>';
    $table .= '<th>Borrar usuario</th>';
    $table .= '</tr>';

		/*mysqli_fetch_assoc() retorna un array asociativo de strings que representa a la fila obtenida del conjunto de resultados, donde cada clave del array representa el nombre de una de las columnas de de este. */
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $table .= '<tr>';
        $table .= '<th>' . $fila['id_persona'] . '</th>';
        $table .= '<th id="' . $nombreID . $fila['id_persona'] . '">' . $fila['nombre'] . '</th>';
        $table .= '<th id="' . $emailID . $fila['id_persona'] . '">' . $fila['correo'] . '</th>';
        $table .= '<th><input id="' . $fila['id_persona'] . '" onclick="editarUsuario(this.id)"" type="button" value="Editar" class= "btn btn-default"></th>';
        $table .= '<th><input id="' . $borrar . $fila['id_persona'] . '" type="button" onclick="borrarUsuario(' . $fila['id_persona'] . ')" value="Borrar" class= "btn btn-danger"></th>';
        $table .= '<th><input id="' . $actualizar . $fila['id_persona'] . '" type="button" onclick="actualizarUsuario(' . $fila['id_persona'] . ')" value="Actualizar" class= "btn btn-primary" style="display:none"></th>';
        $table .= '</tr>';
    }
    $table .= '</table>';
    $table .= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar usuario</button>';
    $table .= '</div>';
    echo $table;
    /*mysqli_close() function closes a previously opened database connection*/
    mysqli_close($con);
}

// Acutalizar usuario
if (!empty($nombreActualizado)) { // Si el nombre actualizado no se encuentra vacio.
		/*mysqli_real_escape_string() escapa los caracteres especiales de una cadena para usarla en una sentencia SQL.
		*mysqli_query() realiza una consulta a la base de datos. Para el éxito de consultas SELECT, SHOW, DESCRIBE, o EXPLAIN devolverá un objeto mysqli_result. Para otras consultas correctas devolverá TRUE. En caso de fallo FALSE.*/
    $cliente   = mysqli_real_escape_string($con, $nombreActualizado);
    $resultado = mysqli_query($con, "UPDATE personas SET nombre = '$cliente' WHERE id_persona = $usuarioIDActualizado");
    /*mysqli_close() function closes a previously opened database connection*/
    mysqli_close($con);
}

// Eliminar usuario
// Si el id del usuario eliminado no se encuntra vacio
if (!empty($usuarioIDEliminado)) {
    /*mysqli_query() realiza una consulta a la base de datos. Para el éxito de consultas SELECT, SHOW, DESCRIBE, o EXPLAIN devolverá un objeto mysqli_result. Para otras consultas correctas devolverá TRUE. En caso de fallo FALSE.*/
    $resultado = mysqli_query($con, "DELETE FROM personas WHERE id_persona = $usuarioIDEliminado");
    mysqli_close($con);
}


/*Ingresar usuario*/
/*Si ningun imput esta vacio*/
if (!empty($nuevoUsuario) && !empty($nuevoEmail)) {
    /*mysqli_query() realiza una consulta a la base de datos. Para el éxito de consultas SELECT, SHOW, DESCRIBE, o EXPLAIN devolverá un objeto mysqli_result. Para otras consultas correctas devolverá TRUE. En caso de fallo FALSE.*/
    $resultado = mysqli_query($con, "INSERT into personas values('','$nuevoUsuario','$nuevoEmail')");
    mysqli_close($con);
}

?>
