<?php
    include('connection.php') ;
    session_start() ;
    $rstatus = true ;

    $my_class = $_GET['myclass'] ;
    $my_rollno = $_GET['myrollno'] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "stylesheet"  href="mycss/result.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        .button {
          display: inline-block;
          border-radius: 4px;
          background-color:black;
          color: #1d1515;
          text-align: center;
          font-size: 16px;
          padding: 4px;
          width: 80px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
          font-weight: bold;
          border: 2px ;
          color:white;
        }
        
        .button span {
          border: 2px;
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;

        }
        
        .button span:after {
            border: 2px;
          content: '\00bb';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }
        
        .button:hover span {
          padding-right: 25px;
        }
        
        .button:hover span:after {
          opacity: 1;
          right: 0;
        }
        </style>
</head>
<body>
    <header class = "header">
        <div class = "divh1"><h1>Elpis Global School</h1></div>
        <button style = "
        margin-top: 35px;
        margin-bottom: 35px;
        padding: 6px 20px 6px 20px;
        font-weight: bold;
        color: #f1eded;
        background-color: black;
        border-radius: 5px;
        cursor:pointer" onclick = "dashboard.php"> Back </button>
        
    </header>

    <div class = "main">
        <u><p>Report Card</p></u>
        <p> Academic Session: 2022-2023 </p>
    </div>
    <br>
    <div >
        <center> 
    <table class = "tableintro">
            <?php
                $qstu = "SELECT * from student where class = '$my_class' and rollno = '$my_rollno'" ;
                
                $stu_run = mysqli_query($con,$qstu) ;
                $foundstu=array();
                while($row=mysqli_fetch_assoc($stu_run))
                {
                array_push($foundstu,$row);
                } 

            ?>
          
            <tr>
                <td class = "tabletdi">Name :</td>
                <td class = "tabletdi">
                    <?php print_r($foundstu[0]['username']); ?>
                </td>
            </tr>

            <tr>
                <td class = "tabletdi">Class : </td>
                <td class = "tabletdi" color= 'blue'>
                    <?php print_r($foundstu[0]['class']); ?>
                </td>
            </tr>

            <tr>
                <td class = "tabletdi">Roll No. :</td>
                <td class = "tabletdi">
                    <?php print_r($foundstu[0]['rollno']); ?>
                </td>
            </tr>

        </table>
        </center>
    </div>
    <br>
    <div class = "resulttable">
        <center>
    <table >
            <tr>
                <th class = "table_th">Subject</th>
                <th class = "table_th">Total Marks</th>
                <th class = "table_th">Marks Obtained</th>
                
            </tr>

            <?php
                $qmarks = "SELECT * from result where class = '$my_class' and rollno = '$my_rollno'" ;
                
                $marks_run = mysqli_query($con,$qmarks) ;
                $foundRows=array();
                while($row=mysqli_fetch_assoc($marks_run))
                {
                array_push($foundRows,$row);
                }               
            ?>

          
            <tr>
                <td class = "table_td">
                    English
                </td>
                <td class = "table_td">
                    100
                </td>
                <td class = "table_td">
                <?php print_r($foundRows[0]['english']); ?>
                </td>
                
            </tr>

            

            <tr>
                <td class = "table_td">
                    Math
                </td>
                <td class = "table_td">
                    100
                <td class = "table_td">
                <?php print_r($foundRows[0]['math']); ?>
                </td>
                
            </tr>

            <tr>
                <td class = "table_td">
                    Science
                </td>
                <td class = "table_td">
                    100
                <td class = "table_td">
                <?php print_r($foundRows[0]['science']); ?>
                </td>
                
            </tr>

            <tr>
                <td class = "table_td">
                    Hindi
                </td>
                <td class = "table_td">
                    100
                <td class = "table_td">
                <?php print_r($foundRows[0]['hindi']); ?>
                </td>
                
            </tr>

            <tr>
                <td class = "table_td">
                    Computer
                </td>
                <td class = "table_td">
                    100
                <td class = "table_td">
                <?php print_r($foundRows[0]['computer']); ?>
                </td>
                
            </tr>

           

        </table>
        </center>
        

    </div>

    <?php

        $tot = $foundRows[0]['computer'] + $foundRows[0]['hindi'] + $foundRows[0]['math'] +
               $foundRows[0]['english'] + $foundRows[0]['science'] ;
        $per = sprintf('%.2f' , $tot / 5 );

        if ( $per >= 33 )
                $rstatus = false ;
    ?>

    <div class ="one">
        <?php
        if ( $rstatus == true )
            echo "<p>Status : <span style='color:red' >Failed </span></p> ";
        else
            echo "<p>Status : <span style='color:green' >Passed </span></p>";
        ?>
    </div> 
    
    

    <div class = "two">
        <p>Total : <span> <?php echo $tot ?> </span> / 500 </p>
        <p>Percentage: <span> <?php echo $per ?> </span>%</p>
    </div>
     
     
    <center>
    <button class="button" style="vertical-align:middle" onclick="window.print()"><span>Print</span>
    </center>
    
</body>
</html>