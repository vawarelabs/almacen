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

$idficha= $_GET["ficha"]; 
$idficha=base64_decode($idficha);

$resultado=mysql_query("select * from reporte where ficha= '".$idficha."'") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{
	
echo"<script> alert('NO TIENE HERRAMIENTAS DE RESGUARDO');
document.location=('consulta_ficha.php');
</script>";

} 
else
{
	
$query = "SELECT * FROM trabajador WHERE ficha= '".$idficha."'";
$result = mysql_query($query) or die("Error en la instruccion SQL");
$row1 = mysql_fetch_array($result);

echo "<table border = '2' bordercolor=\"#0099FF\" width=1200 align=\"center\">";
echo "<tr> ";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>FICHA</b></th>";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>NOMBRE</b></th>";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>DEPARTAMENTO</b></th>";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>AREA</b></th>";
echo "<th bgcolor=\"#00CCFF\" align=\"center\"><b>NUMERO DE DEPARTAMENTO</b></th> ";

echo "<tr>";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row1["ficha"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row1["nombre_trabajador"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row1["departamento"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row1["area"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row1["numero_departamento"]."</td> ";
echo "</tr>";
echo "</table> ";

echo "<br>";
echo "<br>";

$query2 = "SELECT * FROM reporte WHERE ficha= '".$idficha."'";
$result2 = mysql_query($query2) or die("Error en la instruccion SQL");

echo "<table border = '2' bordercolor=\"#0099FF\" width=1500 align=\"center\">";
echo "<tr>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>EDITAR</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>REFERENCIA SAP</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>CLAVE</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>CANTIDAD SOLICITADA</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>DESCRIPCION</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>MARCA</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>PRECIO UNITARIO</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>TOTAL POR HERRAMIENTA</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>FECHA DE ENTREGA</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>FECHA DE DEVOLUCION</b></th> ";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>OBSERVACIONES</b></th> ";
echo "</tr>";

while ($row = mysql_fetch_array($result2)){
echo "<tr>";

$sql2=mysql_query("SELECT SUM(TRUNCATE(total_herramienta,2)) FROM reporte WHERE ficha='".$idficha."' ");
$sql4=mysql_query("SELECT SUM(TRUNCATE(solicitud1,0)) FROM reporte WHERE ficha='".$idficha."' ");

$resultado=mysql_result($sql2, 0);
$resultado2=mysql_result($sql4, 0);

echo "<td bgcolor=\"#FFFFFF\" align=\"center\"><a target='_blank' href='mod_herramientas.php? idficha=".base64_encode(@$row['id_ficha'])."'> <img src=\"images/editar.png\"</a></td>";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\">".$row["referencia_sap"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=146 align=\"center\">".$row["clave1"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=162 align=\"center\">".$row["solicitud1"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=500 align=\"center\">".$row["descripcion1"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\">".$row["marca"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=150 align=\"center\">".$row["precio_unitario"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=150 align=\"center\">".$row["total_herramienta"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\">".$row["fecha"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=152 align=\"center\">".$row["fecha_antigua2"]."</td>";
echo "<td bgcolor=\"#FFFFFF\" width=210 align=\"center\">".$row["comentarios1"]."</td>";
echo "</tr>";

}
echo "<tr>";
echo "<td bgcolor=\"#FFFFFF\" width=150 align=\"center\" colspan=\"5\"><b>TOTAL DE HERRAMIENTAS $ $resultado PESOS </b></td> ";
echo "<td bgcolor=\"#FFFFFF\" width=150 align=\"center\" colspan=\"6\"><b>TIENE BAJO SU RESGUARDO $resultado2 DE HERRAMIENTA</b></td> ";
echo "</tr>";
echo "</table> ";
echo "</table>";
$resultado3=$resultado2;
$resultado1=$resultado;
$sql3="UPDATE reporte SET totales='".$resultado1."', totales_herramientas='".$resultado3."' WHERE ficha = '".$idficha."' ";
mysql_query($sql3,$conexion);
}

} 
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>
