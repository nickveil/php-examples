<!DOCTYPE html>
<html>
	<head>
		<title>Web Concepts</title>

	</head>


	<body>

		<h1>Get and POST Methods</h1> 

		<?php
			// Get Method is not secure never use for passwords or sensitive info
			if (isset($_GET["name"]) || isset($_GET["age"])){

				echo "Welcome ".$_GET["name"]."<br >";
				echo "You are ". $_GET["age"]. " years old.";
				// $server = $_SERVER['PHP_SELF'];
				// echo $server;
				exit();
			}
		?> 
		<h3>GET Method</h3>
		<form action="<?php $_PHP_SELF ?>" method = "GET"> <!-- $_PHP_SELF is a global var that returns 
																														filename of currently executing script -->
			Name: <input type = "text" name="name" />
			Age: <input type="text" name="age" />
			<input type="submit" />
		</form>	


		<?php 
		// POST Method. A bit more secure than GET method but sends through HTTP Header
		// Security depends on HTTP protocol

			if ( isset($_POST["name"]) || isset($_POST["age"] )) {
				if (preg_match("/[^A-Za-z'-]/", $_POST['name'] )) {
					die("Invalid name. Name must be alpha.");
				}

				echo "Welcome ".$_POST['name']. "<br/>";
				echo "Your are ". $_POST['age']. " years old.";

				exit();
			}
		?>

		<h3>POST Method</h3>
		<form action="<?php $_PHP_SELF ?>" method="POST">
			Name: <input type="text" name="name" />
			Age: <input type="text" name="age" />
			<input type="submit" />
		</form>


		<?php
	   if( isset($_REQUEST["name"]) || isset($_REQUEST["age"]) ) {
	      echo "Welcome ". $_REQUEST['name']. "<br />";
	      echo "You are ". $_REQUEST['age']. " years old.";
	      exit();
		   }
		?>

		<h3>REQUEST Method</h3>
		<form action = "<?php $_PHP_SELF ?>" method = "POST">
       Name: <input type = "text" name = "name" />
       Age: <input type = "text" name = "age" />
       <input type = "submit" />
    </form>

</body>
</html>