<?php 
include 'includes/db.php';

if(!isset($_GET['editid'])) {
    header('Location:tasks.php');
    exit();
}

$id = $_GET['editid'];
$sql = "SELECT * FROM `tasks` WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0) {
    header('Location:tasks.php');
    exit();
}

$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$desc = $row['description'];
$assigne = $row['assigne'];
$created_at = $row['created_at'];


if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $assigne = $_POST['assigne'];
    $created_at = $_POST['created_at'];

    $sql = "UPDATE `tasks` SET title = ?, `description` = ?, `assigne` = ?, created_at = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $desc, $assigne, $created_at, $id);
    $result = mysqli_stmt_execute($stmt);
    if($result) {
        header('Location:tasks.php');
    } else {
        die(mysqli_error($conn));
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
    <title>Edit</title>
</head>
<body>
    <div class="container">
    <form method="post">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" value = <?php echo $title; ?>>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" name = "description" value = <?php echo $desc; ?>>
  </div>
  <div class="mb-3">
    <label for="assigne" class="form-label">Assigne</label>
    <input type="text" class="form-control" name = "assigne" value = <?php echo $assigne; ?>>
  </div>

  <div class="mb-3">
    <label for="created_at" class="form-label">Due date</label>
    <input type="date" class="form-control" name = "created_at">
  </div>

  <button type="submit" name = "submit" class="btn btn-primary">Edit</button>
</form>
    </div>
</body>
</html>