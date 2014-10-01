<?php  

$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$clave_manual = $_POST["clave_manual"];
$descripcion_manual = $_POST["descripcion_manual"];
$precio_unitario_manual = $_POST["precio_unitario_manual"];

$resultado=mysql_query("select * from clave_herramientas where clave_manual = '".$clave_manual."'") or die (mysql_error());
if (mysql_num_rows($resultado)>0)
{
echo"<script>alert('YA ESTA REGISTRADA LA CLAVE'); 
document.location=('altas_herramientas_manual.php');
</script>";
} 
else {
		
$clave_manual = $_POST["clave_manual"];
$descripcion_manual = $_POST["descripcion_manual"];
$precio_unitario_manual = $_POST["precio_unitario_manual"];

$sql="insert into clave_herramientas(clave_manual, descripcion_manual, precio_unitario_manual) value('".$clave_manual."', '".$descripcion_manual."', '".$precio_unitario_manual."')";
$res=mysql_query($sql,$conexion) or die (mysql_error());

echo"<script>alert('EL REGRISTRO A SIDO ALMACENADO');
document.location=('altas_herramientas_manual.php');
</script>"; 
}
?>