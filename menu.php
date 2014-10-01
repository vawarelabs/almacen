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
<td width=\"115\" align=\"right\"><p><a href=\"#\"><img src=\"images/headerlogo.png\" width=\"121\" height=\"92\"></a></p></td>
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
<br>
<br>
<br>
<br>

<table id=\"table\" width=\"1200\" align=\"center\" bgcolor=\"#0099FF\">

<h2 align=\"center\">ALMACEN GENERAL - MENU PRINCIPAL</h2>
<br>
<tr>

   <td align=\"center\" colspan=\"3\" bgcolor=\"#00CCFF\">
<h3><p>ELIJA UNA OPCION.</p> </h3> 
</td>
</tr>

<tr>
   <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\">
     <h3><a href=\"trabajador.php\" > <img src=\"images/trabajador.png\"> </a></h3>
     <p><b>TRABAJADOR</b></p>
   </td> 

   <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\" > 
      <h3><a href=\"herramientas.php\" ><img src=\"images/herramientas.png\"></a></h3> 
      <p><b>HERRAMIENTAS</b></p>
   </td> 

    <td align=\"center\" width=\"400\" bgcolor=\"#FFFFFF\"> 
     <h3><a href=\"salir.php\"><img src=\"images/sal.png\"></a></h3>
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
echo "<script>alert(\"FALTAN CAMPOS IMPORTANTES DE LLENAR\");</script>"; 
} 
?>