<?php session_start(); 
@$login_ok = $_SESSION["login_ok"]; 
if ($login_ok == "identificado") { 

echo "
<script>

 function enviar()
 {
     	  
     	
     	document.principal.submit();   
 }
 
  function ficha1()
 {
	 document.principal.ficha.disabled=false;	
	 document.principal.departamento.disabled=true;
	 document.principal.fecha1.disabled=true;	
	 document.principal.fecha2.disabled=true;

 }

  function departamento1()
 {
   document.principal.ficha.disabled=true;	
	 document.principal.departamento.disabled=false;
	 document.principal.fecha1.disabled=true;	
	 document.principal.fecha2.disabled=true;
 }

   function fechas()
 {
	 document.principal.ficha.disabled=true;	
	 document.principal.departamento.disabled=true;
	 document.principal.thedate.disabled=false;	
	 document.principal.thedate2.disabled=false;
 }	

 function general()
 {
	 document.principal.ficha.disabled=true;	
	 document.principal.departamento.disabled=true;
	 document.principal.fecha1.disabled=true;	
	 document.principal.fecha2.disabled=true;
 }	
 
</script> 

<link type=\"text/css\" rel=\"stylesheet\" href=\"/almacen/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112\" media=\"screen\"></LINK>
<SCRIPT type=\"text/javascript\" src=\"/almacen/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118\"></script> 

<html>
<meta charset=\"utf-8\">
<link rel=\"shortcut icon\" href=\"/almacen/images/favicon.ico\" />

<head>
<style type=\"text/css\">
p{font-family:Helvetica, serif}
h2, h3{font-family:Helvetica, serif}
body{
background:url(images/fondobg.jpg);
}
</style>
<title>Almacen General</title>
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

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<form id=\"principal\" name=\"principal\" method=\"post\" action=\"exportar.php\" onsubmit=\"return false\"> 
<p>

<br>
<br>
<table border=\"0\" align=\"center\"  bgcolor=\"#0099FF\">
  
  <tr >
     <td bgcolor=\"#afd5f4\" colspan=\"2\"   align=\"center\"><b> ELIGE EL TIPO DE EXPORTACION </b></td> 
     
  </tr>	
  
 	
  
   <tr> 
     <td bgcolor=\"#FFFFFF\" colspan=\"2\" align=\"left\"> <input type=\"radio\" name=\"opcion\" id=\"opcion1\" value=\"\" onClick=\"general()\" checked=\"checked\">GENERAL </td>
  </tr>	 
  
  
  <tr>
     <td bgcolor=\"#FFFFFF\"> <input type=\"radio\" name=\"opcion\" id=\"opcion2\" value=\"\" onClick=\"ficha1()\">POR NUMERO DE FICHA </td> 
     <td bgcolor=\"#FFFFFF\"> <input type=\"text\" name=\"ficha\" id=\"ficha\" value=\"\" disabled=\"disabled\"> </td> 
  </tr>	
  
  
  <tr>
      <td bgcolor=\"#FFFFFF\"> <input type=\"radio\" name=\"opcion\" id=\"opcion3\" value=\"\" onClick=\"departamento1()\">NOMBRE DEL DEPARTAMENTO </td> 
      <td bgcolor=\"#FFFFFF\"> <input type=\"text\" name=\"departamento\" id=\"departamento\" value=\"\" disabled=\"disabled\"> </td> 
  </tr>	
  
  
  
   <tr>
   
      <td bgcolor=\"#FFFFFF\"> <input type=\"radio\" name=\"opcion\" id=\"opcion4\" value=\"\" onClick=\"fechas()\">POR RANGO DE FECHAS </td>
  
      <td bgcolor=\"#FFFFFF\"> <input type=\"text\"  readonly=\"readonly\" name=\"thedate\" value=\"\" disabled=\"disabled\"/>
           <input name=\"fecha\" type=\"button\" value=\"...\" onclick=\"displayCalendar(document.forms[0].thedate,'yyyy/mm/dd',this)\"/> 
                                      
									  <label>AL</label>

       <input type=\"text\"  readonly=\"readonly\" name=\"thedate2\" value=\"\" disabled=\"disabled\"/>
           <input name=\"fecha2\" type=\"button\" value=\"...\" onclick=\"displayCalendar(document.forms[0].thedate2,'yyyy/mm/dd',this)\"/> </td> 
     
   </tr>
   
	


  <tr>
       <td bgcolor=\"#FFFFFF\" colspan=\"2\" align=\"center\"> <button type=\"submit\" onClick=\"enviar()\"> ENVIAR </button> 
        <button onclick=\"javascript:location.reload()\">Limpiar Campos</button> </td>
  
   </tr>
  
  </table>
</p>

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