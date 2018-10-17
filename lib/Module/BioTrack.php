<?php
/**
	API Group Controller
*/

namespace App\Module;

class BioTrack extends \OpenTHC\Module\Base
{
	/**
		@param $a Slim Application
	*/
	function __invoke($a)
	{

		// Info
		$a->get('', function() {

			$file = APP_ROOT . '/webroot/biotrack.md';
			$text = file_get_contents($file);

			$pd = new \Parsedown();
			echo $pd->text($text);

		});

		// This one is sloppy cause I just slapped in some existing crap I had
		$a->post('/v2013/serverjson.asp', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/biotrack.php');
		})->add('App\Middleware\Log\HTTP');

	}

}
