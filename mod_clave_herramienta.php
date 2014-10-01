<?php  
$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$idclave_manual = $_POST["idclave_manual"];
$idclave = $_POST["idclave"];
$descripcion = $_POST["descripcion"];
$precio_unitario = $_POST["precio_unitario"];


$resultado=mysql_query("SELECT * FROM clave_herramientas WHERE idclave_manual= '".$idclave_manual."'  ") or die (mysql_error());
if (mysql_num_rows($resultado)==0)
{
echo"<script>alert('EL REGISTRO QUE DESEAS MODIFICAR NO SE ENCUENTRA');
document.location=('modificacion_reporte1.php');
</script>";
} 
else {
mysql_query("SELECT * FROM clave_herramientas WHERE idclave_manual = '".$idclave_manual."' ");
mysql_query("UPDATE clave_herramientas SET clave_manual = '".$idclave."', descripcion_manual = '".$descripcion."', precio_unitario_manual = '".$precio_unitario."' 
	WHERE idclave_manual = '".$idclave_manual."' ") or die ("ERROR AL MODIFICAR");
echo "<script>alert('EL REGISTRO SE A MODIFICADO');
document.location=('con_herramienta.php');
</script>";  
}
?>