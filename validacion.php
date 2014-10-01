<?php session_start(); ?> 
<html>
<meta charset="utf-8">
<link rel="shortcut icon" href="/almacen/images/favicon.ico" /> 

<head> 
<title>Almacen General</title> 
</head> 

<body> 

<?php  
 
$usuario = $_POST['usuario']; 
$clave = $_POST['clave']; 

$usuario_valido = "elizam"; 
$clave_valida = "almacengral"; 

if ($usuario == $usuario_valido && $clave == $clave_valida)  
{  

$_SESSION["login_ok"] = "identificado"; 

echo "<script type=\"text/javascript\">     
window.location=\"menu.php\";   
</script> "; 

}  
else  
{  
echo "<script>alert(\"FALTAN CAMPOS IMPORTANTES DE LLENAR\");
              document.location=('index.php');  </script>";  
}  
?> 

</body> 
</html>