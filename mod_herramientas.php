<?php session_start(); 
@$login_ok = $_SESSION["login_ok"]; 
if ($login_ok == "identificado") 
{ 
 
$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$idficha= $_GET["idficha"]; 

$idficha=base64_decode($idficha);

$resultado=mysql_query("select * from  reporte where id_ficha= '".$idficha."'") or die (mysql_error());

if (mysql_num_rows($resultado)==0)
{	
  echo"<script> alert('LA FICHA NO EXISTE');
  document.location=('consultas1.php');
  </script>";
} 
else 
{
  $resultado=mysql_query("select * from  reporte where id_ficha= '".$idficha."'") or die (mysql_error());
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

<form id="principal" name="principal" method="post" action="mod_herramientas2.php"   onSubmit="return false">
<div id="stylized" class="myform">
<fieldset id="campo">
<table border="0" align="center">
<tr>

<th align="center" colspan="2">
<h3><p>LLENE LOS CAMPOS CORRESPONDIENTES</p> </h3>
<p></p> 
</th>
</tr>

<input type="text" name="idficha" id="idficha" hidden="true"  value="<?php echo $row['id_ficha'];?>"  />

<tr>
<p>
  <tr><td align="right"><label>FICHA DEL TRABAJADOR</label></td>
  <td><input type="text" name="ficha" id="ficha" value="<?php echo $row['ficha'];?>" readonly/></td></tr>
</p>
</tr>

<tr>
<p>
  <tr><td align="right"><label>NOMBRE DEL TRABAJADOR</label></td>
  <td><input type="text" name="nombre_trabajador" id="nombre_trabajador" value="<?php echo $row['nombre_trabajador'];?>" readonly/></td></tr>
</p>
</tr>

<tr>
<p>
  <tr><td align="right"><label>DEPARTAMENTO</label></td>
  <td><input type="text" name="departamento" id="departamento" value="<?php echo $row['departamento'];?>" readonly/></td></tr>
</p>
</tr>

<tr>
<p>
  <tr><td align="right"><label>AREA</label></td>
  <td><input type="text" name="departamento" id="departamento" value="<?php echo $row['area'];?>" readonly/></td></tr>
</p>
</tr>

<tr>
<p>
  <tr><td align="right"><label>NUMERO DE DEPARTAMENTO</label></td>
  <td><input type="text" name="numero_departamento" id="numero_departamento" value="<?php echo $row['numero_departamento'];?>" readonly/></td></tr>
</p>
</tr>

<tr>
<p>
  <tr><td align="right"><label>REFERENCIA SAP</label></td>
  <td><input type="text" name="referencia_sap" id="referencia_sap" value="<?php echo $row['referencia_sap'];?>"/></td></tr>
</p>
</tr>

<tr>
<p>
<tr><td><label>FECHA ACTUAL</label></td>
 <td><input type="text"  readonly="readonly" name="thedate" value="<?php echo $row['fecha'];?>"/>
  <input type="submit" name="fecha1" value="..." onClick="displayCalendar(document.forms[0].thedate,'yyyy/mm/dd',this)"/></td></tr>
</p>
</tr>

<p>&nbsp;</p>
<p></p>

<script type="text/javascript">
function buscar1() {

document.getElementById('clave1').value=document.getElementById('buscar').value;  
}

</script>

<tr>
<p>
<tr><td><label>BUSCADOR</label></td>
 <td><input type="text" name="buscar" id="buscar"/>
 <input type="submit" name="boton" onClick="buscar1()" value="BUSCAR"/></td></tr>
</p>
</tr>

<?php 
        $sql="select * from clave_herramientas order by clave_manual asc";
        $res=mysql_query($sql);
?>

            <td align="right"> <label> CLAVE </label> </td>
            <td align="left"><select name="clave1" id="clave1" onClick="from(document.principal.clave1.value,'midiv','descripcion_herramientas.php')">
                <option value="<?php echo $row['clave1'];?>"><?php echo $row['clave1'];?></option>
                <option value="">NO SELECCIONO NINGUN VALOR</option>
                <?php while ($fila=mysql_fetch_array($res)){ ?>
                    <option value="<?php echo $fila['clave_manual']?>"><?php echo $fila['clave_manual']?></option>
                <?php }?>
                            
            </select>   
       
         </td>
        </tr>
       
       <tr>
        <td colspan="2" align="left">
        
        <div id="midiv">
            <SCRIPT TYPE="text/javascript">

function multiplicacion(){


a=document.getElementById('solicitud1').value;
b=document.getElementById('precio').value; 

r=a*b;

document.getElementById('total_herramienta').value=r;

}

</SCRIPT>

           <label>DESCRIPCION</label>
        <textarea name="descripcion"><?php echo $row['descripcion1'];?></textarea> 
        

        
  <label>PRECIO UNITARIO</label>
  <input type="text" name="precio_unitario" id="precio" value="<?php echo $row['precio_unitario'];?>"/>


 <label>CANTIDAD SOLICITADA</label>
  <input type="text" name="solicitud1" id="solicitud1" value="<?php echo $row['solicitud1'];?>"/>
  <br>
  <br>
  <input type="submit" name="multiplica" id="multiplica" onClick="multiplicacion()"/>

   <label>TOTAL DE HERRAMIENTA</label>
  <input type="text" name="total_herramienta" id="total_herramienta" value="<?php echo $row['total_herramienta'];?>"/>
 
   </div>
        </td>
        </tr> 

        <tr>
       
           <tr><td><label>MARCA</label></td>
    <td><input type="text" name="marca" id="marca" value="<?php echo $row['marca'];?>"/></td>
    </tr>



  
 <tr>
 <p>
    <tr><td><label>FECHA DE DEVOLUCION</label></td>
    <td><input type="text"  readonly="readonly" name="thedate2" value="<?php echo $row['fecha_antigua2'];?>"/>
        <input type="submit" name="fecha2" value="..." onClick="displayCalendar(document.forms[0].thedate2,'yyyy/mm/dd',this)"/></td></tr>
  </p>
</tr>
  <p>
    <tr><td><label>OBSERVACIONES</label></td>
    <td><textarea rows="1" name="comentarios1" cols="30" wrap="virtual"><?php echo $row['comentarios1'];?></textarea></td>
    </tr>
  </p>
<p><br>
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