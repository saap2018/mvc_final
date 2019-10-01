<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery-1.11.1.min.js"></script>
     <script type="text/javascript" src="js/code.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
            body {
              padding-top: 40px;
              padding-bottom: 40px;
              background-color: rgb(235, 235, 235);
            }

            .form-signin {
              max-width: 330px;
              padding: 15px;
              margin: 0 auto;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
              margin-bottom: 10px;
            }
            .form-signin .checkbox {
              font-weight: normal;
            }
            .form-signin .form-control {
              position: relative;
              height: auto;
              -webkit-box-sizing: border-box;
                 -moz-box-sizing: border-box;
                      box-sizing: border-box;
              padding: 10px;
              font-size: 16px;
            }
            .form-signin .form-control:focus {
              z-index: 2;
            }
            .form-signin input[type="email"] {
              margin-bottom: -1px;
              border-bottom-right-radius: 0;
              border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
              margin-bottom: 10px;
              border-top-left-radius: 0;
              border-top-right-radius: 0;
            }
    </style>
</head>
<body>
    <div class="container">
        <form class="form-signin form-login" role="form" method="post" action="validar.php">
            <h2 class="form-signin-heading">ingrese los datos</h2>
            <input type="email" name="usuario" class="form-control" placeholder="usuario" required autofocus>
            <input type="password" name="pass" class="form-control" placeholder="contraseña" required>
            <button id="enviar" type="submit" class="btn btn-lg btn-primary btn-block">ingresar</button>
        </form>
    </div>
    <div class="container" id="resultado">
        
    </div>
</body>
</html>