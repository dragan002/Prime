<?php 
setcookie('admin_id', NULL, time() - 1);
header('Location:index.php');