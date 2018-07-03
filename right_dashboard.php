<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <style media="screen">
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('images/22.gif');
            background-size: cover;
        }
            table{
                margin-top: 10%;
            }
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

            .button4 {
                background-color: white;
                color: black;
                border: 2px solid #e7e7e7;
            }

            .button4:hover {background-color: #e7e7e7;}

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

            .button6{
                background-color: white; /* Gray */
                color: black;
                border: 2px solid Brown;
            }
            .button6:hover{
                background-color: Brown;
                color: white;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            }

        </style>
    </head>
    <body>
        <table align="center">
            <tr>

                <td><a href="uploadfile.php"><button class="button1" type="button" name="Upload_File" >Upload_File</button></a></td>
                <td><a href="view.php"><button class="button2" type="button" name="View_Files">View_Files</button></a></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center"><a href="right_login.php"><button type="button" class="button4" name="Add another ip">Add another ip</button></a></td>
            </tr>
            <tr>
                <td><a href="view_attack.php"><button type="button" class="button5" name="View attacks">View attacks</button></a></td>
                <td><a href="right_login.php"><button type="button" class="button6" name="Log Out">Log Out</button></a></td>
            </tr>
        </table>
    </body>
</html>
