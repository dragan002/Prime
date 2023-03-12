<?php
include 'includes/db.php';
if (isset($_GET['iscomplete'])) {
    $taskId = $_GET['iscomplete'];

    // Update the task as completed in the database
    $sql = "UPDATE tasks SET is_completed = 1 WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../complete_task.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $taskId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        ?>
        <script>
        window.location.href = "index.php";
        alert("Task completed!");
    </script>
    <?php
        exit();
    }
}
