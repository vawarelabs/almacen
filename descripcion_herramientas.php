<?php include ("conexion.php");?>
	<?php mysql_select_db($baseDatos);?>
	<?php 
		$sql="SELECT * FROM clave_herramientas WHERE clave_manual=".$_GET['id'];
		$res=mysql_query($sql);
	?>
<table border="0" width="395">
<tr><td align="center" width="105"><label>DESCRIPCION</label></td>
<?php while (@$fila=mysql_fetch_array($res)){ ?>
<td width="295" align="left"> <textarea name="descripcion"><?php echo $fila['descripcion_manual']?></textarea></td></tr>

<tr>
<td align="center" width="105"><label>PRECIO UNITARIO</label></td>
<td align="left" width="100"> <input name="precio_unitario" id="precio" value="<?php echo $fila['precio_unitario_manual']?>"/></td></tr>

<tr>
<td align="center" width="105"><label>CANTIDAD SOLICITADA</label></td>
<td align="left" width="100"> <input name="solicitud1" id="solicitud1"/>
</td></tr>

<tr>
<td align="center" width="105"><label>TOTAL DE HERRAMIENTA</label></td>
<td align="left" width="100"> <input name="total_herramienta" id="total_herramienta"/>
<input type="submit" name="multiplica" id="multiplica" onClick="multiplicacion()"/>
</td></tr>

<?php }?>


</table>