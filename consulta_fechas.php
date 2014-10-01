<?php session_start(); 
@$login_ok = $_SESSION["login_ok"]; 
if ($login_ok == "identificado") {

echo "
<html>
<meta charset=\"utf-8\">
<link rel=\"shortcut icon\" href=\"/almacen/images/favicon.ico\" />
  
<head> 
<title>Almacen General</title> 
<style type=\"text/css\">
p{font-family:Helvetica, serif}
h2, h3, th, td{font-family:Helvetica, serif}
</style>

</head>
  
<body>

<header>
<table border=\"0\" align=\"center\">
<tr>
<td width=\"115\" align=\"right\"><p><a href=\"consultas1.php\"><img src=\"images/headerlogo.png\" width=\"121\" height=\"92\"></a></p></td>
<td width=\"350\"><p><h3>EXPORTADORA DE SAL, S.A DE C.V.</h3></p>
<p>GUERRERO NEGRO, BAJA CALIFORNIA SUR</p>
</td>
</tr>
</table>
</header>

<h3 align=\"center\">ALMACEN GENERAL</h3> 

</body>
</html>
";

$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

@$fecha= $_POST["thedate"];
@$fecha1= $_POST["thedate2"];
	
$resultado=mysql_query("SELECT * FROM reporte  WHERE fecha BETWEEN '".$fecha."' AND '".$fecha1."'  ") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{
	
echo"<script> alert('LOS DATOS SON INCORRECTOS, UTILICE FECHAS DE MENOR A MAYOR');
document.location=('consulta_fecha.php');
</script>";

} 
else
{
	
$query = "SELECT * FROM reporte WHERE fecha BETWEEN '".$fecha."' AND '".$fecha1."' ORDER BY departamento ASC ";
$result = mysql_query($query) or die("Error en la instruccion SQL");

while ($row=mysql_fetch_array($result))
{
echo "<table border = '2' bordercolor=\"#0099FF\" width=1200 align=\"center\">";
echo "<tr> ";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>FICHA</b></th>";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>NOMBRE</b></th>";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>DEPARTAMENTO</b></th>";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>AREA</b></th>";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>NUMERO DE DEPARTAMENTO</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row["ficha"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row["nombre_trabajador"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row["departamento"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row["area"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row["numero_departamento"]."</td>";
echo "</tr>";
echo "</table>";
echo"<br>";
echo "<table border = '2' bordercolor=\"#0099FF\" width=1500 align=\"center\">";
echo "<tr>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Referencia de SAP</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Clave</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Cantidad Solicitada</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Descripcion</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Marca</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Precio Unitario</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Total de Herramienta</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Fecha de Entrega</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Fecha de Devolucion</b></th>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>Comentarios/Observaciones</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\">".$row["referencia_sap"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=158 align=\"center\">".$row["clave1"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\">".$row["solicitud1"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=500 align=\"center\">".$row["descripcion1"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=163 align=\"center\">".$row["marca"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=156 align=\"center\">".$row["precio_unitario"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=156 align=\"center\">".$row["total_herramienta"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=152 align=\"center\">".$row["fecha"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\">".$row["fecha_antigua2"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=286 align=\"center\">".$row["comentarios1"]."</td>";
echo "</tr>";
echo "</table> ";

echo"<br>";
echo"<br>";
}
}
}
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>