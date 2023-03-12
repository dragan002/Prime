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
    

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tittle</th>
      <th scope="col">Description</th>
      <th scope="col">Due date</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  
  session_start();

  
  // code to connect to the database
  
  $sql = "SELECT * FROM `tasks` WHERE `assigne` = ?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header('Location: ../employee_tasks.php?error=sqlerror');
      exit();
  } else {
      mysqli_stmt_bind_param($stmt, "i", $employeeId);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              // code to display the tasks
          }
      } else {
          echo "No tasks assigned for employee " . $employeeId;
      }
  }
  
  ?>

  <!-- <button class="btn btn-primary my-5"><a href="employees.php" class="text-light">Employees</a></button>

 <button class="btn btn-primary my-5"><a href="logout.php" class="text-light">Odjavi se</a></button> -->

  </tbody>
</table>
</form>
</div>

</body>
</html>