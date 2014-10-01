<?php session_start(); 
@$login_ok = $_SESSION["login_ok"]; 
if ($login_ok == "identificado") { 
 
echo "
<script> 
 function operacion()
 {
    if(document.form.ficha.value && document.form.nombre_trabajador.value && document.form.departamento.value && document.form.area.value && document.form.numero_departamento.value) 
	{
      document.forma.submit();   	
	} 
 
      else 
	    { 
		    alert(\"FALTAN CAMPOS IMPORTANTES DE LLENAR\");
		} 

 }
</script>
";

$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

$ficha= $_POST["ficha"];
$resultado=mysql_query("select * from  trabajador where ficha= '".$ficha."'") or die (mysql_error());
if (mysql_num_rows($resultado)==0)
{
  
echo"<script> alert('EL REGISTRO QUE DESEAS MODIFICAR NO SE ENCUENTRA');
document.location=('modificacion_trabajador.php');
</script>";

} 
else 
{
$resultado=mysql_query("select * from trabajador where ficha= '".$ficha."'") or die (mysql_error());
$row=mysql_fetch_assoc($resultado);
}

require("modificacion_trabajador2_requiere.php");

} 
else 
{ 
echo "Los datos de acceso no son correctos"; 
} 
?>