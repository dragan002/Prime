<?php 
    include 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Employees</title>
</head>
<body>
    
<div class="container">
    <button class="btn btn-primary my-5"><a href="new_task.php" class="text-light">New task</a></button>
    <button class="btn btn-primary my-5"><a href="efficiency.php" class="text-light">Efficiency</a></button>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tittle</th>
      <th scope="col">Description</th>
      <th scope="col">Assigne ID</th>
      <th scope="col">Due date</th>
      <th scope="col">Completed</th>
    </tr>
  </thead>
  <tbody>

  <?php 
    $sql = "SELECT * FROM `tasks`";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $desc = $row['description'];
            $assigne = $row['assigne'];
            $created_at = $row['created_at'];
            $completed = $row['is_completed'];
          

            echo ' <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$title.'</td>
            <td>'.$desc.'</td>
            <td>'.$assigne.'</td>
            <td>'.$created_at.'</td>
            <td>'.$completed.'</td>
            <td>
                <button class="btn btn-danger"><a href="delete_tasks.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                <button class="btn btn-primary"><a href="edit_tasks.php?editid='.$id.'" class="text-light">Edit</a></button>
            </td>
        </tr>';  
        }
    }

  
  ?>
  <button class="btn btn-primary my-5"><a href="employees.php" class="text-light">Employees</a></button>

 <button class="btn btn-primary my-5"><a href="logout.php" class="text-light">Logout</a></button>

  </tbody>
</table>
</form>
</div>

</body>
</html>