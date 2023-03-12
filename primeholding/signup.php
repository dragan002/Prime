<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sing in</title>
</head>
<body>

    <div id="wrapper">
        <div id= "left">
            <div id="signin">

            <?php 
                    if(isset($_GET['error'])) {
                        if($_GET['error'] == 'emptyfield') {
                            echo '<script>alert("Please fill all fields!");</script>';
                        }
                    else if ($_GET['error'] == 'nameTaken') {
                        echo '<script>alert("Name is already taken!");</script>';
                      }
                    else if ($_GET['error'] == 'invalidemployeeName') {
                    echo '<script>alert("Invalid username!");</script>';
                    }
                    else if ($_GET['error'] == 'success') {
                     echo '<script>alert("Nice Job, you are succesfully registered! Log in to take your task"); window.location.href = "index.php";</script>';
                    } 
                    }
            ?>
                
                <form action="includes/signup.inc.php" method="post">
                <div>
                        <label>Full name</label>
                        <input type="text" class="text-input" name="employeeName" placeholder="Type your name" require>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" class="text-input" name="email"placeholder="Type your email">
                    </div>
                    <div>
                        <label>Phone Number</label>
                        <input type="number" class="text-input" name="phoneNumber" placeholder="Type your phone number">
                    </div>
                    <div>
                        <label>Date of birth</label>
                        <input type="date" class="text-input" name="birthday" >
                    </div>
                    <div>
                        <label>Monthly salary</label>
                        <input type="number" class="text-input" name="salary" placeholder="Type your salary">
                    </div>
                    
                    <button type="submit" name="signup-submit"class="primary-btn">Register !</button>
                </form>
              
                <div class="or">
                    <hr class="bar">
                    <span>Be A Part Of Future</span>
                    <hr class="bar">
                </div>
            </div>
            <footer id="main-footer">
                <p>Copyright &copy; 2018, Seraphicus</p>
                <div>
                    <a href="#">Terms of use</a> | <a href="#">Privacy Policy</a>
                </div>
            </footer>
        </div>
        <div id="right">
            <div id="showcase">
                <div class="showcase-content">
                    <h1 class="showcase-text">Let's create the future <strong>Together</strong></h1>
                    <a href="#" class="secondary-btn">Start for free, explore our tasks</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>