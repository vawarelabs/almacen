<?php  
@$conexion = mysql_connect("localhost", "root", "") or die ("fallo conexion");
mysql_select_db("almacen", $conexion);

@$ficha = $_POST["ficha"];
@$fichab = $_POST["ficha"];
@$nombre_trabajador = $_POST["nombre_trabajador"];
@$departamento = $_POST["departamento"];
@$area = $_POST["area"];
@$numero_departamento= $_POST["numero_departamento"];
@$referencia_sap = $_POST["referencia_sap"];
@$fecha = $_POST["thedate"];

@$clave1 = $_POST["clave1"];
@$fecha_antigua2 = $_POST["thedate2"];
@$solicitud1 = $_POST["solicitud1"];
@$descripcion1 = $_POST["descripcion"];
@$marca = $_POST["marca"];
@$precio_unitario = $_POST["precio_unitario"];
@$total_herramienta = $_POST["total_herramienta"];
@$comentarios1 = $_POST["comentarios1"];
@$opcion = $_POST["opcion"];
@$opcionvalida ="si";
@$opcioninvalida ="no";

if($opcion==$opcioninvalida)
  {
       echo"<script>alert('EL REGISTRO NO A QUEDADO ALMACENADO');
       document.location=('altas_reporte1.php');
       </script>";
  }

elseif($opcion==$opcionvalida) 
       { 

@$sql="insert into reporte(ficha, nombre_trabajador, departamento, area, numero_departamento, fecha, referencia_sap, clave1, fecha_antigua2, solicitud1, descripcion1, marca, precio_unitario, total_herramienta, comentarios1) 
value('".$ficha."', '".$nombre_trabajador."', '".$departamento."', '".$area."', '".$numero_departamento."', '".$fecha."','".$referencia_sap."', '".$clave1."', '".$fecha_antigua2."', '".$solicitud1."', '".$descripcion1."', '".$marca."', '".$precio_unitario."', '".$total_herramienta."', '".$comentarios1."')";
@$res=mysql_query($sql,$conexion) or die (mysql_error());
       	  
        $resultado=mysql_query("select * from  trabajador where ficha= '".$fichab."' ") or die (mysql_error());

          if (mysql_num_rows($resultado)==0)
           {	
             echo"<script> alert('LA FICHA NO EXISTE');
             document.location=('altas_reporte1.php');
             </script>";
           } 
          else 
           {
            
           	 echo"<script>alert('EL REGISTRO A QUEDADO ALMACENADO');</script>";

           $resultado=mysql_query("select * from trabajador where ficha= '".$ficha."' ") or die (mysql_error());
           $row=mysql_fetch_assoc($resultado);
           
           } 

           require("form_altas_reporte2.html");
        }            
?>