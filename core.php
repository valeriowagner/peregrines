<?php

	function procedure( $url, $comments ) {

		$filesRaw = scandir( $url );
		$files = array_diff($filesRaw, array('.', '..'));

		sort($files, SORT_NATURAL);

		foreach ( $files as $c => $file ) {
			
			$c++;

			echo( '<div class="step">
				<h3>' . $c . '.' );

			if ( isset($comments[$c]) ){
				echo( ' ' . $comments[$c] );
			}

			echo( '</h3>
				<img src="' . $url . $file . '">
			</div>');

		}

	}

?>