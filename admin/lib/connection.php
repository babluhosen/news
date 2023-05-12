<?php

$host="localhost";
$user="root";
$Password="";
$database="news";
$conn= new mysqli($host, $user, $Password, $database);
if($conn-> connect_error){
    die($conn-> error);
}
else{
//echo "database sucess";
}
?>