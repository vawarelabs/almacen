<?php session_start(); 
@$login_ok = $_SESSION["login_ok"]; 
if ($login_ok == "identificado") { 
 
$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$ficha= $_POST["ficha"];
$resultado=mysql_query("select * from  trabajador where ficha= '".$ficha."'") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{	
echo"<script> alert('LA FICHA NO EXISTE');
document.location=('altas_reporte1.php');
</script>";
} 
else 
{
$resultado=mysql_query("select * from trabajador where ficha= '".$ficha."'") or die (mysql_error());
$row=mysql_fetch_assoc($resultado);
}

require("form_altas_reporte2.html");

} 
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>