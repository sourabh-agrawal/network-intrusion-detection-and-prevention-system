
<?php
    $con = mysqli_connect("localhost","root","");
    if(!$con){
        die("can not connect with the server");
    }else{
        mysqli_select_db($con,"class") or die('database selection problem');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>view</title>
        <style media="screen">
        button{
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
        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }

        .button1:hover {
            background-color: #4CAF50;
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        #outer, #upload {
            margin-top: 5%;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 50%;

        }
        #upload{
            margin-top: 1%;
        }
        #outer th, #upload td, #upload th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #upload tr:nth-child(even){background-color: #f2f2f2;}

        #upload tr:hover {background-color: #ddd;}

        #upload th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #4CAF50;
            color: white;
        }
        #outer th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #191970;
            color: white;
        }
        </style>
    </head>
    <body>
        <table id="outer" align="center">
            <tr>
                <th colspan="5">Attacks on you till now</th>
            </tr>
            <table id="upload" align="center">
                <tr>
                    <th>Attacker IP</th>
                    <th>Browser</th>
                    <th>Browser Version</th>
                    <th>Operating System</th>
                    <th>Time of attack</th>
                </tr>
                <?php
                    $query = "select *from attack";
                    $result=mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo    "<td>".$row['ip']."</td>";
                        echo    "<td>".$row['browser']."</td>";
                        echo    "<td>".$row['version']."</td>";
                        echo    "<td>".$row['os']."</td>";
                        echo    "<td>".$row['time']."</td>";
                        echo "</tr>";
                    }
                ?>
                <tr>
                    <td colspan="5"><a href="right_dashboard.php"><button type="button" class="button1">Dashboard</button></a></td>
                </tr>
            </table>

        </table>

    </body>
</html>
