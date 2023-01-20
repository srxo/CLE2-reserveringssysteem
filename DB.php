<?php

$user="root";
$password="";
$host= "localhost";
$dbname= "reserveringen";

$db = mysqli_connect($host, $user, $password, $dbname)
or die ('Error: '.mysqli_connect_error());
