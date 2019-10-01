<?php
class userClass
{
	 /* User Login */
     public function userLogin($usernameEmail,$password)
     {

          $db = getDB();
          $hash_password= hash('sha256', $password);
          $stmt = $db->prepare("SELECT uid FROM usuarios WHERE  (username=:usernameEmail or email=:usernameEmail) AND  password=:hash_password");  
          $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
          $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
          $stmt->execute();
          $count=$stmt->rowCount();
          $data=$stmt->fetch(PDO::FETCH_OBJ);
          $db = null;
          if($count)
          {
                $_SESSION['uid']=$data->uid;
                return true;
          }
          else
          {
               return false;
          }    
     }

     /* User Registration */
     public function userRegistration($username,$password,$email,$name,$level)
     {
          try{
          $db = getDB();
          $st = $db->prepare("SELECT id FROM usuarios WHERE username=:username OR email=:email");  
          $st->bindParam("usuario", $username,PDO::PARAM_STR);
          $st->bindParam("correo", $email,PDO::PARAM_STR);
          $st->execute();
          $count=$st->rowCount();
          if($count<1)
          {
          $stmt = $db->prepare("INSERT INTO usuarios(usuario,contrasena,correo,nombre,privilegio) VALUES (:username,:hash_password,:email,:name,:level)");
          $stmt->bindParam("usuario", $username,PDO::PARAM_STR) ;
          $hash_password= hash('sha256', $password);
          $stmt->bindParam("contrasena", $hash_password,PDO::PARAM_STR) ;
          $stmt->bindParam("correo", $email,PDO::PARAM_STR) ;
          $stmt->bindParam("nombre", $name,PDO::PARAM_STR) ;
		  $stmt->bindParam("privilegio", $level) ;
          $stmt->execute();
          $uid=$db->lastInsertId();
          $db = null;
          $_SESSION['id']=$uid;
          return true;

          }
          else
          {
          $db = null;
          return false;
          }
          
         
          } 
          catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
     }
     
     /* User Details */
     public function userDetails($uid)
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT email,username,name FROM usuarios WHERE uid=:uid");  
          $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }


}
?>