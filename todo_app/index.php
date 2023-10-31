<?php session_start();
$conn = new mysqli("localhost", "root", "", "todo");
$query = "SELECT * from `todo` order by id DESC";
$result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
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
                <?php if (isset($_SESSION["success"])) : ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION["success"];
                        unset($_SESSION["success"]);
                        ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="handlers/task.php">
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="Enter todo">
                    <input type="submit" value="add" class="form-control btn btn-primary my-3">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <th><?php echo $row['id']  ?> </th>
                                <th><?php echo $row['title']  ?> </th>
                                <th>
                                <a href="handlers/deletetask.php?id=<?php echo $row['id'] ?>" style="text-decoration: none;">
                                        <i class="fa-solid fa-trash-can text-danger"></i>
                                    </a>
                                    &nbsp;
                                    <a href="handlers/updatetask.php?id=<?php echo $row['id'] ?>">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </th>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
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