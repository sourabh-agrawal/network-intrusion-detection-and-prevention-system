<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sourabh Agrawal Md5_cracker</title>
        <style media="screen">
        .button2, .button3, .button5{
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 12px;
        }
        .button2 {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
        }

        .button2:hover {
            background-color: #008CBA;
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }

        .button3 {
            background-color: white;
            color: black;
            border: 2px solid #f44336;
        }

        .button3:hover {
            background-color: #f44336;
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .button5 {
            background-color: white;
            color: black;
            border: 2px solid #555555;
        }

        .button5:hover {
            background-color: #555555;
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
         }
        </style>
    </head>
    <body>
        <h1 style="font-family:Arial; ">MD5 encoder</h1>
        <p style="color:green; font-size:130%; font-family:courier; font-weight:bold;">This application takes a digit and Calculate it's hash value</p>

        <form class="md5encoderf" action="md5encoder.php" method="get">
            <input type="text" name="digit" value="<?php
            if(!isset($_GET['submitencoder'])){
                echo "";
            }else{
                echo $_GET['digit'];
            }
            ?>" >
            <input type="submit" name="submitencoder" value="Calculate hash">
        </form>
        <?php
            if(isset($_GET['submitencoder'])){
                echo "<br>Hash value is: ".hash('md5', $_GET['digit'])."<br>";
            }
        ?>
        <br>

        <div class="button" style="text-align:center;">
            <a href="md5encoder.php"><button type="button" class="button2">Reset this page</button></a>
            <a href="md5cracker.php"><button type="button" class="button3">Go back to Md5 cracker</button></a>
        </div>
        <div style="text-align:center;">
            <a href="right_login.php"><button type="button" class="button5">Home</button>
        </div>
    </body>
</html>
