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

$conexion=mysql_connect("localhost","root","") or die("fallo conexion");
mysql_select_db("almacen",$conexion) or die("Problemas en la selección de la base de datos");

echo "<table border = '2' bordercolor=\"#0099FF\" width=600 align=\"center\">";
echo "<tr> ";
echo "<th bgcolor=\"#00CCFF\" width=359 align=\"center\"><b>DEPARTAMENTO</b></th>";
echo "<th bgcolor=\"#00CCFF\" width=240 align=\"center\"><b>TOTAL</b></th>";
echo "</tr>";
echo "</table>";

$registros=mysql_query("SELECT DISTINCT departamento, totales_depto FROM totales ORDER BY departamento ASC ",$conexion) or die("Problemas en el select:".mysql_error());

while ($row=mysql_fetch_array($registros))
{
 
echo "<table border = '2' bordercolor=\"#0099FF\" width=600 align=\"center\">";

echo "<tr>";
echo "<td bgcolor=\"#FFFFFF\" width=240 align=\"center\">".$row["departamento"]."</td> ";
echo "<td bgcolor=\"#FFFFFF\" width=160 align=\"center\">".$row["totales_depto"]."</td>" ;
echo "</tr>";

echo "</table>";
}

}
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>
