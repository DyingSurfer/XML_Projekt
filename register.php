<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
<style>
         * {
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            
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
</style>
</head>
<body>

<form method="post" name="prijava">
    <h2>Create an account</h2>
        <label for="mail">E-mail:</label>
        <br />
        <input name="mail" type="text" required/>
        <br />
        <label for="user">Username:</label>
        <br />
        <input name="user" type="text" required/>
        <br />
        <label for="pass">Password:</label>
        <br />
        <input name="pass" type="password" required/>
        <br />
        <label for="pass1">Repeat password:</label>
        <br />
        <input name="pass1" type="password" required/>
        <br />
        <button name="submit" type="submit" >Sign up</button>
        <a href="login.php">Login</a>
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projekt";

        if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST['pass1']) && isset($_POST["mail"])){
            $user=$_POST["user"];
            $pass=$_POST["pass"];
            $repass=$_POST["pass1"];
            $email=$_POST["mail"];

            $dbc = mysqli_connect($servername, $username, $password, $dbname) or
                die('Error connecting to MySQL server.'. mysqli_connect_error());

            $query = "SELECT * FROM accounts";

            $result= mysqli_query($dbc,$query) or die('Error querying database.');

            $flag=0;
            while($row = mysqli_fetch_array($result)){
                if($row['email']==$email){
                    echo '<p>E-mail already in use.</p></form>';
                    $flag=1;
                    break;
                }
                if($row['user']==$user){
                    echo '<p>Username already in use.</p></form>';
                    $flag=1;
                    break;
                }
                if($pass!=$repass){
                    echo "<p>Passwords must match!<p></form>";
                    $flag=1;
                    break;
                }
            }

            if($flag==0){
            
            $pass_hash=password_hash($pass,CRYPT_BLOWFISH);

            $sql="INSERT INTO accounts (user, pass, email) VALUES(?,?,?)";

            $stmt=mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $sql)){

                mysqli_stmt_bind_param($stmt,'sss',$user,$pass_hash,$email);

                mysqli_stmt_execute($stmt);
             }
             header("location:login.php");
            };
           

            mysqli_close($dbc);
        }
    ?>
</body>
</html>