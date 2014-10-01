<?php session_start(); 
@$login_ok = $_SESSION["login_ok"]; 
if ($login_ok == "identificado") { 

echo "
<style type=\"text/css\">
body{
background:url(images/fondobg.jpg);
}
</style>

<html>
<meta charset=\"utf-8\">
<link rel=\"shortcut icon\" href=\"/almacen/images/favicon.ico\" />

<head> 
<title>Almacen General</title> 
<style type=\"text/css\">
p{font-family:Helvetica, serif}
h2, h3{font-family:Helvetica, serif}
</style>
</head>
  
<body>

<header>
<table border=\"0\" align=\"center\">
<tr>
<td width=\"150\" align=\"right\"><p><a href=\"menu.php\"><img src=\"images/headerlogo.png\" width=\"121\" height=\"92\"></a></p></td>
<td width=\"400\"><p><h3>EXPORTADORA DE SAL, S.A. DE C.V.</h3></p>
<p>GUERRERO NEGRO, BAJA CALIFORNIA SUR</p>

</td>
</tr>
</table>
</header>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width=\"800\" border=\"0.5\" align=\"center\" bgcolor=\"#0099FF\">


<h2 align=\"center\">ALMACEN GENERAL - SECCION TRABAJADOR</h2>
<br>
<tr>

   <td align=\"center\" colspan=\"2\" bgcolor=\"#00CCFF\">
<h3><p>ELIJA UNA OPCION.</p> </h3>
<p></p> 
   </td>
</tr>


<tr>
   <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\">
     <h3><a href=\"altas_trabajador.php\" > <img src=\"images/altas_trabajador.png\"> </a></h3>
     <p><b>ALTAS TRABAJADOR</b></p>
   </td> 

   <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\" > 
      <h3><a href=\"modificacion_trabajador.php\" ><img src=\"images/modificacion_trabajador.png\"></a></h3>
      <p><b>MODIFICACION DE TRABAJADOR</b></p> 
   </td> 

 </tr>
  
  
  
</body>
</html>
";
} 
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>