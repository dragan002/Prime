<?php 
include 'includes/db.php';

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $assigne = $_POST['assigne'];
    $created_at = $_POST['created_at'];
   
    $sql = "INSERT INTO `tasks` (`title`, `description`, `assigne`, `created_at`) VALUES ('$title', '$desc', '$assigne', '$created_at')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header('Location:tasks.php');
    } else {
        $error_message = mysqli_error($conn);
        echo "Error: " . $error_message;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add</title>
</head>
<body>
    <div class="container">
    <form method="post">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title">
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" name = "description">
  </div>

  <div class="mb-3">
    <label for="assigne" class="form-label">Assigne ID</label>
    <input type="text" class="form-control" name = "assigne">
  </div>

   <div class="mb-3">
    <label for="created_at" class="form-label">Due date</label>
    <input type="date" class="form-control" name = "created_at">
  </div>

  <button type="submit" name = "submit" class="btn btn-primary">Add task</button>
  <a href="tasks.php">List</a>
</form>
    </div>
</body>
</html>
