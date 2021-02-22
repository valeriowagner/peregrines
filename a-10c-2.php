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

			<h1>A-10C II</h1>

		</div>

		<img class="banner" src="img/modules/a-10c-2/a-10c-2-banner.jpg" alt="A-10C II">

		<nav>
			
			<a href="#coldstart">Cold Start</a>
			<a href="#downloads">Downloads</a>

		</nav>

		<div id="coldstart" class="content">
			
			<h2>Cold Start</h2>

			<div class="procedure">
				
				<?php

					$coldstartUrl = 'img/modules/a-10c-2/coldstart/';

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

				<li><a href="files/a-10c-2-guide-en.pdf">Official Guide</a></li>
			
			</ul>
			

		</div>

	</div>

	<?php 
		require_once( 'footer.php' );
	?>

	<script type="text/javascript" src="js/main.js"></script>

</body>
</html>