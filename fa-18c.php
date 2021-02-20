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

			<h1>F/A-18C</h1>

		</div>

		<img class="banner" src="img/modules/fa-18c/fa-18c-banner.jpg" alt="F/A-18C">

		<nav>
			
			<a href="#coldstart">Cold Start</a>
			<a href="#landing">Landing</a>

		</nav>

		<div id="coldstart" class="content">
			
			<h2>Cold Start</h2>

			<div class="procedure">
				
				<?php

					$coldstartFilesRaw = scandir( 'img/modules/fa-18c/coldstart/' );
					$coldstartFiles = array_diff($coldstartFilesRaw, array('.', '..'));

					sort($coldstartFiles, SORT_NATURAL);

					$comments = [
						5 => 'When RPM over 20%',
						14 => 'When RPM over 20%'
					];

					foreach ( $coldstartFiles as $c => $file ) {
						
						$c++;

						echo( '<div class="step">
							<p>' . $c . '.' );

						if ( isset($comments[$c]) ){
							echo( ' ' . $comments[$c] );
						}

						echo( '</p>
							<img src="img/modules/fa-18c/coldstart/' . $file . '">
						</div>');
					}

				?>

			</div>

		</div>

		<div id="landing" class="content">
				
			<h2>Landing</h2>

			<h3>Field pattern</h3>

			<div class="image-big">
				<img src="img/modules/fa-18c/landing/field-pattern.jpg">
			</div>
			
			<h3>Carrier landing pattern</h3>

			<div class="image-big">
				<img src="img/modules/fa-18c/landing/carrier-pattern.jpg">
			</div>

		</div>

	</div>

</body>
</html>