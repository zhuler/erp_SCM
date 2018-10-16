<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Inventory</title>

        

        <!-- Our CSS stylesheet file -->

        <link rel="stylesheet" href="styles.css" />

        

        <!--[if lt IE 9]>

          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

        <![endif]-->
        <style>
        button{
	
		/* button */
	
		opacity:0.9;
		position:absolute;
		top:342px;
		left:25px;
		width: 239px;
		height:36px;
		cursor:pointer;
		border-radius:6px;
		box-shadow:0 1px 1px #888;
		border:none;
		color:#fff;
		font:14px/36px 'Segoe UI Light','Segoe UI',Arial,sans-serif;
	
		/* CSS3 Gradients */
	
		background-image: linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
		background-image: -o-linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
		background-image: -moz-linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
		background-image: -webkit-linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
		background-image: -ms-linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
	
		background-image: -webkit-gradient(
			linear,
			left bottom,
			left top,
			color-stop(0.5, rgb(80,102,127)),
			color-stop(0.5, rgb(87,109,136)),
			color-stop(1, rgb(106,129,155))
		);
		}

		#formContainer{
			height:400px;
		}	
        </style>


    </head>

    

<body>
<div style="margin:0 auto; width:300px; padding-left: 32px; margin-top:50px;">
	<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
echo '<ul class="err">';
foreach($_SESSION['ERRMSG_ARR'] as $msg) {
echo '<li>',$msg,'</li>';
}
echo '</ul>';
unset($_SESSION['ERRMSG_ARR']);
}

if(isset($_GET['id']))
	{
		$remark=$_GET['id'];
		if($remark=='success')
		{
		echo '<ul>';
		echo '<li>'." Registration Success You can now login ".'</li>';
		echo '</ul>';
		}
	}

?>
</div>


		<div id="formContainer">

			<form id="login" method="post" action="login.php">

				<a href="#" id="flipToRecover" class="flipLink">Forgot?</a>

				<input type="text" name="username" id="loginEmail" placeholder="Username" />

				<input type="password" name="password" id="loginPass" placeholder="Password" />

				<input type="submit" name="submit" value="Login" />

				<button onclick="location.href='../../index.php'" type="button">Back to Portal</button>

			</form>

			<form id="recover" method="post" action="register.php">

				<a href="#" id="flipToLogin" class="flipLink">Forgot?</a>
				<input type="text" name="adminpass" id="loginEmail" placeholder="Admin Password" style="top: 138px;" />
				<input type="text" name="regusername" id="loginEmail" placeholder="Username" />
				<input type="password" name="regpassword" id="recoverEmail" placeholder="Password" />

				<input type="submit" name="submit" value="Save" />

			</form>

		</div>



    <!-- JavaScript includes -->

	<script src="jquery-1.7.1.min.js"></script>

		<script src="script.js"></script>


    

</body>

</html>



