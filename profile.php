
<div class="col-2 mr-5 px-1 profile">

<?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"] ) :?>
	<img src="pic/user-default.png" class="mx-auto my-4">
	<div id="info" style="font-family: 'Bebas Neue', cursive;">
		<h2>Nice to meet you, but plz login first!</h2>
		<a href="login.php" role="button" class="btn btn-small btn-danger mt-3">Login</a>
	</div>	

<?php else: ?>


	<?php

		$sql="SELECT users.id, username, userpass, teams.team_name AS team, email FROM users JOIN teams ON teams.id=users.teams_id WHERE username='".$_SESSION["username"]."';";
		$result=$mysqli->query($sql);

		if ( !$result ) {
		echo $mysqli->error;
		exit();
		}
		$row=$result->fetch_assoc();

	?>

	<img src="pic/<?php echo $row["team"]; ?>.jpg" class="mx-auto my-4">
	<div id="info" style="font-family: 'Bebas Neue', cursive;">
		<h2>Nice to meet you, Pokémon Trainer <?php echo $row["username"]; ?>!</h2>
		<h4><?php echo $row["email"]; ?></h4>
		<h4>Team <?php echo $row["team"]; ?></h4>
		<a href="logout.php" role="button" class="btn btn-sm btn-secondary">Logout</a>
		<a href="deactivate.php?id=<?php echo $row['id'];?>" role="button" class="btn btn-sm btn-dark" onclick="return confirm('Are you sure you want to deactivate your account?')">Deactivate</a>
	</div>	
<?php endif;?>

</div>