<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/d5a06c2593.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Muli&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>

		.team-colors  {
			display: flex;
		}
		.team-colors .team-color {
			width: 60px;
			height: 25px;30
			border-radius: 10px;
			margin-right: 10px;
		}
		.team-colors .team-color:nth-child(1) {
			background-color: #ffffcc;
		}
		.team-colors .team-color:nth-child(2) {
			background-color: #99ccff;
		}
		.team-colors .team-color:nth-child(3) {
			background-color: #ffcccc;
		}
		ul, li {
			margin: 0;
			padding: 0;
			list-style: none;
		}
		.error-msg{
			text-align: center;
		}

		@media (max-width: 767px){
			.title-txt{
				font-size: 25px;
			}
			.form-check-inline{
				display: block;
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
<div class="container my-auto">
	<div class="row">
		<h1 class="col-12 mt-4 mb-4 title-txt">Pokémon Manager Register</h1>
	</div> <!-- .row -->
	<form action="register_confirm.php" method="POST" class="form-signin">
		<div class="form-group row">
			<label for="email-id" class="col-sm-3 col-form-label text-sm-right">Email:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="email-id" name="email">
			</div>
		</div> <!-- .form-group -->
		<div class="form-group row">
			<label for="username-id" class="col-sm-3 col-form-label text-sm-right">Username:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="username-id" name="username">
			</div>
		</div> <!-- .form-group -->
		<div class="form-group row">
			<label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password:</label>
			<div class="col-sm-6">
				<input type="password" class="form-control" id="password-id" name="password">
			</div>
		</div> <!-- .form-group -->
		<div class="form-group row">
			<label for="password2-id" class="col-sm-3 col-form-label text-sm-right">Confirm Password:</label>
			<div class="col-sm-6">
				<input type="password" class="form-control" id="password2-id" name="password2">
			</div>
		</div> <!-- .form-group -->
		<div class="form-group row">
			<label for="team-id" class="col-sm-3 col-form-label text-sm-right">Team:</label>


			<div class="col-sm-6 my-auto" id="team-id">
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input mr-1" type="radio" name="team" id="inlineCheckbox1" value="1">Instinct (yellow)
					</label>
				</div>
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input mr-1" type="radio" name="team" id="inlineCheckbox2" value="2">Mystic (blue)
					</label>
				</div>
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input mr-1" type="radio" name="team" id="inlineCheckbox3" value="3">Valor (red)
					</label>
				</div>
			</div>
		</div> <!-- .form-group -->

<!-- 		<div class="form-group row">
			<label for="team-id" class="col-sm-3 col-form-label text-sm-right">Team:</label>
			<ul class="team-colors" >

				<li class="team-color mx-auto" data-color="yellow" value="1">Instinct</li>
				<li class="team-color mx-auto" data-color="blue" value="1">Mystic</li>
				<li class="team-color mx-auto" data-color="red" value="1">Valor</li>
			</ul>
		</div> -->

		<div class="form-group row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 mt-2 mb-4">
				<button type="submit" class="btn btn-primary mx-1">Submit</button>
				<button type="reset" class="btn btn-light mx-1">Reset</button>
			</div>
		</div> <!-- .form-group -->

	</form>

	<div class="row text-danger font-italic">
		<div class="mx-auto">
		<div class="error-msg mx-1"></div>
		<div class="error-msg2 mx-1"></div>
		</div>
	</div>

</div> <!-- .container -->

<div class="container-fluid footer">
	<footer><div class="mb-1 text-muted">&copy; 2019-2020 by Yuzhi Lu for ITP 303</div></footer>	
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
	document.querySelector("#password2-id").oninput=function(){
		let pw1=document.querySelector("#password-id").value;
		let pw2=document.querySelector("#password2-id").value;

		if(pw2!==pw1){
			document.querySelector("#password2-id").classList.add("is-invalid");
			document.querySelector(".error-msg").innerHTML="Inconsistent password!";
		}
		else{
			document.querySelector("#password2-id").classList.remove("is-invalid");
			document.querySelector(".error-msg").innerHTML="";
		}

	}


	document.querySelector(".form-signin").onsubmit = function(event){
		var can_Submit=true;

		let username=document.querySelector("#username-id").value;
		// console.log(username);
		let password1=document.querySelector("#password-id").value;
		// console.log(password1);
		let password2=document.querySelector("#password2-id").value;
		// console.log(password2);
		let email=document.querySelector("#email-id").value;
		// console.log(email);
		


		// $( ".form-check-input" ).on( "click", function() {
		// 	console.log("checked");
		//   var team=$( ".form-check-input:checked" ).val();
		// });
		let team=$( ".form-check-input:checked" ).val();		
		// console.log(team);

		// if(username.length==0 || password1.length==0 ||password2.length==0 || email.length==0 || team.length==0){
		// 	document.querySelector(".error-msg").innerHTML="All fields are required."
		if(!username){
			document.querySelector("#username-id").classList.add("is-invalid");
			can_Submit=false;
		}
		else{
			document.querySelector("#username-id").classList.remove("is-invalid");
		}
		if(!email){
			document.querySelector("#email-id").classList.add("is-invalid");
			can_Submit=false;
		}
		else{
			document.querySelector("#email-id").classList.remove("is-invalid");
		}


		if(!password1){
			document.querySelector("#password-id").classList.add("is-invalid");
			can_Submit=false;
		}
		else{
			document.querySelector("#password-id").classList.remove("is-invalid");
		}
		if(!password2){
			document.querySelector("#password2-id").classList.add("is-invalid");
			can_Submit=false;
		}
		else{
			document.querySelector("#password2-id").classList.remove("is-invalid");
		}

		if(!team){
			document.querySelector(".error-msg2").innerHTML="Please select a team.";
			can_Submit=false;
		}	
		else{
			document.querySelector(".error-msg2").innerHTML="";
		}
		if (document.querySelector(".error-msg").innerHTML!=="") {
			can_Submit=false;
		}		


		if(!can_Submit){
			event.preventDefault();

		}
	}

</script>
</body>
</html>