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
    <button class="btn btn-primary my-5"><a href="../index.php" class="text-light">Exit</a></button>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Tittle</th>
      <th scope="col">Description</th>
      <th scope="col">Assigne ID</th>
      <th scope="col">Due date</th>
      <th scope="col">Completed?</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
require 'db.php';

if(isset($_POST["login-submit"])) {
    $employeeName = $_POST['employeeName'];
    $email = $_POST['email'];

    if(empty($employeeName) || empty($email)) {
        header('Location: ../index.php?error=emptyfields');
        exit();
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../index.php?error=invalidemail');
            exit();
        } else {
            $sql = "SELECT * FROM employee WHERE email=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header('Location: ../index.php?error=sqlerror');
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)) {
                    if($employeeName !== $row['full_name']) {
                        header('Location: ../index.php?error=invalidemployee');
                        exit();
                    } else {
                        // Store employee ID for later use
                        $employeeId = $row['id'];
                    }
                } else {
                    header('Location: ../index.php?error=nouser');
                    exit();
                }
            }
        }
    }
} else{
    header('Location: ../index.php');
    exit();
} 

// Use the employee ID to fetch tasks assigned to the employee
$sql = "SELECT * FROM tasks WHERE assigne= ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../employee_tasks.php?error=sqlerror');
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "i", $employeeId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while($row = mysqli_fetch_assoc($result)) {
        $taskId = $row['id'];
        $completed = $row['is_completed'];
        echo ' <tr>
        <td>'. $row['title'] .'</td>
        <td>'. $row['description'] .'</td>
        <td>'. $row['assigne'] . '</td>
        <td>'. $row['created_at'] .'</td>
        <td>
            <button class="btn btn-danger"><a href=" ../complete_task.php?iscomplete='.$taskId.'" class="text-light">YES</a></button>
        </td>
    </tr>'; 
    }
}
?>
</body>
</html>
<?php







