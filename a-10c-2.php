<!DOCTYPE html>
<html>
<head>
	<title>DCS</title>

	<meta charset="UTF-8">
	<meta name="description" content="DCS World Documentation">
	<meta name="keywords" content="DCS, World, Documentation">
	<meta name="author" content="PEREGRINES">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body>

	<div class="container">

		<div class="title">
			
			<a class="return" href="index.php">
				<?php
					include 'img/return.svg';
				?>
			</a>

			<h1>A-10C II</h1>

		</div>

		<img class="banner" src="img/modules/a-10c-2/a-10c-2-banner.jpg" alt="A-10C II">

		<nav>
			
			<a href="#coldstart">Cold Start</a>

		</nav>

		<div id="coldstart" class="content">
			
			<h2>Cold Start</h2>

			<div class="procedure">
				
				<?php

					$coldstartFilesRaw = scandir( 'img/modules/a-10c-2/coldstart/' );
					$coldstartFiles = array_diff($coldstartFilesRaw, array('.', '..'));

					sort($coldstartFiles, SORT_NATURAL);

					$comments = [
						19 => 'Only after rearm!'
					];

					foreach ( $coldstartFiles as $c => $file ) {
						
						$c++;

						echo( '<div class="step">
							<p>' . $c . '.' );

						if ( isset($comments[$c]) ){
							echo( ' ' . $comments[$c] );
						}

						echo( '</p>
							<img src="img/modules/a-10c-2/coldstart/' . $file . '">
						</div>');
					}

				?>

			</div>

		</div>

	</div>

</body>
</html>