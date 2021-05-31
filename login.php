<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <style>

         * {
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: Cambria, Cochin, Georgia, Tusers, 'Tusers New Roman', serif;
            background-image:url("img/papyrus-dark.png");
            color:#fff;
        }
       h1{
           text-align: center;
           margin: auto;
           margin-bottom: 5%;
       }
        form {
            width: 30%;
            margin: 0 auto;
            margin-top:10%;
            
        }
        form label,
        form input,
        form button {
            margin-bottom: 3px;
            display: block;
            width: 100%;
            color:white;
            font-family: Cambria, Cochin, Georgia, Tusers, 'Tusers New Roman', serif;
            
        }
        form label{
            text-align: left;
            font-size: 20px;
            
        }
        form input {
            height: 35px;
            font-size:20px;
            line-height: 25px;
            background:none;
            border: 1px solid #fff;
            padding: 0 6px;
            box-sizing: border-box;
            
        }
        form button {
            height: 40px;
            width:25%;
            line-height: 30px;
            background:none;
            font-size: large;
            margin-top: 10px;
            cursor: pointer;
            border: 1px solid #fff;
            margin:0px;
            float:left;
            
        } 
        form .error {
            color: #ba0000;
        }
         .button {
            padding: 5px 10px;
            font-size: 15px;
            text-align: center;
            cursor: pointer;
            outline: none;
            font-weight: bold;
            color: #fff;
            border: 1px solid #fff;
            background: none;
            margin:10px;
            font-family: Cambria, Cochin, Georgia, Tusers, 'Tusers New Roman', serif;
            
        }
        form button:hover{
           background-color:#fff;
           color:#000; 
        }
        form a {
            text-decoration:underline;
            color:white;
            float:right;
            font-size:18px;
        }
        form a:hover{
            font-weight:bold;
            
        }
       
        p{
            margin-left:5%;
            padding-top:2%;
            font-size:18px;
            text-align:center;
            color: #ba0000;
            float:left;
        }
        h2{
            text-align:center;
        }
        h3{
            text-align:center;
        }
    </style>
</head>
<form method="post">
    <h3>You have successfully created an account</h3>
    <br>
    <h2>Login please</h2>
    <label for="user">Username</label>
    <br />
    <input name="user" type="text" required/>
    <br />
    <label for="pass">Password</label>
    <br />
    <input name="pass" type="password" required/>
    <br />
    <button name="submit" type="submit">Login</button> 
    <a href="register.php">Register</a>

<?php
   session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekt";

    if(isset($_POST["user"]) && isset($_POST["pass"])){
        $user=$_POST["user"];
        $pass=$_POST["pass"];

        $dbc = mysqli_connect($servername, $username, $password, $dbname) or
            die('Error connecting to MySQL server.'. mysqli_connect_error());
        
        $query = "SELECT * FROM accounts";
        
        $result= mysqli_query($dbc,$query) or die('Error querying database.');
        
        $flag=0;
        while($row = mysqli_fetch_array($result)){
            
            if(password_verify($pass,$row['pass']) && $row["user"]==$user){
                
                $_SESSION['user']=$user;
                header("location: welcome.php");
                $flag=1;
            }
        }
        if($flag==0){
            echo "<p>Wrong username or password<p></form>";
        }
        mysqli_close($dbc);
    }
?>
</body>
</html>

