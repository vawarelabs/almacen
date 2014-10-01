<?php  
$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$idficha = $_POST["idficha"];
$ficha = $_POST["ficha"];
$nombre_trabajador = $_POST["nombre_trabajador"];
$departamento = $_POST["departamento"];
$numero_departamento= $_POST["numero_departamento"];
$referencia_sap = $_POST["referencia_sap"];
@$fecha = $_POST["thedate"];

$clave1 = $_POST["clave1"];
$descripcion1 = $_POST["descripcion"];
$marca = $_POST["marca"];
@$precio_unitario = $_POST["precio_unitario"];
@$solicitud1 = $_POST["solicitud1"];
$fecha_antigua2 = $_POST["thedate2"];
@$total_herramienta = $_POST["total_herramienta"];
$comentarios1 = $_POST["comentarios1"];

$resultado=mysql_query("SELECT * FROM reporte WHERE id_ficha= '".$idficha."'  ") or die (mysql_error());
if (mysql_num_rows($resultado)==0)
{
echo"<script>alert('EL REGISTRO QUE DESEAS MODIFICAR NO SE ENCUENTRA');
document.location=('modificacion_reporte1.php');
</script>";
} 
else {
mysql_query("SELECT * FROM reporte WHERE id_ficha = '".$idficha."' ");
mysql_query("UPDATE reporte SET referencia_sap = '".$referencia_sap."', precio_unitario = '".$precio_unitario."', fecha = '".$fecha."', 
	clave1 = '".$clave1."', solicitud1 = '".$solicitud1."', descripcion1 = '".$descripcion1."', marca = '".$marca."', comentarios1 = '".$comentarios1."', fecha_antigua2 = '".$fecha_antigua2."', total_herramienta = '".$total_herramienta."'  
	WHERE id_ficha = '".$idficha."' ") or die ("ERROR AL MODIFICAR");
echo "<script>alert('EL REGISTRO SE A MODIFICADO');
document.location=('consulta_ficha.php');
</script>";  
}
?>