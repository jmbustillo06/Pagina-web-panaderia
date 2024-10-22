<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'conexion.php';

// Validamos que el formulario y que el boton login haya sido presionado
if(isset($_POST['login'])) {

// Obtener los valores enviados por el formulario
$correo = $_POST['correo_user'];
$contrasena = $_POST['contrasena_user'];

// Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
$sql = "SELECT * FROM usuarios WHERE correo_user= '$correo' and contrasena_user = '$contrasena' limit 1";
$resultado = $conn->query($sql);
$numero_registros = mysqli_num_rows($resultado);
$usuarios = mysqli_fetch_assoc($resultado);

if($numero_registros >0) {
		// Inicio de sesión exitoso
		echo "Inicio de sesión exitoso. Bienvenido, " . $correo . "!";
        session_start();//como utilizar una variable de session
        $_SESSION['user'] = $usuarios;
	    header("location:index.html");
	} else {
		// Credenciales inválidas
		echo "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña."."<br>";
		//echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}


}
