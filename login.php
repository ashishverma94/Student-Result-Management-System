<?php
    require("connection.php") ;
    $user = $_POST["user"] ;
    $pass = $_POST["pass"] ;

    $sql = "select *from admin_login where admin_name = '$user' and admin_pass = '$pass'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){ 
        header("Location:dashboard.php") ;
    }
    else{   
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
?>

