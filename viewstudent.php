<?php
    include("connection.php") ;

    $query = "SELECT * from student " ;
    $result = mysqli_query($con,$query) ;
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
        .table_th{
            padding:17px;
            font-size:20px;
        }

        .table_td{
            padding:17px;
            background-color:skyblue;
            font-size:18px;
            font-weight:bold;
        }

        table{
            margin-bottom:100px ;
        }
    </style>
</head>
<body>
    <header class = "header">
        <a href = "dashboard.php" class = "heading"> Admin Dashboard </a>

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
        <h1> Student Data</h1>

        <table border=1px>
            <tr>
                <th class = "table_th">Name</th>
                <th class = "table_th">Class</th>
                <th class = "table_th">Roll No</th>
                <th class = "table_th">Phone</th>
            </tr>

            <?php
                while($info = $result-> fetch_assoc())
                {

            ?>
            <tr>
                <td class = "table_td">
                    <?php echo "{$info['username']}" ; ?>
                </td>
                <td class = "table_td">
                    <?php echo "{$info['class']}" ; ?>
                </td>
                <td class = "table_td">
                    <?php echo "{$info['rollno']}" ; ?>
                </td>
                <td class = "table_td">
                    <?php echo "{$info['phone']}" ; ?>
                </td>
            </tr>

            <?php
                }
            ?>

        </table>
        </center>
    </div>
    
    
</body>
</html>