<?php
session_start();
if(isset($_GET['id'])){
    $conn = mysqli_connect('localhost','root','','todo');
    $id = $_GET['id'];
    $query = "DELETE FROM `todo` WHERE `id`='$id' ";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_affected_rows($conn) == 0 ) {
        $_SESSION['success'] = ' DATA NOT EXISTING';
        die();
    }
    if (mysqli_affected_rows($conn) == 1 ) {
        $_SESSION['success'] = ' TASK DELETED SUCCESSFULLY';
    }
    
    header('location:../index.php');
}