<!DOCTYPE html>
<html>
	<head>
		<title>Web Concepts</title>

	</head>


	<body>

		<h1>Setting Cookies with PHP</h1> 

		<?php

			setcookie("name","Nick Veil",time()+3600,"/","",0);
			setcookie("age","38",time()+3600,"/","",0);
			
		?>

		<?php
			echo "Set Cookies"
		?>
		<h3>Getting the cookies</h3>
		<?php

			echo $_COOKIE["name"]. "<br />";
			//echo $HTTP_COOKIE_VARS["name"]. "<br />";

			echo $_COOKIE["age"]. "<br />";
			//echo $HTTP_COOKIE_VARS["age"]. "<br />";
		?>

</body>
</html>