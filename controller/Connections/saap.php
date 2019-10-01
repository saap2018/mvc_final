<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_saap = "localhost";
$database_saap = "id11024143_saap";
$username_saap = "id11024143_root";
$password_saap = "12345";
$saap = mysql_pconnect($hostname_saap, $username_saap, $password_saap) or trigger_error(mysql_error(),E_USER_ERROR); 
?>