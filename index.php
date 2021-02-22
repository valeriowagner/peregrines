<?php

// CONFIG
define( 'PAGES_PATH', './pages/' );
define( 'TEMPL_PATH', './templs/' );
define( 'TMP_PATH', './tmp/' );

// CONSTANTS
define( 'DEBUG', ($_SERVER['HTTP_HOST'] ?? '') === 'localhost' );
define( 'RAW_REQ_URI', $_SERVER['REQUEST_URI'] ?? '/' );
// REQ_URI if debug remove '/peregrines';
define( 'REQ_URI', DEBUG ? substr(RAW_REQ_URI, 11) : RAW_REQ_URI );

// ERROR HANDLING
error_reporting( E_ALL );
ini_set( 'display_errors', DEBUG );

// load magma template
require_once('./magmatemplate/init.php');
$engine = new MagmaTemplate\Engine( './', TMP_PATH );

// could probably be used for a directory traversal attack
// but there is always .html added
$file = REQ_URI === '/' ? 'index' : REQ_URI;

// if page not found
if ( !is_file(PAGES_PATH. $file. '.html') ) {
	http_response_code(404);
	echo $file;
	die;
}




// loadSvg
function loadSvg(string $path) {
	include $path;
}
$engine->addFn('loadSvg', 'loadSvg');

// templ
function templ(string $name, array $data = []) {
	global $engine;
	$engine->parseAndExecute(TEMPL_PATH. $name, $data);
}
$engine->addFn('templ', 'templ');

// url
function url(string $url = '') {
	return DEBUG ? '/peregrines/'. $url : $url;
}
$engine->addFn('url', 'url');

// section
class Sections {

	protected static $sections = [];

	protected static $active = null;

	public static function start(string $name, string $title = null) {
		self::$active = new Section($name, $title);
		ob_start();
	}

	public static function end() {
		if (is_null(self::$active))
			throw new Exception('active not defined');
		self::$active->ctn = ob_get_clean();
		self::$sections[] = self::$active;
		self::$active = null;
	}

	public static function all() {
		$sections = self::$sections;
		self::$sections = [];
		return $sections;
	}

}

class Section {
	public string $name;
	public string $title;
	// should not be accessed in template
	// call section->display
	public ?string $ctn = null;

	public function __construct(string $name, string $title, string $ctn = null) {
		$this->name = $name;
		$this->title = $title;
		$this->ctn = $ctn;
	}

	public function display() {
		echo $this->ctn;
	}
}

function displaySections(string $name = '') {
	templ('sections', ['sections' => Sections::all()]);
}
$engine->addFn('section', 'section');


// procedure
function procedure( $url, $comments ) {

	$url = 'img/modules/'. $url;
	$filesRaw = scandir( $url );
	$files = array_diff($filesRaw, array('.', '..'));

	sort($files, SORT_NATURAL);

	templ('procedures', ['files' => $files, 'url' => $url]);
}
$engine->addFn('procedure', 'procedure');

// now load the page
$engine->go( PAGES_PATH. $file, [], DEBUG );



