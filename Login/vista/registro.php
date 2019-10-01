<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['nivel'])) {
  $colname_Recordset1 = $_GET['nivel'];
}
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
//mysql_select_db($database_prueba, $prueba);
//$query_Recordset1 = sprintf("SELECT * FROM nivel WHERE nivel = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($link, "SELECT nivel FROM nivel ");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<?php 
include("config.php");
include('class/userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
if (!empty($_POST['signupSubmit'])) 
{

	$username=$_POST['usernameReg'];
	$email=$_POST['emailReg'];
	$password=$_POST['passwordReg'];
    $name=$_POST['nameReg'];
	$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
    $level=$_POST['level'];
	if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
	{
    $uid=$userClass->userRegistration($username,$password,$email,$name,$level);
    if($uid)
    {
    
    	header("Location:/../Admin.php");
    }
    else
    {
      $errorMsgReg="Username or Email already exits.";
    }
    
	}


}

?>
<!DOCTYPE html>
<html>
<head>
<style>
.header {
  overflow: hidden;
  background-color: #999;
  padding: 20px 10px;
  font-family:Arial, Helvetica, sans-serif;
  opacity: 0.6;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}
.header p {
  float: right;
  font-family:Arial, Helvetica, sans-serif;
  size: 10px;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #999;
  opacity: 0.6;
  text-align: center;
  font-family:Arial, Helvetica, sans-serif;
}
#container{width: 800px}
#login,#signup{width: 300px; border: 1px solid #d6d7da; padding: 0px 15px 15px 15px; border-radius: 5px;font-family: arial; line-height: 16px;color: #333333; font-size: 14px; background: #ffffff;rgba(200,200,200,0.7) 0 4px 10px -1px}
#login{float:left;}
#signup{float:right;}
h3{color:#365D98}
form label{font-weight: bold;}
form label, form input, form select{display: block;margin-bottom: 5px;width: 90%; border: 3px;}
form input, form select{ border: 3px #666666;padding: 10px;border: solid 1px #BDC7D8; margin-bottom: 20px}
.button {
    background-color: #5fcf80 !important;
    border-color: #3ac162 !important;
    font-weight: bold;
    padding: 12px 15px;
    max-width: 100px;
    color: #ffffff;
}
.errorMsg{color: #cc0000;margin-bottom: 10px}
</style>
<body>
<div class="header">
  <a href="inicio.php" class="logo">SAAP</a>
</div>
<div id="container">
<div id="signup">
<h3>Creación de usuarios</h3>
<form method="post" action="" name="signup">
<label>Nombres y Apellidos</label>
<input type="text" name="nameReg" autocomplete="off" required/>
<label>Correo</label>
<input type="text" name="emailReg" autocomplete="off" required/>
<label>Nombre de usuario</label>
<input type="text" name="usernameReg" autocomplete="off" required/>
<label>Password</label>
<input type="password" name="passwordReg" autocomplete="off" required/>
<label>Nivel</label>
<select name="level" required>
<option value="">Seleccione rol</option>
  <?php
do {  
?>
  <option value="<?php echo $row_Recordset1['nivel']?>"><?php echo $row_Recordset1['nivel']?></option>
  <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysqli_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
?>
</select>
<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
<input type="submit" class="button" name="signupSubmit" value="Ingresar">
</form>
<a href="../registro usuarios.php">Volver</a>
</div>
</div>
<div class="footer">Software desarrollado por <strong>SAAP</strong>.</div>
</body>
</html>

