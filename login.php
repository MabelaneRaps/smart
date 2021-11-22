<?php 
$message1 =  "";
if(isset($_GET["user2"])){
    $message1 = $_GET["user2"];
}

?>


<?php
require_once "connect.php";

$pasword_username_err=$login_err="";

//Sanitizing All input variables

function sanitize($value){
	
	$s_value = filter_var($value,FILTER_SANITIZE_STRING);
    $s_value = htmlspecialchars($s_value);
	
	return $s_value;
	
}
//------------------------------------------------

//====Check if the user already loggen in  //

/*
session_start();
if(isset($_SESSION["investa_user"])){
    header("location:dashboard.php");
}
*/
///======End========//

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(isset($_POST["name"])){

		$param_pasword = sanitize($_POST["Password"]);
        $param_username = sanitize($_POST["name"]);
	    $sql="SELECT username,passwords FROM registration WHERE  passwords='$param_pasword' ";
        $result = $conn->query($sql);
		//$param_pasword = hash('ripemd128',"$salt1$password$salt2");
       
		 
		if($result->num_rows > 0){
            $row = $result->fetch_assoc(); 
            if($row["username"]===$param_username){
                session_start();
                $_SESSION["investa_user"] = ucfirst(strtolower($_POST["username"]));
                $user = ucfirst($_SESSION["investa_user"]);
                setcookie('username',$user,time() + 60*60*24*7,'/');

                header("location:dashboard.php");
            }
            else{
                $pasword_username_err="<strong>Your Pasword/Username combination is wrong</strong>";
                                
                }		
			
		}
		else{
			$login_err="<script>alert('You don't have smart investa account')</script>";
            $pasword_username_err="<strong>Your Pasword/Username combination is wrong</strong>";
		}
	}

}

$conn->close();

?>
<Doctype html>
<html lang="en">
<head>
<!-- start meta tags-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Sign in and start trading...." />
<!-- End of meta tags -->

<!-- SITE TITLE -->
<title>Smart Investa/Login</title>
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">

 <!-- fonts -->
 <link rel="stylesheet" href="fonts/css/all.css">
<link rel="stylesheet" href="fonts/css/all.min.css">
<link rel="stylesheet" href="fonts/css/brands.css">
<link rel="stylesheet" href="fonts/css/brands.min.css">
<link rel="stylesheet" href="fonts/css/fontawesome.css">
<link rel="stylesheet" href="fonts/css/regular.css">
<link rel="stylesheet" href="fonts/css/regular.min.css">
<link rel="stylesheet" href="fonts/css/solid.css">
<link rel="stylesheet" href="fonts/css/svg-with-js.css">
<link rel="stylesheet" href="fonts/css/svg-with-js.min.css">
<link rel="stylesheet" href="fonts/css/v4-shims.css">
<link rel="stylesheet" href="fonts/css/v4-shims.min.css">

<!-- links of styling-->
<link rel="stylesheet" href="css/tablet.css">
<link rel="stylesheet" href="css/desktop.css">
<link rel="stylesheet" href="css/phone.css">
<link rel="stylesheet" href="css/smart.css">
<!-- javascript -->
<script type="text/javascript"> src="js/smart.js"</script>
<script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js"</script>
<script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.js"</script>
<script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js"</script>


</head>
<!-- start of body -->
 <body class="body_style">
 <?php echo $login_err?>
    <!--start of header -->
    <div class="nav_link2">
        <a href="index.html">Home</a>
    </div>
    <!-- end of header -->
    <!-- start of logo -->
    <div>
        <img src="img/smart.investa.logo2.png" class="logo_img" alt="logo">
    </div>
    <!-- end of logo -->
    <!-- start of form -->
    <div class="center">
        <form class="box" action="#" method="post">
            <div>
                <h1 class="h1_style">Login  </h1>
            </div>
            <div class="icon">
                <i class="fas fa-lightbulb">Login to your dashboard and start investing</i>
            </div>

            <div class="credentials">
                <div>
                    <input type="text" name="name" placeholder="Enter Username or Email" class="login1" required><br>
                    <input type="password" name="Password" placeholder="Enter Password" class="login1" required>
                </div>
               <div class="check">
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </div>
                <input type="submit"  name="Signin" value="Sign in" class="subbtn button">
                <p style="color:red"><?php echo $pasword_username_err ?></p>
            </div>
            <div class="link_reg">
                <a href="forgot.php">Forget password</a><br>
                Don't have an account? <a href="#">Sigh up</a>
            </div>
        
        
        </form>
        <!-- end of form -->
    </div>

</body>
<!-- end of body -->
</html>

