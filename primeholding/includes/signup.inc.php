<?php
require "db.php";

if(isset($_POST['signup-submit'])) {
    $employeeName = $_POST['employeeName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $birthday = $_POST['birthday'];
    $salary = $_POST['salary'];
}

if(empty($employeeName) || empty($email) || empty($phoneNumber) || empty($birthday) || empty($salary)) {
    header('Location: ../signup.php?error=emptyfield&employeeName='.$employeeName.'&email='.$email.'&phoneNumber='.$phoneNumber.'&birthday='.$birthday.'&salary='.$salary);
    exit();
} else if (!preg_match("/^[a-zA-Z0-9\s]*$/",$employeeName)) {
    header('Location: ../signup.php?error=invalidemployeeName&employeeName='.$employeeName);
    exit();
} else {
    $sql = "SELECT `full_name` FROM `employee` WHERE `full_name`=?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../signup.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $employeeName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0) {
            header('Location: ../signup.php?error=nameTaken');
            exit();
        } else {
            $sql = "INSERT INTO `employee` (`full_name`, `email`, `phone_number`, `date_of_birth`, `monthly_salary`) VALUES (?, ?, ?, ?, ?)";
        
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)) {
                header('Location: ../signup.php?error=sqlerror');
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, 'sssss', $employeeName, $email, $phoneNumber, $birthday, $salary);
                mysqli_stmt_execute($stmt);
                header('Location: ../signup.php?error=success');
                exit();
            }
        }
    }
}
