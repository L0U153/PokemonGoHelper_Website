<?php

require 'config/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

// var_dump($_POST);
$team=(int)$_POST["team"];
// var_dump($team);


//validate infomation
$sql="SELECT username, userpass AS password FROM users WHERE username='".$_POST["username"]."';";
$result = $mysqli->query($sql);
if ( !$result ) {
	echo $mysqli->error;
	exit();
}
if($mysqli -> affected_rows!==0){
	$error="Your username has been taken.";
}
else{
	$error="";

	//create new user
	$sql_prepared = "INSERT INTO users (username, userpass, teams_id,email) VALUE(?,?,?,?);";
	$statement = $mysqli->prepare($sql_prepared);

	$statement->bind_param("ssis", $_POST["username"], $_POST["password"],$team, $_POST["email"]);
	$executed = $statement->execute();

	if(!$executed) {
		echo $mysqli->error;
		$error="Oops, something is wrong...";
	}

	$statement->close();
}

$mysqli->close();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Vote</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli|Bebas+Neue&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body class="text-center">

<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="background-color: #141f29;">
  <a class="navbar-brand" href="index.php"><img src="pic/pokeball.png" width="30" height="30" alt="Pokémon Manager"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="index.php">Home</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="collection.php">Collection<span class="sr-only">(current)</span></a>
		</li>

	    <li class="nav-item">
			<a class="nav-link" href="search.php">Search</a>
	    </li>
	</ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
			<a class="nav-link" href="login.php"><span style="color: #A9A9A9;"><i class="fas fa-user"></i></span></a>
	    </li>
	</ul>

  </div>
</nav>

<div class="container mx-auto">
	<div class="row">
	</div>
	
		<?php if ( isset($error) && !empty($error) ) : ?>
		<div class="row mx-auto">
			<div class="text-danger my-5">
				<?php echo $error; ?>
			</div>
		</div>
		<?php else: ?>
			<div class="row mx-auto">
				<div class="text-success my-5">
					Welcome to Pokémon Manager!
				</div>
			</div>
			<div class="row mx-auto">
				<div class="text-muted my-2">
					 Please Login <a href="login.php">here</a>.
				</div>
			</div>
		<?php endif;?>


	<div class="row my-2 mx-auto">
		<a href="login.php" role="button" class="btn btn-outline-dark mx-1">Login</a>
		<a href="index.php" role="button" class="btn btn-outline-dark mx-1">Home</a>
		<a href="collection.php" role="button" class="btn btn-outline-dark mx-1">Collection</a>
	</div>

</div>


<div class="container-fluid footer">
	<footer><div class="mb-1 text-muted mx-auto">&copy; 2019-2020 by Yuzhi Lu for ITP 303</div></footer>	
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>