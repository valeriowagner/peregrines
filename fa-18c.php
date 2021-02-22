<?php 
	require_once( 'head.php' );
	require_once( 'core.php' );
?>
<body>

	<a href="#">
		<div id="top">
			<?php
				include 'img/top.svg';
			?>		
		</div>
	</a>

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
			<a href="#air-ground">Air / Ground</a>
			<a href="#landing">Landing</a>

		</nav>

		<!--
			COLDSTART
		-->

		<div id="coldstart" class="content">
			
			<div class="procedure">
				
				<h1>Cold Start</h1>

				<?php

					$url = 'img/modules/fa-18c/coldstart/';

					$comments = [
						5 => 'When right RPM more than 20%',
						14 => 'When left RPM more than 20%',
						27 => 'Check on AMPCD if INS is aligned'
					];

					procedure( $url, $comments );

				?>

			</div>

		</div>

		<!--
		AIR / AIR
		-->

		<div id="air-air" class="content">
			
			<h1>Air / Air</h1>

			<nav>
				<a href="#ir-missiles">IR Missiles</a>
				<a href="#radar-missiles">Radar Missiles</a>
			</nav>

			<div id="ir-missiles" class="procedure">
				
				<h2>IR Missiles</h2>

				<?php

					$url = 'img/modules/fa-18c/a2a/ir/';

					$comments = [
						3 => '"Select Sidewinder" keybind',
					];

					procedure( $url, $comments );

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

			<div id="radar-missiles" class="procedure">
				
				<h2>Radar Missiles</h2>

				<?php

					$url = 'img/modules/fa-18c/a2a/radar/';

					$comments = [
						3 => '"Select AMRAAM" or "Select Sparrow" keybind',
						4 => '"Throttle Designator Controller" keybinds',
						5 => '"Throttle Designator Controller - Depress" keybind'
					];

					procedure( $url, $comments );

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

		<!--
			AIR / GROUND
		-->

		<div id="air-ground" class="content">
			
			<h1>Air / Ground</h1>

			<nav>
				<a href="#gps-bombs">GPS Bombs</a>
				<a href="#laser-bombs">Laser Bombs</a>
			</nav>

			<div id="gps-bombs" class="procedure">
				
				<h2>GPS Bombs</h2>

				<?php

					$url = 'img/modules/fa-18c/a2g/gps/';

					$comments = [
						12 => 'When coordinates showing in MSN lock successful',
						15 => 'ATRK = static Target, PTRK = moving target',
						16 => 'Move FLIR with TDC controlls'
					];

					procedure( $url, $comments );

				?>

			</div>

			<div id="laser-bombs" class="procedure">
				
				<h2>Laser Bombs</h2>

				<?php

					$url = 'img/modules/fa-18c/a2g/laser/';

					$comments = [
						12 => 'Match code with FLIR code',
						14 => 'QTY = amount, MULT = distance',
						20 => 'Align velocity vector (VV) with vertical line',
						21 => 'Release when horizontal line reaches VV'
					];

					procedure( $url, $comments );

				?>

			</div>

		</div>

		<!--
			LANDING
		-->

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

	<script type="text/javascript" src="js/main.js"></script>

</body>
</html>