<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Efficiency</title>
</head>
<body>
    <?php
    
include "includes/db.php";
$result = mysqli_query($conn, "SELECT e.full_name, SUM(t.is_completed) AS total_completed_tasks 
                                FROM tasks t 
                                INNER JOIN employee e ON t.assigne = e.id 
                                GROUP BY e.full_name 
                                ORDER BY total_completed_tasks DESC"); ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Total Completed Tasks</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td class='text-start'>" . $row["full_name"] . "</td>";
            echo "<td class='text-middle ms-n2'>" . $row["total_completed_tasks"] . "</td>";
            echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='2'>No completed tasks found.</td></tr>";
      }
    ?>
  </tbody>
</table>
</body>
</html>
<?php






