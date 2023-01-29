<?php
require_once './login.php';
if (isset($_POST['login'])) {
	$username = $_POST['email'];
	$password = md5($_POST['password']);
	$loginData = login($username, $password);
	if (is_array($loginData) && !is_string($loginData)) {
		if (sizeof($loginData) > 0 && isset($loginData['ID'])) {
			header('location: ./index.php');
		} else {
			$_SESSION['msg'] = $loginData;
		}
	} else {
		$_SESSION['msg'] = $loginData;
	}
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="./css/hh1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .socials a:hover i {
            color: #e3001b;
        }

        </style>


</head>

<body>
	<div class="wrapper">
		<nav class="navbar">
			<img class="logo" src="./images/logo.png">
			<ul>
				<li> <a class="active" href="./index.php">Home</a></li>
				<li> <a href="./rent.php">Rent</a>
				<li> <a href="./destination-place.php">Destination Place</a></li>
				<li> <a href="./contact-us.php">Contact Us</a></li>
				<?php

				if (isset($_SESSION['user'])) {
				?>
					<li> <button class='loginbtn'><a href="./logout.php">Logout</a></button></li>

				<?php
				} else {
				?>
					<li> <button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>

				<?php
				}
				?>

			</ul>
		</nav>



		<div id='login-form' class='login-page'>
			<div class="form-box">
				<div class='button-box'>
					<div id='btn'></div>


					<button type='button' onclick='login()' class='toggle-btn'>Log In</button>
					<button type='button' onclick='register()' class='toggle-btn'>Register</button>
				</div>
				<form id='login' method="POST" class='input-group-login'>


					<input type='text' name="email" class='input-field' placeholder='Email Id' required>

					<input type='password' name="password" class='input-field' placeholder='Enter Password' required>

					<input type='checkbox' class='check-box'><span>Remember Password</span>

					<button type='submit' name="login" class='submit-btn'>Log in</button>

				</form>
				<!-- registration form -->
				<form id='register' class='input-group-register' action="./register.php" method="POST">

					<input type='text' name="first_name"  class='input-field' placeholder='First Name' required>


					<input type='text' name="last_name"  class='input-field' placeholder='Last Name' required>


					<input type='email' name="email"  class='input-field' placeholder='Email Id' required>


					<input type='password' name="password"  class='input-field' placeholder='Enter Password' required>


					<input type='checkbox' class='check-box'><span>I agree to terms and conditions </span>

					<button type='submit' name="register" class='submit-btn'>Register</button>
				</form>
			</div>
		</div>
		<script>
			var x = document.getElementById('login');
			var y = document.getElementById('register');
			var z = document.getElementById('btn');

			function register() {
				x.style.left = '-400px';
				y.style.left = '50px';
				z.style.left = '110px';

			}

			function login() {
				x.style.left = '30px';
				y.style.left = '450px';
				z.style.left = '110px';
			}
		</script>
		<script>
			var modal = document.getElementById('login-form');
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";

				}

			}
		</script>


		<div class="center">

			<h1>Welcome To Bike Rental Company </h1>
			<h2>Rent Your Bike Now </h2>
			<div class="buttons">
				<a href="./rent.php"> Let's To Rent! &#8594</a>

			</div>


		</div>




	</div>
	<footer>
		<div class="footer-content">
			<h3>Bike Rental</h3>
			<p>website that mange you to rent your bike for some time for go to any place you want it and back it .</p>
			<ul class="socials">
				<li><a href="https://www.facebook.com/hosny.ishtaya"><i class="fab fa-facebook" ></i> </a></li>
				<li><a href="https://www.instagram.com/hosny_ishtaya"><i class="fab fa-twitter"></i></a></li>
				<li><a href="https://www.instagram.com/hosny_ishtaya"><i class="fab fa-instagram"></i></a></li>
				<li><a href="https://youtube.com/c/codingnepal"><i class="fab fa-youtube"></i></a></li>
				<li><a href="https://www.instagram.com/hosny_ishtaya"><i class="fab fa-linkedin"></i></a></li>
			</ul>
		</div>
		<div class="footer-bottom" style="background: #000" >
			<p style="font-size: 15px; color: white" > copyright &copy;2020 codeOpacity. designed by Hosny & Dana  </p>
		</div>
	</footer>

<s





</body>

</html>