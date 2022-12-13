<?php

$database = new mysqli("localhost", "root", "", "cmgalenos");
if ($database->connect_error) {
    die("Connection failed:  " . $database->connect_error);
}

?>