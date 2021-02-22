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

			<h1>F-16C</h1>

		</div>

		<img class="banner" src="img/modules/f-16c/f-16c-banner.jpg" alt="F-16C">

		<nav>
			
			<a href="#coldstart">Cold Start</a>
			<a href="#downloads">Downloads</a>

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

		<div id="downloads" class="content">
			
			<h1>Downloads</h1>

			<ul>

				<li><a href="files/f-16c-guide-en.pdf">Official Guide</a></li>
			
			</ul>
			

		</div>

	</div>

	<?php 
		require_once( 'footer.php' );
	?>

	<script type="text/javascript" src="js/main.js"></script>

</body>
</html>