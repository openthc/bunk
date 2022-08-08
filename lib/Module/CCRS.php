<?php
/**
 * LCB CCRS API Group Controller
 * Just shit-hacked this together
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Module;

class CCRS extends \OpenTHC\Module\Base
{
	/**
	 *
	 */
	public static function assertIsCSV()
	{
		$type = strtok($_SERVER['CONTENT_TYPE'], ';');
		if ('text/csv' !== $type) {
			_exit_text("Invalid Content Type: '$type' [BMC-018]");
		}

	}

	// Row A - SubmittedBy
	public static function checkRowA($rec, $col_size)
	{
		$a = $col_size;
		$b = count($rec);
		if ($a !== $b) {
			_exit_text("Invalid Row A 'SubmittedBy', columns expect:{$a} != actual:{$b}", 400);
		}

		if ('SubmittedBy' !== $rec[0]) {
			_exit_text("Invalid Row A 'SubmittedBy' is the first column", 400);
		}

		if (strlen($rec[1]) > 35) {
			_exit_text("Invalid Row A 'SubmittedBy' is the too long", 400);
		}
	}

	// Row B - SubmittedDate
	public static function checkRowB($rec, $col_size)
	{
		if (count($rec) != $col_size) {
			_exit_text('Invalid Row B "SubmittedDate", Column Count', 400);
		}

		if (!preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $rec[1])) {
			_exit_text('Invalid Row B "SubmittedDate" value should be a date', 400);
		}
	}

	/**
	 * Row C - NumberRecords
	 */
	public static function checkRowC($rec, $col_size, $row_name='NumberRecords')
	{
		if (count($rec) != $col_size) {
			_exit_text(sprintf('Invalid Row C "%s", Column Count expect:%d != actual:%d', $row_name, $col_size, count($rec)), 400);
		}

		if ($row_name !== $rec[0]) {
			_exit_text(sprintf('Invalid Row C "%s", is the first column', $row_name), 400);
		}

		$ret = intval($rec[1]);
		if ($ret <= 0) {
			_exit_text(sprintf('Invalid Row C "%s", should be > 0', $row_name), 400);
		}

		return $ret;
	}

	/**
	 *
	 */
	public static function checkRowD($rec, $col_size, $col_list)
	{
		if (count($rec) != $col_size) {
			_exit_text('Invalid Row D Header, column count', 400);
		}

		// if ('Strain' !== $src_data[3][0]) {
		// 	_exit_text('Invalid Row D "LicenseNumber", is the first column', 400);
		// }

		$x = implode(',', $rec);
		if ($col_list !== $x) {
			_exit_text("Invalid Row D Header, colums are\n$col_list", 400);
		}
	}

	public static function assertFileName($pat)
	{
		// Check name at end, less critical?
		if (empty($_GET['name'])) {
			return "WARN: Add a 'name' query string parameter to test";
		} elseif ( ! preg_match($pat, $_GET['name'])) {
			return "WARN: Name should match $pat";
		}
	}

	public static function assertOperation($idx, $val)
	{
		if ( ! preg_match('/^(Insert|Update|Delete)$/', $val)) {
			_exit_text(sprintf('Record %d; Invalid Operation Value', $idx), 400);
		}
	}

	/**
	 * Read the CSV Data
	 */
	public static function getCSVData()
	{
		$fh = fopen('php://input', 'r');

		$src_data = [];
		while ($rec = fgetcsv($fh)) {
			$src_data[] = $rec;
		}

		return $src_data;
	}

	/**
	 * @param $a Slim Application
	 */
	function __invoke($a)
	{
		// Info
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('CCRS');
		});

		// Section (Area)
		$a->post('/section', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/section.php');
		});

		// Lot (Inventory)
		$a->post('/lot', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/lot.php');
		});

		// Lot Adjust (Inventory Adjustment)
		$a->post('/lot-adjust', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/lot-adjust.php');
		});

		// B2B (Inventory Transfer)
		$a->post('/b2b', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/b2b-lot.php');
		});

		// Lab Result (Lab Test)
		$a->post('/lab-result', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/lab-result.php');
		});

		// Crop (Plant)
		$a->post('/crop', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/crop.php');
		});

		// Crop Destroy
		$a->post('/crop-destroy', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/crop-destroy.php');
		});

		// Crop Transfer (B2B For Crop)
		$a->post('/b2b-crop', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/b2b-crop.php');
		});

		// Product
		$a->post('/product', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/product.php');
		});

		// B2C (Sale)
		$a->post('/b2c', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/b2c.php');
		});

		// Variety (Strain)
		$a->post('/variety', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/CCRS/variety.php');
		});

	}

}
