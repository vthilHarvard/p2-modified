<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>XKCD password generator</title>
	<link rel="stylesheet" href="css/bootstrap_superhero.min.css" />
	<link rel="stylesheet" href="css/custom.css" media="screen"/>
	<?php require 'logic.php'; ?>
</head>
<body>
  <div class="container-fluid ">
		<div class="jumbotron text-center">
		<h1 class="text-info">xkcd password generator</h1>
		<h2 class="text-center">Vani Thilagar</h2>
	</div>
	<div class="row">
	<div class="col-md-4">
		<img class="img-center" src="images/Scrabble_game_in_progress.jpg" alt="scrabble image" />
	</div>
	<div class="col-md-8">
		<br/><br/>
	<form class="form-horizontal form_prop" method='POST' action='index.php'>
		<div class="form-group">
			<label for="word_count" class="col-sm-2 control-label">Number of words</label>
			<input id="word_count" type="number" size="6" name="word_count" min="2" max="5"
			value="<?php echo (isset($_POST['word_count']) ? $_POST['word_count'] : 2); ?>" />

		</div>
		<div class="form-group">
				<label for="special_char" class="col-sm-2 control-label">Add Special character</label>
				<input id="special_char" type="checkbox" name="special_char"
				value="TRUE" <?php echo (isset($_POST['special_char']) ? "checked" : ""); ?> />
		</div>
		<div class="form-group">
				<label for="add_number" class="col-sm-2 control-label">Add a number</label>
				<input id="add_number" type="checkbox" name="add_number" value="TRUE"
				<?php echo (isset($_POST['add_number']) ? "checked" : ""); ?> />
		</div>
		<div class="form-group">
				<label for="change_case" class="col-sm-2 control-label">Upper case for even words</label>
				<input id="change_case" type="checkbox" name="change_case" value="TRUE"
				<?php echo (isset($_POST['change_case']) ? "checked" : ""); ?> />
		</div>
		<input class = "btn btn-default" type='submit' value='Display a password!'>

	</form>

	<br/>

	<?php
		if (strlen($password_string) > 0)
		{
			/*echo "Word count was ", $word_count," <br />";
			echo "Special characer was ",($special_char == TRUE) ? 'set.': 'not set.';
			echo "<br />Numbers were ",($add_number == TRUE) ? 'appended': 'not appended.';
			echo "<br />Even Words case was ",($change_case == TRUE) ? 'changed': 'not changed.'; */
			echo "<h3 class='text-info'>Your new password is ".$password_string."</h3>";
		}
		else {
			echo "<h3 class='text-info'>Password is not created yet.</h3>";
		}

	?>
	</div>
	</div>  <!-- class = row -->
	<div class="row">
		<footer class="text-center">
				<h4 class="text-danger">Created using Bootstrap theme Superhero</h4>
				<h4 class="text-info"><a href="https://commons.wikimedia.org/wiki/File%3AScrabble_game_in_progress.jpg" class="text-center">Image From Creative Commons</a><br/></h4>
				<h4>Copyright thilagar.me</h4>
		</footer>
	</div>
	</div> <!-- container fluid -->
</body>
</html>
