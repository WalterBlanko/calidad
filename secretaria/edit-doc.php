<?php



//import database
include("../connection.php");



if ($_POST) {
    //print_r($_POST);
    $result = $database->query("select * from roles");
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $oldemail = $_POST["oldemail"];
    $spec = $_POST['spec'];
    $email = $_POST['email'];
    $tele = $_POST['Tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id00'];

    if ($password == $cpassword) {
        $error = '3';
        $result = $database->query("select medico.docid from medico inner join roles on medico.docemail=roles.email where roles.email='$email';");
        //$resultqq= $database->query("select * from medico where docid='$id';");
        if ($result->num_rows == 1) {
            $id2 = $result->fetch_assoc()["docid"];
        } else {
            $id2 = $id;
        }

        echo $id2 . "jdfjdfdh";
        if ($id2 != $id) {
            $error = '1';
            //$resultqq1= $database->query("select * from medico where docemail='$email';");
            //$did= $resultqq1->fetch_assoc()["docid"];
            //if($resultqq1->num_rows==1){

        } else {

            //$sql1="insert into doctor(docemail,docpassword,docpnombre,especialidad) values('$email','$password','$spec');";
            $sql1 = "UPDATE medico SET docemail='$email',docpassword='$password',docpnombre`='$name',especialidad=$spec where docid=$id ;";
            $database->query($sql1);

            $sql1 = "update roles set email='$email' where email='$oldemail' ;";
            $database->query($sql1);
            //echo $sql1;
            //echo $sql2;
            $error = '4';
        }
    } else {
        $error = '2';
    }
} else {
    //header('location: signup.php');
    $error = '3';
}


header("location: doctors.php?action=edit&error=" . $error . "&id=" . $id);
?>



</body>

</html>