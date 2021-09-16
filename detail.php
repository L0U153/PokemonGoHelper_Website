<?php

	if ( !isset($_GET['id']) || empty($_GET['id']) ) {
		$error = "Invalid DVD ID.";
	}
	else{

	require 'config/config.php';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}
	$mysqli->set_charset('utf8');
	$sql="SELECT pokemons.id,pokemons.name, types1.type AS primary_type, types2.type AS secondary_type, stamina, atk, def, capture_Rate, flee_Rate, spawn_chance, cp, pic, vote FROM pokemons JOIN types as types1 ON types1.id=pokemons.primary_id JOIN types as types2 ON types2.id=pokemons.secondary_id WHERE pokemons.id=".$_GET['id'].";";
	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}
	$row = $results->fetch_assoc();
	$mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pokémon Detail</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli|Bebas+Neue&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>

		.picture{

			display: block;
			padding: 0;
			margin-top: auto;
			margin-bottom: auto;
			text-align: center;

		}
		.text{
			min-width: 270px;
		}

		@media (max-width: 767px){
			.text{
				margin-left: 80px;
			}

		}
		@media (max-width: 991px){
			.layoutHelper{
				display: none;
			}
			.container{
				margin-top: 30px;

			}
			.text h1{
				font-size: 1.5em;
			}

		}
	</style>
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

		<li class="nav-item active">
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

<div class="container" style="text-align: left;">
	<div class="row layoutHelper"></div>
	<div class="row">
		<div class="col-1"></div>
		<div class="col-3-md col-9-sm picture">
			<img src="<?php echo $row['pic'];?>" class="my-auto mx-auto">
		</div>
		
		<div class="col-5-lg ml-2 col-5-md col-12-sm text">
			<h1 class="col-10 mt-3 my-4"><?php echo $row["name"];?></h1>
			<ul>
				<li>Pokédex Number: #<?php echo $row["id"];?></li>
				<li>Primary Type: <?php echo $row["primary_type"];?></li>
				<li>Secondary Type: <?php echo $row["secondary_type"];?></li>
				<li>Stamina: <?php echo $row["stamina"];?></li>
				<li>Attack: <?php echo $row["atk"];?></li>
				<li>Defense: <?php echo $row["def"];?></li>
				<li>Capture Rate: <?php echo $row["capture_Rate"];?></li>
				<li>Flee Rate: <?php echo $row["flee_Rate"];?></li>
				<li>Spawn Chance: <?php echo $row["spawn_chance"];?></li>
				<li>CP: <?php echo $row["cp"];?></li>

			</ul>
		</div>
	</div> <!-- .row -->
	<div class="row mb-5">
		<div class="col-1"></div>
		<div class="col-3 layoutHelper"></div>
		<a href="collection.php" class="btn btn-light">Back to Collection</a>
		<a href="vote.php?id=<?php echo $_GET['id'];?>" class="btn btn-danger ml-2">Vote</a>
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