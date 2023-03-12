<?php 
include 'includes/db.php';

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `employee` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header('Location:employees.php');
    } else {
        die (mysqli_error($conn));
    }
}
?>