<?php
session_start();
session_destroy();
?>
<script>
    // Redirigir al marco superior a la página de inicio de sesión
    window.top.location.href = 'index.html';
    // Mostrar un mensaje al usuario
    alert("Has cerrado sesión");
</script>

?>



// Destruir la sesión
//session_destroy();

// Mostrar mensaje de confirmación
//echo $resultado = ("cerrando sesión");
//$resultado == true;

// Redirigir al usuario a la página de inicio de sesión
//header("location:index.html");
