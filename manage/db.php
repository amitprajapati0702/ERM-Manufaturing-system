<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="priya";

    $con= new mysqli($servername,$username,$password,$database);
    if($con){
        // echo("database connected");
    }else{
        echo("not connected");
    }
?>