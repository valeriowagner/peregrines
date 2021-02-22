<?php

	function procedure( $url, $comments ) {

		$filesRaw = scandir( $url );
		$files = array_diff($filesRaw, array('.', '..'));

		sort($files, SORT_NATURAL);

		foreach ( $files as $c => $file ) {
			
			$c++;

			echo( '<div class="step">
				<h3>Step ' . $c . '</h3>' );

			if ( isset($comments[$c]) ){
				echo( '<p>' . $comments[$c] . '</p>' );
			}

			echo( '<img src="' . $url . $file . '">
			</div>');

		}

	}