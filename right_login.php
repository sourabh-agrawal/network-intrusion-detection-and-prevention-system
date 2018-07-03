<?php
include('config.php');
$per = 0;
if(isset($_POST['signup'])){
        $per = 1;
        $md = hash('md5', $_POST['psw']);
        $name = $_POST['name'];
        $message = '';
        $command="/sbin/ifconfig wlp2s0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
        $localIP = exec ($command);
        $browser = get_browser(null, true);
        $browswername=$browser['browser'];
        $browswerversion= $browser['version'];
        $os= $browser['platform'];

        $sql = 'insert into login values("'.$name.'","'.$md.'","'.$localIP.'","'.$browswername.'","'.$browswerversion.'","'.$os.'")';
        $result = mysqli_query($con, $sql);
        if($result){
            $message = "Account created successfully";
        }else{
            $message = "Some error occured please retry";
        }
}elseif (isset($_POST['login'])) {
    $per = 1;
    $md = hash('md5', $_POST['psw']);
    $name = $_POST['uname'];
    $message = '';
    $command="/sbin/ifconfig wlp2s0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
    $localIP = exec ($command);
    $browser = get_browser(null, true);
    $browswername=$browser['browser'];
    $browswerversion= $browser['version'];
    $os= $browser['platform'];

    $sql = 'select *from login where name="'.$name.'"';
    $results = mysqli_query($con, $sql);
    while($result = mysqli_fetch_array($results)){
        if($result['name']==$name && $result['password']==$md && $result['ip']==$localIP && $result['browser']==$browswername && $result['version']==$browswerversion && $result['os']==$os){
            header("Location: right_dashboard.php");
            break;
        }else{
            $message = "Details not matched....for Username=$name";
            date_default_timezone_set("Asia/Calcutta");
            $t = date("d/M/Y h:i:s a");

            $sql = 'insert into attack values("'.$localIP.'","'.$browswername.'","'.$browswerversion.'","'.$os.'","'.$t.'")';
            $result = mysqli_query($con, $sql);



            // $messag ="Hi ".$name." your account is attacked from ip=".$localIP." Broswer=".$browswername." Browswer version=".$browswerversion." from operating system=".$os;

            $to =$_POST['email'];
            $subject ="Account Breached";
            $from = 'sourabh181097@gmail.com';

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
            $messag = '<html><body>';
            $messag .= '<h1 style="color:#f40;">Hi '.$name.' !</h1>';
            $messag .= '<h3 style="color:#f40;">Your Account is attacked !</h3>';
            $messag .= '<p style="color:#080;font-size:20px;">Attacker IP '.$localIP.'</p>';
            $messag .= '<p style="color:#080;font-size:20px;">Browser Name '.$browswername.'</p>';
            $messag .= '<p style="color:#080;font-size:20px;">Browser Version '.$browswerversion.'</p>';
            $messag .= '<p style="color:#080;font-size:20px;">Operating System '.$os.'</p>';
            $messag .= '</body></html>';
            mail($to, $subject, $messag, $headers);
        }
    }
}
?>
<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url('books coffee/12.jpg');
    background-size: cover;
}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}


/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 20px;
    opacity: 0.8;
}

button:hover {
    opacity: 1;
}



.button2, .button3{
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

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}
/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
.container {
    padding: 16px;
}
/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 30%;
    height: auto;
    border-radius: 50%;
}


/* The Modal (background) */
.modal1 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content1 {
    background-color: #fefefe;
    margin: 2% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* The Close Button (x) */
.close1 {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close1:hover,
.close1:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate1 {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn,signupbtn {
       width: 100%;
    }
}
table{
    margin-top: 10%;
}
.newtable{
    margin-top: 2%;
}
</style>
</head>
<body>

<table align="center">
    <tr>
        <th colspan="2"><h2>Welcome</h2></th>
    </tr>
    <tr>
        <td><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="button2">Login</button></td>
        <td><button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="button3">Sign Up</button></td>
    </tr>
    <tr>
        <td colspan="2" text-align="center"><a href="md5cracker.php"><button type="button" class="button5">MD5 Cracker</button></a></td>
    </tr>
    <table align="center" class="newtable">
        <tr>
            <td colspan="2" style="color:red;">
                <?php
                    if($per==1){
                        echo $message;
                    }
                ?>
            </td>
        </tr>
    </table>
</table>




<div id="id01" class="modal1">

  <form class="modal-content1 animate1" action="right_login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close1" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
  </div>

    <div class="clearfix">
        <button type="submit" class="signupbtn" name="login">Log In</button>
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>



<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

  <form class="modal-content" action="right_login.php" method="post">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Username" name="name" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>



      <div class="clearfix">
          <button type="submit" class="signupbtn" name="signup">Sign Up</button>
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </div>
  </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }else if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

</script>



</body>
</html>
