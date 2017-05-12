<?php
$enlace =  mysql_connect('localhost','root','am212_pass');
if (!$enlace){ //en caso de no lograr establecer la conexion se quiebra el proceso...
    die('Conexion no establecida2');
}
//echo 'Conectado satisfactoriamente';
//Verificamos si nuestra base de datos existe.
$monitor=mysql_select_db("monitor_test") or die("base de datos no existe");
mysql_query ("SET NAMES 'utf8'");


?>