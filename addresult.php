<?php 
    include("connection.php") ;
    session_start() ;
    $allfield = false ;
    $checkpresent1 = false ;
    $checkpresent2 = false ;
    $uploaded = false ;
    
    if(isset($_POST['submit']) )
    {
        if ( !empty($_POST['rollno']) && !empty($_POST['class']) && !empty($_POST['math']) && !empty($_POST['science']) && !empty($_POST['hindi']) && !empty($_POST['computer']))
        {
            $rollno = $_POST['rollno'] ;
            $class  = $_POST['class'] ;
            $english  = $_POST['english'] ;
            $math  = $_POST['math'] ;
            $science  = $_POST['science'] ;
            $hindi  = $_POST['hindi'] ;
            $computer  = $_POST['computer'] ;
    
            $check1 = "SELECT * from student where rollno='$rollno' and class = '$class' " ;
            $runcheck1 = mysqli_query($con,$check1) ;
            $c1 = mysqli_num_rows($runcheck1) ;

            $check2 = "SELECT * from result where rollno = '$rollno' and class = '$class' " ;
            $runcheck2 = mysqli_query($con ,$check2) ;
            $c2 = mysqli_num_rows($runcheck2) ;


            if ( $c1 == 0 )
            {
                $checkpresent1 = true ;
            }

            else if ( $c2 > 0 )
            {
                $checkpresent2 = true ;
            }
    
            else
            {
                $sql = "INSERT into 
                        result (`class` , `rollno` , `english` , `math` ,`science` , `hindi` , `computer` )
                        values ('$class','$rollno','$english','$math', '$science' , '$hindi' , '$computer' ) " ;
    
                $run = mysqli_query($con,$sql) ;
                if ( $run )
                {
                    $uploaded = true ;
                }
                else
                    echo "Data Not Uploaded" ;
            }
        }
        else
        {
            $allfield = true ;
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

        p{
            color :red;
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
            padding-top:10px;
            padding-bottom:10px;
            border-radius:7px;
            margin-bottom:20px ;
        }

        h1{
            margin-bottom:9px;
        }

        h4{
            padding-top:8px ;
        }

        form{
            margin-bottom:20px ;
        }

        .mlabel{
            width:30%
        }

        .upload{
            color: green;
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
        <h1>ADD RESULT</h1>

        <div class="divdeg">
            <?php
            if ( $allfield == true )
            {
            echo"<P> All feilds necessary </P>";
            }
            if ( $checkpresent1 == true )
            echo"<P> Student details not found </P>";
            if ( $uploaded == true )
            echo"<P class = 'upload' > Data uploaded successfully </P>";
            if ( $checkpresent2 == true )
            echo"<P> Data already uploaded </P>" ;
            ?>
            <form action="addresult.php" method = "POST">
                
                <div>
                    <label for="">Class :</label>
                    <!--<input type="number" name="class"> -->
                    <select name="class" id="">
                        <option value="">Select class</option>
                        <option value="10">10th</option>
                        <option value="12">12th</option>
                    </select>
                </div>

                <div>
                    <label for="">Roll No :</label>
                    <input type="number" name="rollno" placeholder = "Enter Roll Number">
                </div>

                <h4> Enter Marks </h4>

                <div>
                    <label for="">English :</label>
                    <input type="number" name="english"  class = "mlabel">
                </div>

                <div>
                    <label for="">Math :</label>
                    <input type="number" name="math" placeholder = "" class = "mlabel">
                </div>

                <div>
                    <label for="">Science :</label>
                    <input type="number" name="science" placeholder = "" class = "mlabel">
                </div>

                <div>
                    <label for="">Hindi :</label>
                    <input type="number" name="hindi" placeholder = "" class = "mlabel">
                </div>

                <div>
                    <label for="">Computer :</label>
                    <input type="number" name="computer" placeholder = "" class = "mlabel">
                </div>

                
                
                <button name = "submit">Submit</button>
            </form>
        </div>
    </center>
    </div> 
</body>
</html>