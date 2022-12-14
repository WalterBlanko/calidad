<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Acceder</title>
    
</head>

<body>
    <?php

    session_start();

    $_SESSION["user"] = "";
    $_SESSION["usertype"] = "";

    // Set the new timezone
    date_default_timezone_set('Chile/Continental');
    $date = date('Y-m-d');

    $_SESSION["date"] = $date;


    //import database
    include("connection.php");

    if ($_POST) {

        $email = $_POST['useremail'];
        $password = $_POST['userpassword'];

        $error = '<label for="promter" class="form-label"></label>';

        $result = $database->query("SELECT * FROM roles WHERE email='$email'");

        if ($result->num_rows == 1) {
            $utype = $result->fetch_assoc()['rol'];
            if ($utype == 'p') {
                $checker = $database->query("select * from paciente where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows == 1) {

                    //   Paciente dashbord
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'p';

                    header('location: paciente/index.php');
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: correo electrónico o contraseña no válidos</label>';
                }
                
                

            } elseif ($utype == 's') {
                $checker = $database->query("select * from secretaria where semail='$email' and spassword='$password'");

				//   Secretaria dashbord
                if ($checker->num_rows == 1) {

					
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 's';

                    header('location: secretaria/index.php');
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: correo electrónico o contraseña no válidos</label>';
                }
                
                
            } elseif ($utype == 'a') {
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                
				//   Admin dashbord
				if ($checker->num_rows == 1) {
                    
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'a';

                    header('location: admin/index.php');
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: correo electrónico o contraseña no válidos</label>';
                }

            } 
            
            elseif ($utype == 'd') {
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");

				//   Doctor dashbord
                if ($checker->num_rows == 1) {

                    
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'd';
                    header('location: doctor/index.php');
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: correo electrónico o contraseña no válidos</label>';
                }
            }
        } else {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">No podemos encontrar ninguna cuenta para este correo electrónico</label>';
        }
    } else {
        $error = '<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>

    <div class="box">
		<form action="" method="POST">
			<h2 class="title">Bienvenido!</h2>
			<div class="inputBox">
				<input type="email" name="useremail" required="required">
				<span>Correo</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="Password" name="userpassword" required="required">
				<span>Contraseña</span>
				<i></i>
			</div>
			<div class="links">
				<a href="#" >Has olvidado tu contraseña ?</a>
				<a href="signup.php">Registrarse</a>
			</div>
			<div>
				<?php echo $error ?>
			</div>
            <input type="submit" value="Acceder" class="login-btn">
		</form>
	</div>

</body>
</html>