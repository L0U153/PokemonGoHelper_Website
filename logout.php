<?php
	// To destory a session, first need to start a session.
	session_start();
	// Destroys any session variables. Use this to "log out"
	session_destroy();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
<style>

		.bye{
			height: 60%;
		}
		#bye-text{
			font-family: 'Pacifico', cursive;
			font-size: 200px;
			color: #141f29;
			margin-top: 30px;
		}

		@media (max-width: 991px){
			#bye-text{
				margin-top: 70px;
				font-size: 40px;
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

<div class="container bye" >

	<h1 id="bye-text">Bye bye!</h1>

</div>


<div class="container">
	<a href="login.php" role="button" class="btn btn-outline-danger">Login</a>
	<a href="index.php" role="button" class="btn btn-outline-secondary">Back to Home</a>
</div>

<div class="container-fluid footer">
	<footer><div class="mb-1 text-muted">&copy; 2019-2020 by Yuzhi Lu for ITP 303</div></footer>	
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>