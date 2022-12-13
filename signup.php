<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registrarse</title>
    
</head>
<body><?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();

    $_SESSION["user"] = "";
    $_SESSION["usertype"] = "";

    // Set the new timezone
    date_default_timezone_set('Chile/Continental');
    $date = date('Y-m-d');

    $_SESSION["date"] = $date;



    if ($_POST) {


        $_SESSION["personal"] = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'address' => $_POST['address'],
            'nic' => $_POST['nic'],
            'dob' => $_POST['dob']
        );


        print_r($_SESSION["personal"]);
        header("location: create.php");
    }

    ?>

    <div class="box3">
		<form action="" method="POST">
			<h2 class="title">Ingresa tus datos</h2>
			<div class="inputBox">
				<input type="text" name="fname" required="required">
				<span>Nombre</span>
				<i></i>
			</div>

			<div class="inputBox">
				<input type="text" name="lname" required="required">
				<span>Apellido</span>
				<i></i>
			</div>

            <div class="inputBox">
				<input type="text" name="address" required="required">
				<span>Dirección</span>
				<i></i>
			</div>

            <div class="inputBox">
				<input type="text" name="nic" required="required">
				<span>Documento de Identificación</span>
				<i></i>
			</div>

            <div class="inputBox">
                <input type="date" name="dob" class="input-text" required>
				<i></i>
			</div>

			<div class="links">
				<a href="">Ya tienes cuenta ?</a>
				<a href="login.php">Iniciar Sesion</a>
			</div>

			<input type="submit" value="Siguiente" class="login-btn">
		</form>
	</div>

    
    
</body>
</html>