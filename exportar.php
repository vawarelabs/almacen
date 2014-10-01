<?php
@$departamento= $_POST["departamento"];
@$ficha= $_POST["ficha"];
@$fecha1= $_POST["thedate"];
@$fecha2= $_POST["thedate2"];
@$general= $_POST["opcion"];

$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

///////////////////////////////////////// FICHA //////////////////////////////////////////

if($ficha!="")
{	
$resultado=mysql_query("select * from reporte where ficha= '".$ficha."'") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{
	
echo"<script> alert('NO TIENE HERRAMIENTAS DE RESGUARDO');
document.location=('exportar_excel.php');
</script>";

} 
else
{
	
$query = "SELECT * FROM reporte WHERE ficha= '".$ficha."'";
$result = mysql_query($query) or die("Error en la instruccion SQL");
$row1 = mysql_fetch_array($result);

ob_start(); 
echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr> ";
echo "<th bgcolor=\"#00CCFF\"><b>FICHA</b></th> ";
echo "<th bgcolor=\"#00CCFF\"><b>NOMBRE</b></th> ";
echo "<th bgcolor=\"#00CCFF\"><b>DEPARTAMENTO</b></th> ";
echo "<th bgcolor=\"#00CCFF\"><b>AREA</b></th> ";
echo "<th bgcolor=\"#00CCFF\"><b>NUMERO DE DEPARTAMENTO</b></th> ";

echo "<tr>";
echo "<td width=240>".$row1["ficha"]."</td> ";
echo "<td width=240>".$row1["nombre_trabajador"]."</td> ";
echo "<td width=240>".$row1["departamento"]."</td> ";
echo "<td width=240>".$row1["area"]."</td> ";
echo "<td width=240>".$row1["numero_departamento"]."</td> ";
echo "</tr>";
echo "</table> ";

echo "<br>";

$query2 = "SELECT * FROM reporte WHERE ficha= '".$ficha."'";
$result2 = mysql_query($query2) or die("Error en la instruccion SQL");

echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>REFERENCIA SAP</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>CLAVE</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>CANTIDAD SOLICITADA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>DESCRIPCION</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171><b>MARCA</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171><b>PRECIO UNITARIO</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>TOTAL DE HERRAMIENTA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>COSTO ACTUAL</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>25%</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>50%</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>75%</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>100%</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>COSTO TOTAL</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>FECHA DE ENTREGA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>FECHA DE DEVOLUCION</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>25%</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>50%</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>75%</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>100%</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>OBSERVACIONES</b></th>";
echo "</tr>";

echo "</table> ";
while ($row = mysql_fetch_array($result2)){

$sql2=mysql_query("SELECT SUM(TRUNCATE(total_herramienta,2)) FROM reporte WHERE ficha='".$ficha."' ");

$resultado=mysql_result($sql2, 0);

echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr>";
echo "<td width=160>".$row["referencia_sap"]."</td> ";
echo "<td width=158>".$row["clave1"]."</td>";
echo "<td width=160>".$row["solicitud1"]."</td>";
echo "<td width=163>".$row["descripcion1"]."</td>";
echo "<td width=163>".$row["marca"]."</td>";
echo "<td width=156>".$row["precio_unitario"]."</td> ";
echo "<td width=156>".$row["total_herramienta"]."</td> ";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=152>".$row["fecha"]."</td> ";
echo "<td width=160>".$row["fecha_antigua2"]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=163>".@$row[""]."</td>";
echo "<td width=186>".$row["comentarios1"]."</td>";
echo "</tr>";
echo "</table>";

}
echo "<tr>";
echo "<td bgcolor=\"#FFFFFF\" width=150 align=\"center\" colspan=\"11\"><b>TOTAL DE HERRAMIENTAS $ $resultado PESOS</b></td> ";
echo "</tr>";
echo "</table> ";
echo "</table>";

$reporte = ob_get_clean(); 

@header("Content-type: application/vnd.ms-excel");  
@header("Content-Disposition: attachment; filename=almacen ficha.xls");  
@header("Pragma: no-cache");  
@header("Expires: 0"); 

echo @$reporte;  

echo "<script>document.location=('exportar_excel.php') </script>"; 
}
}

///////////////////////////////////////// DEPARTAMENTO ///////////////////////////////////////////////////////////////////////////////////

elseif (@$departamento!="") 
{
	
$resultado=mysql_query("SELECT * FROM reporte WHERE departamento= '".$departamento."' ") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{
	
echo"<script> alert('LOS DATOS SON INCORRECTOS');
document.location=('exportar_excel.php');
</script>";

} 
else
{
	
$query = "SELECT * FROM reporte WHERE departamento= '".$departamento."' ";
$result = mysql_query($query) or die("Error en la instruccion SQL");

ob_start(); 

while($row=mysql_fetch_array($result))  
{ 

echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr> ";
echo "<th bgcolor=\"#00CCFF\"><b>FICHA</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>NOMBRE</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>DEPARTAMENTO</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>AREA</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>NUMERO DE DEPARTAMENTO</b></th>";

echo "</tr>";

echo "<tr>";
echo "<td width=240>".$row["ficha"]."</td>";
echo "<td width=240>".$row["nombre_trabajador"]."</td>";
echo "<td width=240>".$row["departamento"]."</td> ";
echo "<td width=240>".$row["area"]."</td> ";
echo "<td width=240>".$row["numero_departamento"]."</td>";
echo "</tr>";
echo "</table> ";

echo"<br>";

echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>REFERENCIA SAP</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>CLAVE</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171><b>CANTIDAD SOLICITADA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>DESCRIPCION</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>MARCA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>PRECIO UNITARIO</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>TOTAL DE HERRAMIENTA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>FECHA DE ENTREGA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>FECHA DE DEVOLUCION</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>OBSERVACIONES</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td width=160>".$row["referencia_sap"]."</td>";
echo "<td width=158>".$row["clave1"]."</td>";
echo "<td width=160>".$row["solicitud1"]."</td>";
echo "<td width=163>".$row["descripcion1"]."</td>";
echo "<td width=163>".$row["marca"]."</td>";
echo "<td width=156>".$row["precio_unitario"]."</td>";
echo "<td width=156>".$row["total_herramienta"]."</td>";
echo "<td width=152>".$row["fecha"]."</td>";
echo "<td width=160>".$row["fecha_antigua2"]."</td>";
echo "<td width=186>".$row["comentarios1"]."</td>";
echo "</tr>";
echo "</table> ";
echo"<br>";
echo"<br>";

$reporte = ob_get_clean(); 

@header("Content-type: application/vnd.ms-excel");  
@header("Content-Disposition: attachment; filename=almacen departamento.xls");  
@header("Pragma: no-cache");  
@header("Expires: 0"); 

echo @$reporte; 
}
} 

} 

////////////////////////////////////////////// RANGO DE FECHAS//////////////////////////////////////////////////////////////////////
elseif($fecha1!="" && $fecha2!="" )
{	
$resultado=mysql_query("SELECT * FROM reporte WHERE fecha BETWEEN '".$fecha1."' AND '".$fecha2."' ") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{
	
echo"<script> alert('LOS DATOS SON INCORRECTOS, UTILICE FECHAS DE MENOR A MAYOR');
document.location=('exportar_excel.php');
</script>";

} 
else
{
	
$query = "SELECT * FROM reporte WHERE fecha BETWEEN '".$fecha1."' AND '".$fecha2."'  ORDER BY fecha ASC ";
$result = mysql_query($query) or die("Error en la instruccion SQL");

while ($row=mysql_fetch_array($result))
{
	
ob_start(); 

echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr> ";
echo "<th bgcolor=\"#00CCFF\"><b>FICHA</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>NOMBRE</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>DEPARTAMENTO</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>AREA</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>NUMERO DE DEPARTAMENTO</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td width=240>".$row["ficha"]."</td>";
echo "<td width=240>".$row["nombre_trabajador"]."</td>";
echo "<td width=240>".$row["departamento"]."</td> ";
echo "<td width=240>".$row["area"]."</td> ";
echo "<td width=240>".$row["numero_departamento"]."</td>";
echo "</tr>";
echo "</table>";

echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>REFERENCIA SAP</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>CLAVE</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171><b>CANTIDAD SOLICITADA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>DESCRIPCION</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>MARCA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>PRECIO UNITARIO</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>TOTAL DE HERRAMIENTA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>FECHA DE ENTREGA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>FECHA DE DEVOLUCION</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>OBSERVACIONES</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td width=160>".$row["referencia_sap"]."</td>";
echo "<td width=158>".$row["clave1"]."</td>";
echo "<td width=160>".$row["solicitud1"]."</td>";
echo "<td width=163>".$row["descripcion1"]."</td>";
echo "<td width=163>".$row["marca"]."</td>";
echo "<td width=156>".$row["precio_unitario"]."</td>";
echo "<td width=156>".$row["total_herramienta"]."</td>";
echo "<td width=152>".$row["fecha"]."</td>";
echo "<td width=160>".$row["fecha_antigua2"]."</td>";
echo "<td width=186>".$row["comentarios1"]."</td>";
echo "</tr>";
echo "</table> ";

echo"<br>";
echo"<br>";

$reporte1 = ob_get_clean(); 

@header("Content-type: application/vnd.ms-excel");  
@header("Content-Disposition: attachment; filename=almacen fechas.xls");  
@header("Pragma: no-cache");  
@header("Expires: 0"); 

echo @$reporte1; 
}
}
}

///////////////////////////////////////// GENERAL ///////////////////////////////////////////////////////////////////////////////////

else 
{

$registros=mysql_query("SELECT * FROM reporte ORDER BY ficha ASC",$conexion) or die("Problemas en el select:".mysql_error());

while ($row=mysql_fetch_array($registros))
{
 
ob_start(); 
echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr> ";
echo "<th bgcolor=\"#00CCFF\"><b>FICHA</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>NOMBRE</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>DEPARTAMENTO</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>AREA</b></th>";
echo "<th bgcolor=\"#00CCFF\"><b>NUMERO DE DEPARTAMENTO</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td width=240>".$row["ficha"]."</td>";
echo "<td width=240>".$row["nombre_trabajador"]."</td>";
echo "<td width=240>".$row["departamento"]."</td> ";
echo "<td width=240>".$row["area"]."</td> ";
echo "<td width=240>".$row["numero_departamento"]."</td>";
echo "</tr>";
echo "</table>";

echo "<table border = '1' width=1200 align=\"center\">";
echo "<tr>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>REFERENCIA SAP</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>CLAVE</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171><b>CANTIDAD SOLICITADA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>DESCRIPCION</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>MARCA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>PRECIO UNITARIO</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>TOTAL DE HERRAMIENTA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>FECHA DE ENTREGA</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>FECHA DE DEVOLUCION</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171><b>OBSERVACIONES</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td width=160>".$row["referencia_sap"]."</td>";
echo "<td width=158>".$row["clave1"]."</td>";
echo "<td width=160>".$row["solicitud1"]."</td>";
echo "<td width=163>".$row["descripcion1"]."</td>";
echo "<td width=163>".$row["marca"]."</td>";
echo "<td width=156>".$row["precio_unitario"]."</td>";
echo "<td width=156>".$row["total_herramienta"]."</td>";
echo "<td width=240>".$row["fecha"]."</td>";
echo "<td width=160>".$row["fecha_antigua2"]."</td>";
echo "<td width=186>".$row["comentarios1"]."</td>";
echo "</tr>";
echo "</table>";

echo"<br>";
echo"<br>";

$reporte2 = ob_get_clean(); 

@header("Content-type: application/vnd.ms-excel");  
@header("Content-Disposition: attachment; filename=almacen general.xls");  
@header("Pragma: no-cache");  
@header("Expires: 0"); 

echo @$reporte2; 
}
}

?>