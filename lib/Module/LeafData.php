<?php
/**
 * LeafData Module
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Module;

class LeafData extends \OpenTHC\Module\Base
{
	/**
	 * Generic ID Generator
	 */
	static function generateId($idx=0, $pre=null)
	{
		$t = intval(substr($_SERVER['REQUEST_TIME'], -6));
		$t = $t + $idx;
		$x = base_convert($t, 10, 36);
		$x = strtoupper($x);
		return $x;
	}

	/**
	 * @param $a Slim Application
	 */
	function __invoke($a)
	{

		// Info
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('leafdata');
		});

		$a->map(['GET','POST','DELETE'], '/areas', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/areas.php');
		});

		$a->map(['GET','POST','DELETE'], '/batches', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/batches.php');
		});

		$a->map(['GET','POST','DELETE'], '/disposals', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/disposals.php');
		});

		$a->map(['GET','POST','DELETE'], '/inventories', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/inventories.php');
		});

		$a->map(['GET','POST','DELETE'], '/inventory_adjustments', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/inventory_adjustments.php');
		});

		$a->map(['GET','POST','DELETE'], '/inventory_transfers', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/inventory_transfers.php');
		});

		$a->map(['GET','POST','DELETE'], '/inventory_types', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/inventory_types.php');
		});

		$a->map(['GET','POST','DELETE'], '/lab_results', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/lab_results.php');
		});

		$a->map(['GET','POST','DELETE'], '/mmes', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/mmes.php');
		});

		$a->map(['GET','POST','DELETE'], '/plants', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/plants.php');
		});

		$a->map(['GET','POST','DELETE'], '/plants_by_area', function($REQ, $RES, $ARG) {
			_exit_text('Not Implemented', 501);
			return require_once(APP_ROOT . '/lib/leafdata/plants.php');
		});

		$a->map(['GET','POST','DELETE'], '/sales', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/sales.php');
		});

		$a->map(['GET','POST','DELETE'], '/strains', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/strains.php');
		});

		$a->map(['GET','POST','DELETE'], '/taxes', function($REQ, $RES, $ARG) {
			_exit_text('Not Implemented', 501);
			return require_once(APP_ROOT . '/lib/leafdata/taxes.php');
		});

		$a->map(['GET','POST','DELETE'], '/users', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/leafdata/users.php');
		});

	}

}
