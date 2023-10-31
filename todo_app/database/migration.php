<?php

// $conn = mysqli_connect("localhost","root","");
// $sql = "CREATE DATABASE todo";
// $result = mysqli_query($conn, $sql);
// mysqli_close($conn);

$conn = mysqli_connect("localhost","root","","todo");
$sql = "CREATE TABLE if not exists todo(
    id INT PRIMARY KEY AUTO_INCREMENT ,
    title varchar(200) NOT NULL 
)";
$result = mysqli_query($conn, $sql);
