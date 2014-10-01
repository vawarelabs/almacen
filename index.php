<html> 
<meta charset="utf-8">
<link rel="shortcut icon" href="/almacen/images/favicon.ico" />

<head>

<style type="text/css">


body{
    color:#666666;
font-family:”Lucida Grande”, “Lucida Sans Unicode”, Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
background:url(images/fondobg.jpg);
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
#campo{
	background:#FFF;
	border-color:#3CF;
	color: #757574;
	border-radius: 10px;
    box-shadow: 0px 2px 46px rgba(162, 234, 255, 1);
    -moz-box-shadow: 0px 2px 46px rgba(162, 234, 255, 1);
    -webkit-box-shadow: 0px 2px 46px rgba(162, 234, 255, 1);
	
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
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

<title>Almacen General</title> 
</head> 

<body> 

<br>
<br>


<header>
<table border="0" align="center">
<tr>
<td width="175" align="right"><p><a href="#"><img src="images/headerlogo.png" width="121" height="92"></a></p></td>
<td width="400"><p><h3>EXPORTADORA DE SAL, S.A DE C.V.</h3></p>
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
<br>

<p>

<form method="POST" action="validacion.php"> 
  
<div id="stylized" class="myform">
    <br>
    <fieldset id="campo">
<h2 align="center">ALMACEN GENERAL</h2>
</P>

    <label>USUARIO:</label>
    <input type="text" name="usuario">


    <label>CONTRASEÑA:</label>
    <input type="password" name="clave"> 
   

   <button type="submit" name="B1">Enviar</button> 
<div class="spacer"></div>
 </fieldset>
</form> 
</div>
 <br>
 <br>
 <br>
  <br>
   <br>
   <br>
   <br>
   <p align="center">
Desarrollado por del Departamento de Sistemas y Desarrollo de TI©
</p>
</body> 
</html>