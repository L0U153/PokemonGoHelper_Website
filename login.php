<?php
	session_start();

	// If user is already logged in, kick them out of this page. Never let them log in again. Else, proceed with login.
	if( isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
		// Redirect user to the home page
		header("Location: ../final_project/collection.php");
	}
	else {
		// Check that the user has submitted a form (as opposed to user who just got to the page)
		if( isset($_POST["username"]) &&  isset($_POST["password"])) {
			// User has attempted to log in - now check for two more cases
			// 1. Validation - make sure user has entered a username & password
			if( !empty($_POST["username"]) && !empty($_POST["password"])) {

				require 'config/config.php';
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				if( $mysqli->connect_errno ) {
					echo $mysqli->connect_error;
					exit();
				}
				$sql="SELECT username, userpass AS password FROM users WHERE username='".$_POST["username"]."';";
				// echo $sql;
				$result = $mysqli->query($sql);
				if ( !$result ) {
					echo $mysqli->error;
					exit();
				}
				$info=$result->fetch_assoc();
				// var_dump($info);

				// 2. Authentication - make sure user has entered the CORRECT username and password. Assume there is only one user. 
				if($_POST["password"] == $info["password"]) {
					// User has typed in correct username and password, store info in session.
					$_SESSION["logged_in"] = true;
					$_SESSION["username"] = $_POST["username"];
					// Redirect the user to the home page.
					header("Location: ../final_project/collection.php");
				}
				// Authentication has failed
				else {
					$error = "Invalid username or password";
				}

			}
		
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
<style>

		.signin{
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			margin-top: 8%;
		}
		.signin h1{
			text-align: center;
		}

/*		.form-signin {
		  width: 100%;
		  max-width: 330px;
		  padding: 15px;
		  margin: auto;
		}
*/
		.form-signin input{
			margin-top: 10px;
		}

		@media (max-width: 767px){
			.title-txt{
				font-size: 25px;
			}
			#surprise-img{
				width: 50px;
				height: 50px;
			}
			#surprise-txt{
				font-size:15px;
			}

		}


	</style>
</head>
<body class="text-center">

<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="background-color: #141f29;">
	  <a class="navbar-brand" href="index.php"><div style="font-family: 'Pacifico', cursive;">Pokémon Manager</div></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Home</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="collection.php">Collection</a>
			</li>

		    <li class="nav-item">
				<a class="nav-link" href="search.php">Search</a>
		    </li>
		</ul>

	    <ul class="navbar-nav ml-auto">
	        <li class="nav-item active">
				<a class="nav-link" href="login.php"><span style="color: #f7f7f7;"><i class="fas fa-user"></i></span> <span class="sr-only">(current)</span></a>
		    </li>
		</ul>

	  </div>
</nav>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Login</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<!-- Postback - submit form to itself -->
		<form action="login.php" method="POST" class="form-signin">

			<div class="row mb-3">
				<div class="mx-auto">
					<div class="font-italic text-danger col-sm-9 col-md-12 error-message">
						<?php 
							if(isset($error) && !empty($error)) {
								echo $error;
							}
						?>
					</div>
					<div class="font-italic text-danger col-sm-9 col-md-12 error-message2">
						
					</div>
				</div>
			</div> <!-- .row -->
			

			<div class="form-group row">
				<label for="username-id" class="col-sm-3 col-form-label text-sm-right">Username:</label>
				<div class="col-md-6 col-sm-9">
					<input type="text" class="form-control" id="username-id" name="username">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password:</label>
				<div class="col-md-6 col-sm-9">
					<input type="password" class="form-control" id="password-id" name="password">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-9 mt-2 mx-auto">
					<button type="submit" class="btn btn-outline-primary">Login</button>
					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-outline-secondary">Cancel</a>
				</div>
			</div> <!-- .form-group -->
		</form>

	</div> <!-- .container -->

	<div class="container">
		<div class="row mt-2">
			<div class=" mx-auto">
				<a href="register.php" role="button" class="btn btn-outline-danger mr-1">Register</a>
			</div>

		</div> <!-- .row -->
	</div> <!-- .container -->

<div class="container-fluid footer">
	<footer><div class="mb-1 text-muted">&copy; 2019-2020 by Yuzhi Lu for ITP 303</div></footer>	
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

	document.querySelector(".form-signin").oninput = function(event){
		let username=document.querySelector("#username-id").value;
		let password=document.querySelector("#password-id").value;

		if(!username && !password){
			document.querySelector(".error-message2").innerHTML = "Please fill out all required fields.";
			document.querySelector("#username-id").classList.add("is-invalid");
			document.querySelector("#password-id").classList.add("is-invalid");
			
		}
		else if(!username){
			document.querySelector(".error-message2").innerHTML = "Please fill out username.";
			document.querySelector("#username-id").classList.add("is-invalid");
			document.querySelector("#password-id").classList.remove("is-invalid");
		}
		else if(!password){
			document.querySelector(".error-message2").innerHTML = "Please fill out password.";
			document.querySelector("#password-id").classList.add("is-invalid");
			document.querySelector("#username-id").classList.remove("is-invalid");
		}
		else{
			document.querySelector(".error-message2").innerHTML = "";
			document.querySelector("#username-id").classList.remove("is-invalid");
			document.querySelector("#password-id").classList.remove("is-invalid");
		}
	}

	document.querySelector(".form-signin").onsubmit = function(event){
		console.log("submit");
		let username=document.querySelector("#username-id").value;
		let password=document.querySelector("#password-id").value;

		if(!username && !password){
			event.preventDefault();
			document.querySelector(".error-message2").innerHTML = "Please fill out all required fields.";
			document.querySelector("#username-id").classList.add("is-invalid");
			document.querySelector("#password-id").classList.add("is-invalid");
			
		}
		else if(!username){
			document.querySelector(".error-message2").innerHTML = "Please fill out username.";
			document.querySelector("#username-id").classList.add("is-invalid");
			event.preventDefault();
		}
		else if(!password){
			document.querySelector(".error-message2").innerHTML = "Please fill out password.";
			document.querySelector("#password-id").classList.add("is-invalid");
			event.preventDefault();
		}
		else{
			document.querySelector(".error-message2").innerHTML = "";
			document.querySelector("#username-id").classList.remove("is-invalid");
			document.querySelector("#password-id").classList.remove("is-invalid");
		}
	}

</script>

</body>
</html>