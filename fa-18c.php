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

			<h1>F/A-18C</h1>

		</div>

		<img class="banner" src="img/modules/fa-18c/fa-18c-banner.jpg" alt="F/A-18C">

		<nav>
			
			<a href="#coldstart">Cold Start</a>
			<a href="#air-air">Air / Air</a>
			<a href="#landing">Landing</a>

		</nav>

		<div id="coldstart" class="content">
			
			<h1>Cold Start</h1>

			<div class="procedure">
				
				<?php

					$coldstartUrl = 'img/modules/fa-18c/coldstart/';

					$comments = [
						5 => 'When RPM more than 20%',
						14 => 'When RPM more than 20%',
						27 => 'Check on AMPCD if INS is aligned'
					];

					procedure( $coldstartUrl, $comments );

				?>

			</div>

		</div>

		<div id="air-air" class="content">
			
			<h1>Air / Air</h1>

			<h2>IR Missiles</h2>

			<div class="procedure">
				
				<?php

					$coldstartUrl = 'img/modules/fa-18c/missiles/ir/';

					$comments = [
						3 => '"Select Sidewinder" keybind',
					];

					procedure( $coldstartUrl, $comments );

				?>

				<div class="note">
					
					<h3>Note:</h3>

					<ul>
						<li>Select desired ACM mode with "Sensor Control Switch"</li>
						<li>Place seeker over the target to get a lock</li>
						<li>Fire missile when flashing "SHOOT" appears</li>
					</ul>

				</div>

			</div>

			<h2>Radar Missiles</h2>

			<div class="procedure">
				
				<?php

					$coldstartUrl = 'img/modules/fa-18c/missiles/radar/';

					$comments = [
						3 => '"Select AMRAAM" or "Select Sparrow" keybind',
						4 => '"Throttle Designator Controller" keybinds',
						5 => '"Throttle Designator Controller - Depress" keybind'
					];

					procedure( $coldstartUrl, $comments );

				?>

				<div class="note">
					
					<h3>Note:</h3>

					<ul>
						<li>Range depends on loaded missile</li>
						<li>Place Normalized In-Range Display (NIRD) over steering dot</li>
					</ul>

				</div>

			</div>

		</div>

		<div id="landing" class="content">
				
			<h1>Landing</h1>

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