<?php

// CONFIG
define( 'PAGES_PATH', './pages/' );
define( 'TEMPL_PATH', './templs/' );
define( 'TMP_PATH', './tmp/' );

// CONSTANTS
define( 'DEBUG', ($_SERVER['HTTP_HOST'] ?? '') === 'localhost' );
define( 'RAW_REQ_URI', strtok($_SERVER['REQUEST_URI'] ?? '/', '?') );
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
	return DEBUG ? '/peregrines/'. $url : '/'. $url;
}
$engine->addFn('url', 'url');

// isLive
function isLive() {
	return !DEBUG;
}
$engine->addFn('isLive', 'isLive');

// mainHeader
function mainHeader(string $title, string $banner) {
	templ('mainheader', [ 'title' => $title, 'banner' => $banner ]);
}
$engine->addFn('mainHeader', 'mainHeader');

// section
class Sections {

	protected static $sections = [];

	// [ layer => section ]
	protected static $active = [];

	public static function start(string $layer, string $name, string $title) {
		self::$active[$layer] = new Section($name, $title);
		ob_start();
	}

	public static function end(string $layer) {
		if (!isset(self::$active[$layer]))
			throw new Exception($layer.' not started' );
		self::$active[$layer]->ctn = ob_get_clean();

		if (!isset(self::$sections[$layer]))
			self::$sections[$layer] = [];
		self::$sections[$layer][] = self::$active[$layer];

		unset(self::$active[$layer]);
	}

	public static function all(string $layer) {
		if (!isset(self::$sections[$layer]))
			throw new Exception($layer.' not started' );
		if (isset(self::$active[$layer]))
			throw new Exception($layer.' end not called' );
		$sections = self::$sections[$layer];
		self::$sections[$layer] = [];
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

function displaySections(string $layer) {
	templ('sections', [
		'sections' => Sections::all($layer),
		'layer' => $layer
	]);
}
$engine->addFn('displaySections', 'displaySections');

// procedure
function procedure( $url, $comments ) {

	$url = 'img/modules/'. $url;
	$filesRaw = scandir( $url );
	$files = array_diff($filesRaw, array('.', '..'));

	sort($files, SORT_NATURAL);

	templ('procedures', ['files' => $files, 'url' => $url, 'comments' => $comments]);
}
$engine->addFn('procedure', 'procedure');

// now load the page
$engine->go( PAGES_PATH. $file, [], DEBUG );



