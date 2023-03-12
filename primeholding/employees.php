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
    <button class="btn btn-primary my-5"><a href="add_employees.php" class="text-light">New employee</a></button>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone number</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Monthly salary</th>
    </tr>
  </thead>
  <tbody>

  <?php 
    $sql = "SELECT * FROM `employee`";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['full_name'];
            $email = $row['email'];
            $phoneNumber = $row['phone_number'];
            $birthday = $row['date_of_birth'];
            $salary = $row['monthly_salary'];

            echo ' <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$phoneNumber.'</td>
            <td>'.$birthday.'</td>
            <td>'.$salary.'</td>
            <td>
            <button class="btn btn-danger"><a href="delete_employee.php?deleteid='.$id.'" class="text-light">Delete</a></button>
            <button class="btn btn-primary"><a href="edit_employee.php?editid='.$id.'" class="text-light">Edit</a></button>
            </td>
          </tr>';
        }
    }

  
  ?>
  <button class="btn btn-primary my-5"><a href="tasks.php" class="text-light">Tasks</a></button>

 <button class="btn btn-primary my-5"><a href="logout.php" class="text-light">Log Out</a></button>

  </tbody>
</table>
</form>
</div>


</body>
</html>