<!DOCTYPE html>
<html>
	<head>
		<title>Web Concepts</title>

	</head>


	<body>

		<h1>Identify Browser and Platform</h1>

		<?php
			function getBrowser(){
				$u_agent = $_SERVER['HTTP_USER_AGENT']; // $_SERVER - contains info from the web server (headers, paths, and scripts)
				$bname = 'Unknown';
				$platform = 'Unknown';
				$version ='';
			

				// Platform

				if (preg_match('/linux/i',$u_agent)){ //
					$platform = 'linux';
				}elseif (preg_match('/macintosh|mac os x/i', $u_agent)){
					$platform = 'mac';
				}elseif (preg_math('/windows|win32/i',$u_agent)) {
					$platform = 'windows';
				}


				// useragent name 

				if(preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)){
					$bname = 'Internet Explorer';
					$ub = "MSIE";
				} elseif(preg_match('/Firefox/i', $u_agent)){
					$bname = 'Mozilla Firefox';
					$ub = "Firefox";
				} elseif(preg_match('/Chrome/i', $u_agent)){
					$bname = 'Google Chrome';
					$ub = "Chrome";
				} elseif(preg_match('/Safari/i', $u_agent)){
					$bname = 'Apple Safari';
					$ub = "Safari";
				} elseif(preg_match('/Opera/i', $u_agent)){
					$bname = 'Opera';
					$ub = "Opera";
				} elseif(preg_match('/Netscape/i', $u_agent)){
					$bname = 'Netscape';
					$ub = "Netscape";
				} 

				// version number
				$known = array('Version',$ub, 'other');
				$pattern = '#(?<browser>'. join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

				if (!preg_match_all($pattern,$u_agent,$matches)) {
					// not match , continue
				}

				// check how many
				$i = count ($matches['browser']);

				if ($i!= 1) {
					// there are 2, not using 'other' arg yet

					// check if version is before or after name

					if(strripos($u_agent,"Version") < strripos($u_agent,$ub)){ // strripos = Find the position of the last occurrence of a case-insensitive substring in a string
						$version = $matches['version'] [0];
					}else {
						$version = $matches['version'] [1];
					}
				}else {
					$version= $matches['version'] [0];
				}

				// check for number

				if ($version == null || $version == "") {$version = "?";}
				return array(
					'userAgent' => $u_agent,
					'name' => $bname,
					'version' => $version,
					'platform' => $platform,
					'pattern' => $pattern
				);
			}

			// try it

			$ua = getBrowser();
			$yourbrowser = "Your Browser: " . $ua['name'] . " " . $ua['version'] . " on " . $ua['platform'] . " reports: <br >" . $ua['userAgent'];

			print_r($yourbrowser);
		?>

		<h1>Display random images</h1>

		<?php

			srand( microtime() * 1000000 ); // seeds rand num generator 
			$num = rand(1,5);

			switch ($num) {
				case 1:
					$image_file = "img/bella.jpg";
					break;
			
				case 2:
					$image_file = "img/buzz.jpg";
					break;

				case 3:
					$image_file = "img/garden.jpg";
					break;

				case 4:
					$image_file = "img/keyboard.jpg";
					break;

				case 5:
					$image_file = "img/output.png";
					break;

			}
			echo "Random Image: <img width='120' height='120' src=$image_file /><br >";
			echo "Image Number: <h3>$num</h3>";
		?>

		<h1>Using HTML Forms</h1>

		<?php

			function GetAge($date){
				
				$givenDate = date_parse($date);
				$givenYear = $givenDate['year'];
				return 2017 - $givenYear;
			};

			if( isset($_POST["name"]) || isset($_POST["age"]) ) { // needed to use isset function to avoid Undefined index error
				if (preg_match("/[^A-Za-z'-]/", $_POST['name'])){
					die("Invalid name. Alpha characters only please.");
				}

				echo "Hello ". $_POST['name']. "<br />";
				echo "You are ". GetAge($_POST['date']). " years old.";

				exit();
			};

		?>



		<form action="<?php $_PHP_SELF ?>" method = "POST">
			Name: <input type = "text" name = "name" placeholder="Letters only" />
			<!-- Age: <input type = "text" name = "age" /> -->
			Birth Date: <input type = "date" name = "date" placeholder="mm/dd/yyyy" />
			<input type="submit"/>
		</form>










</body>
</html>