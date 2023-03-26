<?php 
    include("connection.php") ;
    session_start() ;
    $stuab = false ;
    $flag = false ;
    $jump = false ;

    $class = null ;
    $rollno = null ;
    
    if(isset($_POST['submit']))
    {
        if (!empty($_POST['class']) && !empty($_POST['rollno']) )
        {
            $class = $_POST['class'] ;
            $rollno = $_POST['rollno'] ;

            $check = "SELECT * from student where class = '$class' and rollno = '$rollno'" ;
            $check_user = mysqli_query($con,$check) ;
            $row_count = mysqli_num_rows($check_user) ;
    
            if ( $row_count == 1 )
            {
                // student present 
                echo "<script type='text/javascript' language='Javascript'>window.open('giveresult.php?myclass=$class&myrollno=$rollno');</script>" ;
            }
            else
            {
                $stuab = true ;
            }
        }
        else
        {
            $flag = true ;
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "stylesheet"  href="mycss/dashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashb</title>
    <style type = "text/css">
        label {
            display:inline-block;
            text-align: right ;
            width:100px ;
            padding-top:12px ;
            padding-bottom:10px ;
            font-size:19px;

        }

        .p1{
            color :red;
            font-weight:bold;
            font-size:15px;
        }

        .p2{
            color :green;
            font-weight:bold;
            font-size:15px;
        }

        button{
            padding:11px;
            background-color:#424a5b;
            border-radius:6px;
            border:1px;
            margin-top:19px;
            font-size:16px;
            font-weight:bold;
            color:white ;
        }

        input , select{
            padding:5px;
            width:50%
        }

        select{
            width:53% ;
        }

        .divdeg{
            background-color:skyblue;
            width:500px;
            padding-top:70px;
            padding-bottom:60px;
            border-radius:7px;

        }

        h1{
            margin-bottom:9px;
        }

    </style>
</head>
<body>
    <header class = "header">
        <a href = "dashboard.php"> Admin Dashboard </a>

        <div class = "logout">
            <a href = "">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li> <a href ="addStudent.php">Add Student</a></li>
            <li> <a href ="viewstudent.php">View Student</a></li>
            <li> <a href ="addresult.php">Add Result</a></li>
            <li> <a href ="viewresult.php">View Result</a></li>
            <li> <a href ="">Update Result</a></li>
            <li> <a href ="">Delete Result</a></li>
        </ul>
    </aside>

    <div class = "main">
        <center>
        <h2>Enter Details </h2>

        <div class="divdeg">
            <?php
            if ( $stuab == true )
            {
                echo "<P class = 'p1'> Student details not found </P>";
            }
            if ( $flag == true )
            {
            echo"<P class = 'p1'> All feilds necessary </P>";
            }
            
            ?>
            <form action="viewresult.php" method = "POST">
                <div>
                    <label for="">Class :</label>
                    <select name="class" id="">
                        <option value="">Select your class</option>
                        <option value="10">10th</option>
                        <option value="12">12th</option>
                    </select>
                </div>
                <div>
                    <label for="" >Roll No :</label>
                    <input type="number" name="rollno" placeholder = "Enter Your Roll Number">
                </div>
               
                <button name = "submit" style = "cursor:pointer ">Submit</button>

            </form>
        </div>
    </center>
    </div> 
</body>
</html>