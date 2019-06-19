<?php
/**
	API Group Controller
*/

namespace App\Module;

class LeafData extends \OpenTHC\Module\Base
{
	static function generateId($idx=0, $pre=null)
	{
		$t = intval(substr($_SERVER['REQUEST_TIME'], -6));
		$t = $t + $idx;
		$x = base_convert($t, 10, 36);
		$x = strtoupper($x);
		return $x;
		//return $RES->withJSON(array(array(
		//	'global_id' => sprintf('BLD001.AR%s', $x),
		//)));
	}

	/**
		@param $a Slim Application
	*/
	function __invoke($a)
	{

		// Info
		$a->get('', function($REQ, $RES, $ARG) {

			$file = APP_ROOT . '/webroot/leafdata.md';
			$text = file_get_contents($file);

			$pd = new \Parsedown();
			echo $pd->text($text);
		});

		// Can I add a Helper Here?


		$a->group('/v2018', function() {

			$this->get('/areas', function($REQ, $RES, $ARG) {
				return require_once(APP_ROOT . '/lib/leafdata/areas.php');
			});

			$this->get('/batches', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/batches.php');
			});

			$this->get('/disposals', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/disposals.php');
			});

			$this->get('/inventory_types', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/inventory_types.php');
			});

			$this->get('/inventory', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/inventory.php');
			});

			$this->get('/inventory_adjustments', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/inventory_adjustments.php');
			});

			$this->get('/inventory_transfers', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/inventory_transfers.php');
			});

			$this->get('/inventory_transfers_deliveries', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/inventory_transfers_deliveries.php');
			});

			$this->get('/lab_results', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/lab_results.php');
			});

			$this->get('/mmes', function($REQ, $RES, $ARG) {
				//_exit_text('Not Implemented', 501);
				//return require_once(APP_ROOT . '/lib/leafdata/mmes.php');
				return $RES->withJSON(array());
			});

			$this->get('/plants', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/plants.php');
			});

			$this->get('/sales', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/sales.php');
			});

			$this->get('/strains', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/strains.php');
			});

			$this->get('/taxes', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/taxes.php');
			});

			$this->get('/users', function($REQ, $RES, $ARG) {
				_exit_text('Not Implemented', 501);
				return require_once(APP_ROOT . '/lib/leafdata/users.php');
			});

		});

	}

}
