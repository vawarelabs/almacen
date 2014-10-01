<?php  

$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$ficha= $_POST["ficha"];
$nombre_trabajador= $_POST["nombre_trabajador"];
$departamento= $_POST["departamento"];
$area= $_POST["area"];
$numero_departamento= $_POST["numero_departamento"];

$resultado=mysql_query("select * from trabajador where ficha= '".$ficha."'") or die (mysql_error());
if (mysql_num_rows($resultado)>0)
{
echo"<script>alert('YA ESTA REGISTRADO EL NUMERO DE FICHA'); 
document.location=('altas_trabajador.php');
</script>";
} 
else {
		
$ficha= $_POST["ficha"];
$nombre_trabajador= $_POST["nombre_trabajador"];
$departamento= $_POST["departamento"];
$area= $_POST["area"];
$numero_departamento= $_POST["numero_departamento"];

$sql="insert into trabajador(ficha, nombre_trabajador, departamento, area, numero_departamento) value('".$ficha."', '".$nombre_trabajador."', '".$departamento."', '".$area."', '".$numero_departamento."' )";
$res=mysql_query($sql,$conexion) or die (mysql_error());

echo"<script>alert('EL REGRISTRO A SIDO ALMACENADO');
document.location=('altas_trabajador.php');
</script>"; 
}
?>