<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_prueba = "localhost";
$database_prueba = "id11024143_saap";
$username_prueba = "id11024143_root";
$password_prueba = "12345";
$prueba = mysqli_connect($hostname_prueba, $username_prueba, $password_prueba) or trigger_error(mysql_error(),E_USER_ERROR); 
?>