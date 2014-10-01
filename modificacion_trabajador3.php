<?php 
$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$ficha2= $_POST["ficha"];
$idficha=$_POST["idficha"];
$nombre_trabajador= $_POST["nombre_trabajador"];
$departamento= $_POST["departamento"];
$area= $_POST["area"];
$numero_departamento= $_POST["numero_departamento"];

$sql=mysql_query("SELECT * FROM trabajador WHERE id_ficha='".$idficha."' ");
$res=mysql_fetch_array($sql);

mysql_query("UPDATE trabajador SET ficha= '$ficha2', nombre_trabajador = '$nombre_trabajador', 
	departamento = '$departamento', area = '$area', numero_departamento = '$numero_departamento' 
	WHERE id_ficha= '$idficha'") or die ("ERROR AL MODIFICAR"); 
echo "<script>alert('EL REGISTRO SE A MODIFICADO');
document.location=('modificacion_trabajador.php');
</script>";  

?>


