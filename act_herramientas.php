<?php session_start(); 
@$login_ok = $_SESSION["login_ok"]; 
if ($login_ok == "identificado") 
{ 
 
$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$idclave= $_GET["idclave"]; 

$idclave=base64_decode($idclave);

$resultado=mysql_query("select * from  clave_herramientas where idclave_manual= '".$idclave."'") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{	
  echo"<script> alert('LA FICHA NO EXISTE');
  document.location=('consultas1.php');
  </script>";
} 
else 
{
  $resultado=mysql_query("select * from  clave_herramientas where idclave_manual= '".$idclave."'") or die (mysql_error());
  $row=mysql_fetch_assoc($resultado);
}

} 

else 
{ 
   echo "Los datos de acceso no son correctos"; 
} 
?>



<script> 

 function operacion()
 {
    
      document.principal.submit();
      return true;
   
 
 }
</script>

<html>
<meta charset="utf-8">
<link rel="shortcut icon" href="/almacen/images/favicon.ico" />

<script type="text/javascript" language="javascript"  src="/almacen/js/ajax.js"></script>     
<link type="text/css" rel="stylesheet" href="/almacen/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="/almacen/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script> 
<style type="text/css">
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

<head> 
<title>Almacen General</title> 
<style type="text/css">
p{font-family:Helvetica, serif}
h3,h2{font-family:Helvetica, serif}
</style>

<style type="text/css">
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
font-size:11px;
}

#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;

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
<table border="0" align="center">
<tr>
<td width="115" align="right"><p><a href="herramientas.php"><img src="images/headerlogo.png" width="121" height="92"></a></p></td>
<td width="350"><p><h3>EXPORTADORA DE SAL, S.A DE C.V.</h3></p>
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
<form id="principal" name="principal" method="post" action="mod_clave_herramienta.php"   onSubmit="return false">
<div id="stylized" class="myform">
<fieldset id="campo">
<table border="0" align="center">
<tr>

<th align="center" colspan="2">
<h3><p>LLENE LOS CAMPOS CORRESPONDIENTES</p> </h3>
<p></p> 
</th>
</tr>

<input type="text" name="idclave_manual" id="idclave_manual" hidden="true"  value="<?php echo $row['idclave_manual'];?>"  />
<tr><td width="174" align="right"><label>Clave</label></td>

  <td width="198"><input type="text" name="idclave" id="idclave" value="<?php echo $row['clave_manual'];?>" /></td></tr>
</p>
</tr>
<tr>
  <td align="right"><label>Descripcion</label></td>
  <td><textarea name="descripcion" id="descripcion" value="<?php echo $row['descripcion_manual'];?>"><?php echo $row['descripcion_manual'];?></textarea></td></tr>
</p>
</tr>
<tr><td align="right"><label>Precio Unitario</label></td>
  <td><input type="text" name="precio_unitario" id="precio_unitario" value="<?php echo $row['precio_unitario_manual'];?>" /></td></tr>
</p>
</tr>
</p>



 <tr> <th align="center" colspan="2">
 <button type="submit" onClick="operacion()">ENVIAR</button>
</th>
</tr>
  
</table>

<div class="spacer"></div>
 </fieldset>
</form>

</body>
</html>