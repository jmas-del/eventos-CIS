<?php
session_start();

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

$conexion =mysqli_connect("localhost","root","","jmas");
$datos = "SELECT usuario, contrasena FROM usuariosdatos WHERE usuario ='$usuario' AND contrasena = '$contrasena'";
$resultado=mysqli_query($conexion, $datos);
sleep(1);
$cont=mysqli_num_rows($resultado);
if (!empty($usuario) && !empty($contrasena)){
if($cont>0){
	$_SESSION["usuario"] = $usuario;
	header("location:eventos.html");
}else{
	echo '<script language="javascript">alert("Error en la autenticacion");window.location.href="login.html"</script>';
}

}else{
	echo '<script language="javascript">alert("Inicie sesion");window.location.href="login.html"</script>';
}


mysqli_free_result($resultado);
mysqli_close($conexion);

?>