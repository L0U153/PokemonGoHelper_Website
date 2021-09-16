<?php
require 'config/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$sql="SELECT pokemons.id AS pokedex, pokemons.name, types1.type AS primary_type, types2.type AS secondary_type,pic
FROM pokemons
JOIN types as types1
ON types1.id=pokemons.primary_id
JOIN types as types2
ON types2.id=pokemons.secondary_id
WHERE 1=1";

if(isset($_GET["pokedex"])&&!empty($_GET["pokedex"])){
		$sql=$sql." AND pokemons.id=".$_GET["pokedex"];
	}
if(isset($_GET["name"])&&!empty($_GET["name"])){
	$sql=$sql." AND pokemons.name like '%".$_GET["name"]."%'";
}	
if(isset($_GET["type1"])&&!empty($_GET["type1"])){
	$sql=$sql." AND pokemons.primary_id=".$_GET["type1"];
}

if(isset($_GET["type2"])&&!empty($_GET["type2"])){
	$sql=$sql." AND pokemons.secondary_id=".$_GET["type2"];
}


$sql = $sql . " ORDER BY pokemons.id;";


$result = $mysqli->query($sql);
if( !$result) {
	echo $mysqli->error;
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli|Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">


	<style>
		tbody td{
			margin-top: auto;
			margin-bottom: auto;
		}

		@media (max-width: 767px){

			footer{
				font-size: 12px;
			}
			.layoutHelper{
				display: none;
			}

		}
	</style>
</head class="text-center">
<body>
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

		    <li class="nav-item active">
				<a class="nav-link" href="search.php">Search <span class="sr-only">(current)</span></a>
		    </li>
		</ul>

	    <ul class="navbar-nav ml-auto">
	        <li class="nav-item">
				<a class="nav-link" href="login.php"><span style="color: #A9A9A9;"><i class="fas fa-user"></i></span></a>
		    </li>
		</ul>

	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<h1 class="col-12 mt-4">Pokémon Search Results</h1>
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
	<div class="container-fluid">
		<div class="row mb-4">
			<div class="col-12 mt-4">
				<a href="search.php" role="button" class="btn btn-danger">Back to Search</a>
				<a href="index.php" role="button" class="btn btn-secondary">Back to Home</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row">
			<div class="col-12">

				Showing <?php echo mysqli_num_rows($result); ?> result(s).

			</div> <!-- .col -->
			<div class="col-12">
				<table class="table table-hover table-responsive mt-4">
					<thead>
						<tr>
							<th class="layoutHelper">Vote</th>
							<th>Picture (Hover on me!)</th>
							<th>Pokédex Number</th>
							<th>Pokémon Name</th>
							<th class="layoutHelper">Primary Type</th>
							<th class="layoutHelper">Secondary Type</th>
						</tr>

					</thead>
					<tbody>
						<?php while($row = $result->fetch_assoc() ) : ?>

							<tr>
								<td class="layoutHelper"><a href="vote.php?id=<?php echo $row['pokedex']?>" role="button" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to vote for <?php echo $row['name']?>?')">Vote</a></td>
								
								<td><img src="<?php echo $row['pic']?>" width="70" height="70" alt="<?php echo $row['name']?>" class="pokemon_pic"></td>
								<td>
									<a href="detail.php?id=<?php echo $row['pokedex']?>"> #<?php echo $row["pokedex"] ?>	
									</a>
								</td>
								<td> <?php echo $row["name"] ?> </td>
								<td class="layoutHelper"> <?php echo $row["primary_type"] ?> </td>
								<td class="layoutHelper"> <?php echo $row["secondary_type"] ?> </td>

							</tr>

						<?php endwhile; ?>

					</tbody>
				</table>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->

<div class="container-fluid footer">
	<footer><div class="mb-1 text-muted mx-auto">&copy; 2019-2020 by Yuzhi Lu for ITP 303</div></footer>	
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	$(".pokemon_pic").on( "mouseenter", function() {
  		$(this).css("width", "140");
  		$(this).css("height", "140");
   	});
   	$(".pokemon_pic").on( "mouseout", function() {
  		$(this).css("width", "70");
  		$(this).css("height", "70");
   	});


</script>

</body>
</html>