<?php


#host

$host="localhost";

$dbname="auth-sys";

$user="root";

$pass="";

$conn= new PDO("mysql:host=$host; dbname=$dbname;", $user, $pass);

if($conn == true){

    // echo"Its Working Fine";
}else{
   
    echo"Connection is Wrong : err ";

}



?>