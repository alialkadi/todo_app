<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
    $title = htmlspecialchars(htmlentities($_POST['title']));

    $conn = mysqli_connect('localhost', 'root', '', 'todo');
    $query = "INSERT INTO `todo`(`title`) values ('$title')";
    $result = mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['success'] = ' TASK ADDED SUCCESSFULLY';
    }
    header('location:../index.php');
    die();
}
