<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Welcome </title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/et-lineicon.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,400italic,500italic,700' rel='stylesheet' type='text/css'>
        <!--[if IE]>
        	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	</head>
	<body>
   
        <div class="animationload">
            <div class="loader">
                Loading...
            </div>
        </div> 
     

		<section id="home">
			<div class="content">
                <div id="large-header" class="large-header">
                    <canvas id="demo-canvas"></canvas>
                    <div id="countdown_dashboard" class="home-main container">
                        <div class="row">
                            <div class="logo">
                                <img src="images/logo_white.png" width="150px" height="150px;" alt="logo">
                                <p style="font-size:35px;"><?php
                                session_start();
                                echo 'Welcome '.$_SESSION['user'];
                                ?></p>
                            </div>
                        </div>
                       
                </div> 
            </div>
        </section>

    
            
        <!-- JAVASCRIPTS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.lwtCountdown-1.0.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/animated.js"></script>
        <script src="js/main.js"></script>
	</body>
</html>