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

<br>

</body>
</html>
";

 echo "<style> 
 #top { position: absolute;
		right: 50%;
		top: 50%;
		width: 350px;
		height: 200px;
		margin-top: -300px;
		margin-right: -500px; } 
  </style>";

$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$departamento= $_POST["departamento"];

$resultado=mysql_query("SELECT * FROM  reporte WHERE departamento= '".$departamento."' ") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{
	
echo"<script> alert('LOS DATOS SON INCORRECTOS');
document.location=('consulta_depto.php');
</script>";

} 
else
{
	
$query = "SELECT DISTINCT nombre_trabajador, ficha, departamento, area, numero_departamento, totales FROM reporte WHERE departamento= '".$departamento."' ";
$result = mysql_query($query) or die("Error en la instruccion SQL");

while($row=mysql_fetch_array($result))  
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
echo "</table> ";

echo"<br>";
$sql=mysql_query("SELECT SUM(TRUNCATE(total_herramienta,2)) FROM reporte WHERE departamento='".$departamento."' ");
@$resultado=mysql_result($sql, 0);

echo "<table border = '2' bordercolor=\"#0099FF\" width=1200 align=\"center\">";
echo "<tr>";
echo "<th bgcolor=\"#afd5f4\" width=171 align=\"center\"><b>TOTAL DE HERRAMIENTA DE TRABAJADOR</b></th>";

echo "</tr>";

echo "<tr>";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\">".$row["totales"]."</td>";

echo "</tr>";
echo "</table> ";


echo"<br>";
echo"<br>";



}
} 

$resultado1= $resultado;
$sql3="UPDATE totales SET  totales_depto='".$resultado1."' WHERE departamento = '".$departamento."' ";
//$sql3= "INSERT INTO totales(totales_depto, departamento) value('".$resultado1."', '".$departamento."')";
mysql_query($sql3,$conexion);

echo"<br>";

echo "<div id=\"top\" align=\"right\" >";
echo "<table border = '2' bordercolor=\"#0099FF\" width=350>";

echo "<tr>";
echo "<th bgcolor=\"#3ca4e6\" width=171 align=\"center\"><b>TOTAL DE DEPARTAMENTO</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\"><b>$ $resultado1 PESOS<b></td>";
echo "</tr>";

echo "</table> ";
echo "</div>";
//echo $resultado1;

} 
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>