<?php 
include 'includes/db.php';

if(isset($_GET['editid'])) {
  $id = $_GET['editid'];
  $sql = "SELECT * FROM `employee` WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  $name = $row['full_name'];
  $email = $row['email'];
  $phoneNumber = $row['phone_number'];
  $birthday = $row['date_of_birth'];
  $salary = $row['monthly_salary'];
}

if(isset($_POST['submit'])) {
  $name = $_POST['full_name'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phone_number'];
  $birthday = $_POST['date_of_birth'];
  $salary = $_POST['monthly_salary'];

  $sql = "UPDATE `employee` SET `full_name` = ?, `email` = ?, `phone_number` = ?,  `date_of_birth` = ?, `monthly_salary` = ? WHERE `id` = ?";
  $stmt = mysqli_prepare($conn, $sql);
  
  if (!$stmt) {
      die(mysqli_error($conn));
  }
  
  mysqli_stmt_bind_param($stmt, "sssssi", $name, $email, $phoneNumber, $birthday, $salary, $id);
  $success = mysqli_stmt_execute($stmt);
  
  if($success) {
      header('Location:employees.php');
      exit();
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
    <label for="full_name" class="form-label">Full name</label>
    <input type="text" class="form-control"  name="full_name" value = "<?php echo $name; ?>">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name = "email" value = "<?php echo $email; ?>">
  </div>

  <div class="mb-3">
    <label for="phone_number" class="form-label">Phone number</label>
    <input type="number" class="form-control" name = "phone_number" value = "<?php echo $phoneNumber; ?>">
  </div>

  <div class="mb-3">
    <label for="date_of_birth" class="form-label">Date of birthday</label>
    <input type="date" class="form-control" name = "date_of_birth" value = "<?php echo $birthday; ?>">
  </div>

  <div class="mb-3">
    <label for="monthly_salary" class="form-label">Salary</label>
    <input type="number" class="form-control" name = "monthly_salary" value = "<?php echo $salary; ?>">
  </div>

  <button type="submit" name = "submit" class="btn btn-primary">Edit</button>
</form>
    </div>
</body>
</html>