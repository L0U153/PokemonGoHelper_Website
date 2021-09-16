<?php
session_start();

function nextPage($page_num,$totalPage){
	$page_num++;
	if($page_num>$totalPage){
		$page_num=$totalPage;
	}
	echo $page_num;
}
function prevPage($page_num){
	$page_num--;
	if($page_num<1){
		$page_num=1;
	}
	echo $page_num;
}

if(!isset($page_num)||empty($page_num)){
	if(isset($_GET["page"])&& !empty($_GET["page"])){
		$page_num=(int)$_GET["page"];
	}
	else{
		$page_num=1;
	}
}

require 'config/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$index=3*$page_num-3;
$sql="SELECT pokemons.id AS pokedex, pokemons.name, types1.type AS primary_type, types2.type AS secondary_type, pic, vote FROM pokemons
JOIN types as types1
ON types1.id=pokemons.primary_id
JOIN types as types2
ON types2.id=pokemons.secondary_id
ORDER BY vote DESC 
LIMIT ".$index.",3";
// echo $sql;

// LIMIT ".$page_num

$results = $mysqli->query($sql);
if ( !$results ) {
	echo $mysqli->error;
	exit();
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Collection</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli|Bebas+Neue&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
		.profile img, #info h4{
			display: block;
		}
		.profile{
			background-color: #f7f7f7;
			/*height: 600px;*/
			/*position: absolute;*/
			margin:5px;
			padding: 8px;
		}
		.profile img{

			max-width: 200px;
			/*margin-top: 40px;
			margin-bottom: 40px;*/
			position: relative;
			width:75%;
		}
		.content{
			height: 88%;
			display: inline;
		}
		.collection{
			margin-top:5px;
			/*background-color: green;*/
			/*height: 500px;*/
			/*position: absolute;
			text-align: left;*/
		}
		#page{
			display: inline;
			position: fixed;
			bottom: 25px;
			right:55px;
		}


		@media (max-width: 991px){
			.profile{
				display: none;
			}
		}
		@media (max-width: 767px){

			.layouthelper{
				margin: 0px;
				/*display: none;*/
			}
			.footer{
				font-size: 12px;
			}
			.collection{
			margin-bottom: 60px;
			margin-left: auto;
			margin-right: auto;
			
			}
			#page{
				display: flex;
				justify-content: center;
				align-items: center;
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

<div class="container-fluid content">
	<div class="row">
		<div class="mx-4 layouthelper"></div>
		<?php include 'profile.php'; ?>

		<div class="col-8 mx-2 collection container ml-5">
			<div class="form-group row">
				<div class="card-deck">
				<?php while($row = $results->fetch_assoc()):?>
				  <div class="card text-white bg-dark" style="min-width: 11rem; max-width: 17rem;">
				    <img class="card-img-top px-3 py-3" src="<?php echo $row['pic']?>" alt="<?php echo $row['name'];?> image cap" style="max-height: 250px;">
				    <div class="card-body">
				      <h5 class="card-title"><strong><?php echo $row['name']?></strong></h5>
				      <p class="card-text">Type: <?php echo $row['primary_type']?> | <?php echo $row['secondary_type']?></p>
				      <p class="card-text">Vote: <?php echo $row['vote']?></p>
				      <p class="card-text"><small class="text-muted">#<?php echo $row['pokedex']?></small></p>
				      <a href="detail.php?id=<?php echo $row['pokedex']?>" class="btn btn-danger">Detail</a>
				      <a href="vote.php?id=<?php echo $row['pokedex']?>" role="button" class="btn btn-light" onclick="return confirm('Are you sure you want to vote for <?php echo $row['name']?>?')">Vote</a>
				    </div>
				  </div>
				<?php endwhile; ?>

			<div id="page" style="font-size:14px;">
				<a href="collection.php?page=<?php echo prevPage($page_num);?>" class="btn btn-sm btn-light">Prev</a>
				Page <?php echo $page_num;?> 
				<a href="collection.php?page=<?php echo nextPage($page_num,49);?>" class="btn btn-sm btn-light">Next</a>
			</div>
			</div>
				</div>


		</div>
		<!-- <div class="col-1"></div> -->
	</div>
</div>


<div class="container-fluid footer">
	<footer><div class="mb-1 text-muted">&copy; 2019-2020 by Yuzhi Lu for ITP 303</div></footer>	
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
	$("#advSearch").on( "mouseenter", function() {
  		$("#advSearchTip").css("visibility","visible");
  	});
  	$("#advSearch").on( "mouseout", function() {
  		$("#advSearchTip").css("visibility","hidden");
  	});

</script>

</body>
</html>