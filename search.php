<?php
require 'config/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$result1 = $mysqli->query("SELECT * FROM types;");
if( !$result1) {
		echo $mysqli->error;
		exit();
}
$result2 = $mysqli->query("SELECT * FROM types;");
if( !$result2) {
		echo $mysqli->error;
		exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Advanced Search</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>

		.form-check-label {
			padding-top: calc(.5rem - 1px * 2);
			padding-bottom: calc(.5rem - 1px * 2);
			margin-bottom: 0;
		}
		#surprise-txt{
			color: #ee1515;
			font-size: 20px;
			margin-left: auto;
			margin-right: auto;
			visibility: hidden;
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
				min-height: 30px;
			}
			footer{
				font-size: 12px;
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

	<div class="container my-auto">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4 title-txt">Pokémon Advanced Search</h1>
		</div> <!-- .row -->
		<form action="search_results.php" method="GET">
			<div class="form-group row">
				<label for="pokedex-id" class="col-sm-3 col-form-label text-sm-right">Pokédex Number:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pokedex-id" name="pokedex">
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="name-id" class="col-sm-3 col-form-label text-sm-right">Pokémon Name:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="name-id" name="name">
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="type1-id" class="col-sm-3 col-form-label text-sm-right">Primary Type:</label>
				<div class="col-sm-6">
					<select name="type1" id="type-id1" class="form-control">
						<option value="" selected>-- All --</option>

						<?php while( $row = $result1->fetch_assoc() ) : ?>

							<option value="<?php echo $row['id'] ?>"> <?php echo $row["type"] ?> </option>

						<?php endwhile; ?>	

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="type2-id" class="col-sm-3 col-form-label text-sm-right">Secondary Type:</label>
				<div class="col-sm-6">
					<select name="type2" id="type2-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php while( $row = $result2->fetch_assoc() ) : ?>

							<option value="<?php echo $row['id'] ?>"> <?php echo $row["type"] ?> </option>

						<?php endwhile; ?>	

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6 mt-2">
					<button type="submit" class="btn btn-danger">Search</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->

			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6 surprise mt-2">
					<a href="detail.php?id=<?php echo rand(1,145); ?>"><img id="surprise-img" src="pic/pokeball.png" width="80" height="80"></a>
				</div>
			</div> <!-- .form-group -->
			<div class="row" style="min-height: 40px;">
				<div class="col-sm-6" id="surprise-txt"> Surprise Me <span style="color: #ee1515;"><i class="fas fa-random"></i></span></div>
			</div> 
		</form>
	</div> <!-- .container -->

	<div class="container-fluid footer">
		<footer><div class="mb-1 text-muted mx-auto">&copy; 2019-2020 by Yuzhi Lu for ITP 303</div></footer>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
	  	$("#surprise-img").on( "mouseenter", function() {
  		$("#surprise-txt").css("visibility",  "visible");
  	});
  	$("#surprise-img").on("mouseleave", function() {
  		$("#surprise-txt").css("visibility",  "hidden");
  	});
</script>

</body>
</html>