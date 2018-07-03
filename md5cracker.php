<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sourabh Agrawal's Md5_cracker</title>
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
        <h1 style="font-family:Arial; ">MD5 cracker</h1>
        <p style="color:green; font-size:130%; font-family:courier; font-weight:bold;">This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
        <div class="output">
            <p style="font-family:courier; font-size:120%; color:red;">Debug Output:</p>
            <?php
                $answer = "Not Found";
                if(isset($_GET['submit'])){
                    $md5 = $_GET['md5'];

                    $count = 0;
                    $n = 0;
                    echo "<table>";
                    $pre_time = microtime(true);
                    echo "<tr><th>Hash</th><th>Value</th></tr>";
                    while ($count <= 10000) {
                        $holder = str_pad( "$count", 4, "0", STR_PAD_LEFT );
                        $copymd5 = hash('md5',"$holder");
                        if($md5 === $copymd5){
                            $answer = $holder;
                            if ($n <= 15) {
                                echo "<tr><td>$copymd5</td><td>$holder</td></tr>";
                            }
                        break;
                        }
                        if ($n <= 15) {
                            echo "<tr><td>$copymd5</td><td>$holder</td></tr>";
                        }
                        $n++;
                        $count++;
                    }
                    $post_time = microtime(true);

                    echo "</table>";
                    echo "Total checks: $count<br>";
                    echo "Ellapsed time: ";
                    echo $post_time-$pre_time."<br>";
                }
                echo "<p><b>PIN: $answer</b></p>";
            ?>
        </div>
        <form class="md5f" action="md5cracker.php" method="get">
            <input type="text" name="md5" size="40" value="<?php
            if(!isset($_GET['submit'])){
                echo "";
            }else{
                echo $_GET['md5'];
            }
            ?>" >
            <input type="submit" name="submit" value="Crack MD5">
        </form>

        <div class="button" style="text-align:center;">
            <a href="md5cracker.php"><button type="button" name="button" class="button2" >Reset this page</button></a>
            <a href="md5encoder.php"><button type="button" name="button" class="button3" >Calculate the md5 value of a digit</button></a>
        </div>
        <div style="text-align:center;">
            <a href="right_login.php"><button type="button" class="button5">Home</button>
        </div>
    </body>
</html>
