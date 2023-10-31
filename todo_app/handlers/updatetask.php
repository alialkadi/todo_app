<?php
session_start();
if(isset($_GET['id'])){
    $conn = mysqli_connect('localhost','root','','todo');
    $id = $_GET['id'];
    $query = "SELECT * FROM `todo` WHERE `id`='$id' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    echo "".$row["title"]."".$row["id"];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
        $title = htmlspecialchars(htmlentities($_POST['title']));
    if(mysqli_num_rows($result) > 0){
        $query = "UPDATE todo SET title = '$title' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $_SESSION['success'] = 'Task updated successfully';
        header("location:../index.php");
    }
}
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/all.min.css">
</head>

<body>
<div class="container mt-5">
<div class="row">
    <div class="col-md-8 mx-auto">
        <form method="POST" action="">
            <input type="text" name="title" class="form-control my-3 border border-success" placeholder="<?php echo $row['title'] ?>">
            <input type="submit" value="Update" class="form-control btn btn-primary my-3">
        </form>
    </div>
    </div>
     <!-- Bootstrap JavaScript Libraries -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/c4be490529.js" crossorigin="anonymous"></script>
</body>
</html>