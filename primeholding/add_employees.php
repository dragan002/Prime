<?php 
include 'includes/db.php';

if(isset($_POST['submit'])) {
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $birthday = $_POST['date_of_birth'];
    $salary = $_POST['monthly_salary'];

    $sql = "INSERT INTO `employee` (full_name, email, phone_number, date_of_birth, monthly_salary) VALUES ('$name', '$email', '$phoneNumber', '$birthday', '$salary')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header('Location:employees.php');
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
    <label for="full_name" class="form-label">Full name</label>
    <input type="text" class="form-control" name="full_name">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name = "email">
  </div>

  <div class="mb-3">
    <label for="phone_number" class="form-label">Phone number</label>
    <input type="number" class="form-control" name = "phone_number">
  </div>

  <div class="mb-3">
    <label for="date_of_birthday" class="form-label">Date of birthday</label>
    <input type="date" class="form-control" name = "date_of_birth">
  </div>

  <div class="mb-3">
    <label for="monthly_salary" class="form-label">Salary</label>
    <input type="text" class="form-control" name = "monthly_salary">
  </div>

  <button type="submit" name = "submit" class="btn btn-primary">Add employee</button>
  <a href="employees.php">List</a>
</form>
    </div>
</body>
</html>
