<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Crear cuenta</title>
    <style>
        .container {
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>
    <?php

    session_start();

    $_SESSION["user"] = "";
    $_SESSION["usertype"] = "";
    
    date_default_timezone_set('Chile/Continental');
    $date = date('Y-m-d');

    $_SESSION["date"] = $date;

    include("connection.php");

    if ($_POST) {

        $result = $database->query("select * from roles");

        $fname = $_SESSION['personal']['fname'];
        $lname = $_SESSION['personal']['lname'];
        $name = $fname . " " . $lname;
        $address = $_SESSION['personal']['address'];
        $nic = $_SESSION['personal']['nic'];
        $dob = $_SESSION['personal']['dob'];
        $email = $_POST['newemail'];
        $tele = $_POST['tele'];
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];

        if ($newpassword == $cpassword) {
            $result = $database->query("select * from roles where email='$email';");
            if ($result->num_rows == 1) {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
            } else {

                $database->query("insert into paciente (pemail,pnombre,ppassword, pdireccion, prut, pfnac, pcelular) values('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
                $database->query("insert into roles (email, rol) values('$email','p')");

                $_SESSION["user"] = $email;
                $_SESSION["usertype"] = "p";
                $_SESSION["username"] = $fname;

                header('Location: paciente/index.php');
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
            }
        } else {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">¡Error de confirmación de contraseña! Confirmar contraseña</label>';
        }
    } else {
        //header('location: signup.php');
        $error = '<label for="promter" class="form-label"></label>';
    }

    ?>

    <div class="box2">
		<form action="" method="POST">
			<h2 class="title">Empecemos!</h2>
            <h2 class="title">Está bien, crear cuenta de usuario.</h2>

			<div class="inputBox">
				<input type="email" name="newemail" required="required">
				<span>Correo</span>
				<i></i>
			</div>

			<div class="inputBox">
				<input type="tel" name="tele" required="required">
				<span>Celular</span>
				<i></i>
			</div>

            <div class="inputBox">
				<input type="password" name="newpassword" required="required">
				<span>Crear Nueva Contraseña:</span>
				<i></i>
			</div>

            <div class="inputBox">
				<input type="password" name="cpassword" required="required">
				<span>Confirmar Contraseña:</span>
				<i></i>
			</div>

			<div class="links">
				<a href="">Ya tienes una cuenta ?</a>
				<a href="login.php">Iniciar Sesion</a>
			</div>

			<div>
				<?php echo $error ?>
			</div>

			<input type="submit" value="Sign Up" class="login-btn">
		</form>
	</div>
    
</body>
</html>