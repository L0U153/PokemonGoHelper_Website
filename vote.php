<?php
$isVoted = false;
if ( !isset($_GET['id']) || empty($_GET['id'])) {
	$error = "Invalid pokemon.";
}
else {
	require 'config/config.php';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	$sql1 = "SELECT * FROM pokemons WHERE id = " . $_GET["id"] . ";";
	$result1 = $mysqli->query($sql1);
	if(!$result1) {
		echo $mysqli->error;
		exit();
	}
	$row1=$result1->fetch_assoc();

	$voteNum=(int)$row1["vote"];
	$voteNum++;


	$sql2 = "UPDATE pokemons SET vote=".$voteNum." WHERE id=" . $_GET["id"] . ";";
	$result2 = $mysqli->query($sql2);
	if(!$result2) {
		echo $mysqli->error;
		exit();
	}


	if ($mysqli->affected_rows == 1) {
		$isVoted = true;
	}
	$mysqli->close();
}


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

	<style>
		#picture{
			
			position: relative;
			text-align: center;
/*			margin-left: auto;
			margin-right: auto;*/
		}

		#picture img{
			display: block;
/*			margin-left: auto;
			margin-right: auto;*/
		}
		#thank{
			width: 100%;
			height: 100%;
			visibility: hidden;
			position: absolute;
			top:0px;
			left: 0px;
			margin-left: auto;
			margin-right: auto;
		}

		#thank h4{
			font-size: 20px;
			margin-top: 40%;
			margin-left: auto;
			margin-right: auto;
		}

		#picture:hover #thank{
			background-color: rgba(0,0,0,0.5);
			visibility: visible;
			color: white;
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
	<div class="row my-3">
		<div id="picture">
			<img src="<?php echo $row1['pic'];?>" alt="<?php echo $row1['name'];?>">
			<div id="thank">
				<h4>Thank you for voting for me~</h4>
			</div>
		</div>
	</div>
	<div class="row">
	</div>
	<div class="row mx-auto">
		<?php if ( isset($error) && !empty($error) ) : ?>
			<div class="text-danger">
				<?php echo $error; ?>
			</div>
		<?php endif; ?>

		<?php if ( $isVoted ) :?>
			<div class="text-success">You have successfullly voted for <span class="font-italic"><?php echo $row1['name']; ?></span>.</div>
		<?php endif; ?>
	</div>
	<div class="row my-2 mx-auto">
		<a href="index.php" role="button" class="btn btn-outline-dark col-sm-9 mx-2 my-2 col-md-1">Home</a>
		<a href="collection.php" role="button" class="btn btn-outline-dark mx-2 col-sm-9 my-2 col-md-1">Collection</a>
		<a href="search_results.php" role="button" class="btn btn-outline-dark mx-2 col-sm-9 my-2 col-md-1">Results</a>
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