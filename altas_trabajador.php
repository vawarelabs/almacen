<?php session_start(); 
@$login_ok = $_SESSION["login_ok"]; 
if ($login_ok == "identificado") { 

echo "
<script> 
 function operacion()
 {
    if(document.form.ficha.value && document.form.nombre_trabajador.value && document.form.departamento.value && document.form.area.value && document.form.numero_departamento.value) 
	{
      document.form.submit(); 
	  return true;
	   	
	} 
 
      else 
	    { 
		    alert(\"FALTAN CAMPOS IMPORTANTES DE LLENAR\");
			 return false;
		} 

 }
</script>

<style type=\"text/css\">
body{
background:url(images/fondobg.jpg);
}
#campo{
	background:#FFF;
	border-color:#3CF;
	color: #757574;
	border-radius: 10px;
    box-shadow: 0px 2px 46px rgba(162, 234, 255, 1);
    -moz-box-shadow: 0px 2px 46px rgba(162, 234, 255, 1);
    -webkit-box-shadow: 0px 2px 46px rgba(162, 234, 255, 1);
	
}
</style>

<html>
<meta charset=\"utf-8\">
<link rel=\"shortcut icon\" href=\"/almacen/images/favicon.ico\" />

<head> 
<title>Almacen General</title> 
<style type=\"text/css\">
p{font-family:Helvetica, serif}
h2{font-family:Helvetica, serif}
</style>

<style type=\"text/css\">
body{
font-family:”Lucida Grande”, “Lucida Sans Unicode”, Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ———– My Form ———– */
.myform{
margin:0 auto;
width:400px;
padding:14px;
}

/* ———– stylized ———– */

#stylized h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}

#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}
#stylized button{
clear:both;
margin-left:150px;
width:125px;
height:31px;
background:#666666 url(img/button.png) no-repeat;
text-align:center;
line-height:31px;
color:#FFFFFF;
font-size:11px;
font-weight:bold;
}
</style>

</head>

<body>

<header>
<table border=\"0\" align=\"center\">
<tr>
<td width=\"120\" align=\"right\"><p><a href=\"trabajador.php\"><img src=\"images/headerlogo.png\" width=\"121\" height=\"92\"></a></p></td>
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

<form action=\"altas_trabajador2.php\" id=\"form\" name=\"form\" method=\"post\" onsubmit=\"return false;\" >

<div id=\"stylized\" class=\"myform\">
<fieldset id=\"campo\">
<p>
<h3 align=\"center\">LLENE LOS CAMPOS CORRESPOANDIENTES</h3>
</p>
<br>
<br>
<p>
  <label>FICHA</label>
  <input type=\"text\" name=\"ficha\" id=\"ficha\"/>
</p>


<p>
  <label>NOMBRE DEL TRABAJADOR</label>
  <input type=\"text\" name=\"nombre_trabajador\" id=\"nombre_trabajador\"/>
</p>

<p>
  <label>DEPARTAMENTO</label>
  <input type=\"text\" name=\"departamento\" id=\"departamento\"/>
</p>

<p>
  <label>AREA</label>
  <input type=\"text\" name=\"area\" id=\"area\"/>
</p>

<p>
  <label>NUMERO DE DEPARTAMENTO</label>
  <input type=\"text\" name=\"numero_departamento\" id=\"numero_departamento\"/>
</p>

<button type=\"submit\" onClick=\"operacion()\">ENVIAR</button>
<div class=\"spacer\"></div>
 </fieldset>
</form> 


</body>
</html>
";
} 
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>