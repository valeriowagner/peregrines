var topBtn = document.getElementById( 'top' );

console.log( topBtn );

window.onscroll = function(ev) {

	if ( window.scrollY >= ( window.innerHeight / 2 ) ) {

		topBtn.classList.add( 'show' );

	} else {

		topBtn.classList.remove( 'show' );

	}

}