<?php
/**
	API Group Controller
*/

namespace App\Module;

class METRC extends \OpenTHC\Module\Base
{
	/**
		@param $a Slim Application
	*/
	function __invoke($a)
	{
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('metrc');
		});

		$a->group('/v2015', function($C) {

			$this->get('/facilities/v1', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/harvests/v1/active', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/items/v1/active', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/labtests/v1/states', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/packages/v1/active', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/plantbatches/v1/active', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/plants/v1/vegetative', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/rooms/v1/active', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/sales/v1/customertypes', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/strains/v1/active', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/transfers/v1/incoming', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/transfers/v1/outgoing', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/transfers/v1/rejected', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/unitsofmeasure/v1/active', function($REQ, $RES, $ARG) {
				//die("{$_SERVER['REQUEST_URI']} is not implemented yet");
				return require_once(APP_ROOT . '/lib/metrc/unitsofmeasure.php');
			});

		});

	}

}

