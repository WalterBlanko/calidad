<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='s'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $database->query("select * from medico where docid=$id;");
        $email=($result001->fetch_assoc())["docemail"];
        $sql= $database->query("delete from roles where email='$email';");
        $sql= $database->query("delete from medico where docemail='$email';");
        //print_r($email);
        header("location: doctors.php");
    }


?>