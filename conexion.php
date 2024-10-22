<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Puede variar dependiendo de tu configuración
$username = "root"; // El nombre de usuario de tu base de datos
$password = "Jorgebustillo123"; // La contraseña de tu base de datos
$database = "usuarios_db"; // El nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    //echo "Conexión exitosa";
}

// Consulta SQL
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);


// Verificar si la consulta retornó resultados
if ($result) {
    // Iterar sobre los resultados
    while($row = $result->fetch_assoc()) {
        // Acceder a los datos de cada fila
        //echo "ID: " .$row["id_user"]. " - Nombre: " . $row["nombre_user"] . " - Contraseña: " . $row["contrasena_user"] . " - Correo: " . $row["correo_user"] . "<br>";
    }
} else {
    echo " 0 resultados encontrados";
}

// Cerrar conexión
//$conn->close();

?>