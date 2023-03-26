
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel = "stylesheet" href = "mycss/adminlogin.css" >
</head>
<body>
    <img src="images/adminback.jpg" alt="admin image">
    <div class="loginform">
        <h1>Admin Login</h1>
        <form auto_complete = 'off' action="login.php" method="post">
            <p> Username</p>
            <input type="text" name = "user" placeholder="Enter Username :" >
            <p> Password</p>
            <input type="password" name = "pass" placeholder="Enter Password :" >

            <button name = "signin" >Login</button>

        </form>
    </div>

    
</body>
</html>