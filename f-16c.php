<?php 
	require_once( 'head.php' );
	require_once( 'core.php' );
?>
<body>

	<div class="container">

		<div class="title">
			
			<a class="return" href="index.php">
				<?php
					include 'img/return.svg';
				?>
			</a>

			<h1>F-16C</h1>

		</div>

		<img class="banner" src="img/modules/a-10c-2/f-16c-banner.jpg" alt="F-16C">

		<nav>
			
			<a href="#coldstart">Cold Start</a>

		</nav>

		<div id="coldstart" class="content">
			
			<h2>Cold Start</h2>

			<div class="procedure">
				
				<?php

					$coldstartUrl = 'img/modules/f-16c/coldstart/';

					$coldstartComments = [
						19 => 'After rearm!'
					];

					procedure( $coldstartUrl, $coldstartComments );

				?>

			</div>

		</div>

	</div>

</body>
</html>