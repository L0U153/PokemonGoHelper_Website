
<!DOCTYPE html>
<html>
<head>
	<title>Pokémon Manager</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="home_style.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

<style>

	.home{
		height: 80%;
		position: relative;
		text-align: center;
		margin-left: auto;
		margin-right: auto;
		margin-top: 20px;
		max-width: 1100px;
		width: 80%;
		background-image: url("pic/wallpaper.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover; 
	}

	#title{
		position: absolute;
		top:0px;
		left: 0px;
		background-color: rgba(0,0,0,0.5);
		visibility: visible;
		width: 100%;
		height: 100%;
	}


	#title h1{
		font-family: 'Pacifico', cursive;
		font-size: 130px;
		color: white;
		text-align: center;
		margin-top: 30px;
	}

	.search_box .search{
		display: inline;
		margin-left: auto;
		margin-right: auto;
		padding: auto;
	}

	.search_box{
		position: absolute;
		bottom: 25px;
		left: 0px;
	}

	@media (max-width: 767px){
		.home{
		margin-top: 25px;
		min-width: 200px;
		}
		#title h1{
		font-size: 45px;
		margin-top: 60px;
		}

	}


	#search-button:hover {
	  -webkit-animation-name: colorChanging; /* Safari 4.0 - 8.0 */
	  -webkit-animation-duration: 10s; /* Safari 4.0 - 8.0 */
	  animation-name: colorChanging;
	  animation-duration: 10s;
	}

	/* Safari 4.0 - 8.0 */
	@-webkit-keyframes colorChanging {
	  0%  {background-color: #cc0000;}
	  10% {background-color: #cc3399;}
	  20% {background-color: #9933ff;}
	  30% {background-color: #3333cc;}
	  40% {background-color: #0000ff;}
	  50% {background-color: #0066cc;}
	  60% {background-color: #009999;}
	  70% {background-color: #00cc00;}
	  80% {background-color: #99ff33;}
	  90% {background-color: #ff9900;}
	  100% {background-color: #cc0000;}
	}

	/* Standard syntax */
	@keyframes colorChanging {
	  0%  {background-color: #cc0000;}
	  10% {background-color: #cc3399;}
	  20% {background-color: #9933ff;}
	  30% {background-color: #3333cc;}
	  40% {background-color: #0000ff;}
	  50% {background-color: #0066cc;}
	  60% {background-color: #009999;}
	  70% {background-color: #00cc00;}
	  80% {background-color: #99ff33;}
	  90% {background-color: #ff9900;}
	  100% {background-color: #cc0000;}
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
		<li class="nav-item active">
			<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="collection.php">Collection</a>
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


<!-- content -->
<div class="container home">

	<div id="title">

	<h1>Pokémon</br>Manager</h1>

	<!-- search -->
	<div class="container search_box">
		<form action="search_results.php" id="fast_search" method="GET">
			
			<div class="form-group row">
			<div class="col-sm-7 mt-4 search">

				<div class="input-group">
					<input type="text" class="form-control" placeholder="Find Pokémon" id="pokemon_name" name="name">
					<div class="input-group-append">
						<button class="btn btn-danger" type="submit" id="search-button">Search</button>

					</div>
				</div>
			</div>
			</div>

			<div class="form-group row">				
				<div class="col-sm-9 mt-2 search">
					<a href="search.php" class="btn btn-secondary" role="button" id="advSearch">Advanced Search</a>
				</div>
			</div>
			<div class="form-group row">			
				<div class="col-sm-9" style="color:white;visibility: hidden;" id="advSearchTip">
					Search with pokédex or type here.
				</div>
			</div>
		</form>
	</div>
	<!-- END search -->

	</div>
</div>


<div class="container-fluid footer">
	<footer><div class="mb-1 text-muted">&copy; 2019-2020 by Yuzhi Lu for ITP 303</div></footer>	
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script   src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<script>
	document.querySelector("#fast_search").onsubmit=function(event){

		// let tshirtInput=document.querySelector("#tshirt-text").value;
		let input=document.querySelector("#pokemon_name").value;
		console.log(input);

		if(!input){
			document.querySelector("#pokemon_name").classList.add("is-invalid");
			event.preventDefault();
		}
		else{
			// document.querySelector("#tshirt-text-help").style.color="black";
			document.querySelector("#pokemon_name").classList.remove("is-invalid");
		}

	}

	$("#advSearch").on( "mouseenter", function() {
  		$("#advSearchTip").css("visibility","visible");
  	});
  	$("#advSearch").on( "mouseout", function() {
  		$("#advSearchTip").css("visibility","hidden");
  	});


	
	
</script>

</body>
</html>