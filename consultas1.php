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
h2, h3{font-family:Helvetica, serif}
body{
background:url(images/fondobg.jpg);
}
</style>

</head>
  
<body>

<header>
<table border=\"0\" align=\"center\">
<tr>
<td width=\"115\" align=\"right\"><p><a href=\"herramientas.php\"><img src=\"images/headerlogo.png\" width=\"121\" height=\"92\"></a></p></td>
<td width=\"350\"><p><h3>EXPORTADORA DE SAL, S.A DE C.V.</h3></p>
<p>GUERRERO NEGRO, BAJA CALIFORNIA SUR</p>
</td>
</tr>
</table>
</header>
<br>
<br>
<br>
<br>
<table border = '2' bordercolor=\"#0099FF\" width=1200 align=\"center\">


<h3 align=\"center\">ALMACEN GENERAL - SECCION </h3>
<br>
<tr>

<td align=\"center\" colspan=\"3\" bgcolor=\"#00CCFF\">
<h3><p>ELIJA UNA OPCION.</p> </h3>
<p></p> 
</td>
</tr>


<tr>
   <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\">
     <h3><a href=\"consulta_gral.php\"><img src=\"images/general.png\"> </a></h3>
     <p><b>GENERAL</b></p>
   </td> 

   <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\" > 
      <h3><a href=\"consulta_depto.php\"><img src=\"images/departamento.png\"></a></h3> 
      <p><b>POR DEPARTAMENTO</b></p>
   </td> 

    <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\"> 
    <h3><a href=\"consulta_ficha.php\"><img src=\"images/altas_herramientas_db.png\"></a></h3>
    <p><b>POR FICHA DE TRABAJADOR</b></p>
   </td>  

</tr>

<tr>
   <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\">
     <h3><a href=\"consulta_fecha.php\"><img src=\"images/calendario.png\"> </a></h3>
     <p><b>POR RANGOS DE FECHAS</b></p>
   </td> 

   <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\" > 
      <h3><a href=\"exportar_excel.php\"><img src=\"images/excel.png\"></a></h3> 
      <p><b>EXPORTAR A EXCEL</b></p>
   </td> 

    <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\"> 
    <h3><a href=\"herramientas.php\"><img src=\"images/sal.png\"></a></h3>
    <p><b>SALIR</b></p>
   </td>  

</tr>

</table> 

</body>
</html>
";
} 
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>