<?php 
$host="localhost";
$user="root";
$pass="";
$baseDatos="almacen";

@$conexion=mysql_connect($host,$user,$pass)or die("NO se pudo establecer la conexion ".mysql_error());


?>