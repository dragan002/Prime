<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>WorkForce</title>
</head>
<body>

    <div id="wrapper">
        <div id= "left">
            <div id="signin">
                <div class="logo">
                    
                </div>

                 <?php 
                    if(isset($_GET['success'])) {
                        if($_GET['error'] == 'emptyfield') {
                            echo '<script>alert("Please fill all fields!");</script>';
                        }
                    else if ($_GET['error'] == 'nameTaken') {
                        echo '<script>alert("Name is already taken!");</script>';
                      }
                    else if ($_GET['error'] == 'wrongpwd') {
                    echo '<script>alert("Incorrect password!");</script>';
                    }
                    else if ($_GET['success'] == 'signin') {
                     echo '<script>alert("Nice Job, you are succesfully registered! Log in to take your task"); window.location.href = "index.php";</script>';
                    } 
                    }
            ?> 

                <form action="includes/admin.inc.php" method="post">
                    <div>
                        <label>Username</label>
                        <input type="text" class="text-input" name="username">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" class="text-input" name="password">
                    </div>
                    <button type="submit" class="primary-btn" name="admin-submit">Sign In</button>
                </form>
                <div class="or">
                    <hr class="bar">
                    <span>OR</span>
                    <hr class="bar">
                </div>
            </div>
            <footer id="main-footer">
                <button type="submit" id =main-pg-btn class="main-pg"><a href="index.php">Main Page</a></button>
            </footer>
        </div>
        <div id="right">
            <div id="showcase">
                <div class="showcase-content">
                    <h1 class="showcase-text">Let's create the future <strong>Together</strong></h1>
                    <a href="#" class="secondary-btn">Take your Adventage</a>
                </div>
            </div>
        </div>
    </div>
   
    
</body>
</html>