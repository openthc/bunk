<?php
/**
 *
 */

use OpenTHC\Bunk\Module\CCRS;

$out_info = [];

$col_list = 'LicenseNumber,InventoryCategory,InventoryType,Name,Description,UnitWeightGrams,ExternalIdentifier,CreatedBy,CreatedDate,UpdatedBy,UpdatedDate,Operation';
$col_size = substr_count($col_list, ',') + 1;

CCRS::assertIsCSV();
$src_data = CCRS::getCSVData();

// Row Checking
CCRS::checkRowA($src_data[0], $col_size);
CCRS::checkRowB($src_data[1], $col_size);
$src_size = CCRS::checkRowC($src_data[2], $col_size);
CCRS::checkRowD($src_data[3], $col_size, $col_list);

// Now Make Sure the Row Count (from C) matches the remaining rows
$rec_size = count($src_data) - 4;
if ($src_size != $rec_size) {
	_exit_text("Invalid Row C NumberRecords or Invalid Data, expect:$src_size != actual:$rec_size", 400);
}

$src_data = array_slice($src_data, 4);
foreach ($src_data as $idx => $rec) {

	if ( ! preg_match('/^\d{6}$/', $rec[0])) {
		_exit_text(sprintf('Record %d; Invalid License', $idx), 400);
	}

	// Product Category
	if ( ! preg_match('/^(Propagation Material|Harvested Material|Intermediate Product|End Product)$/', $rec[1])) {
		_exit_text(sprintf('Record %d; Invalid Product Category', $idx), 400);
	}

	// Product Type
	// if ( ! preg_match('/^\w+\s+\w+$/', $rec[2])) {
	// 	_exit_text(sprintf('Record %d; Invalid CreatedBy Value', $idx), 400);
	// }

	// Description
	// if ( ! preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $rec[3])) {
	// 	_exit_text(sprintf('Record %d; Invalid CreatedDate Value', $idx), 400);
	// }

	// Description
	// if ( ! preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $rec[4])) {
	// 	_exit_text(sprintf('Record %d; Invalid CreatedDate Value', $idx), 400);
	// }

	// UnitWeightGrams
	if ( ! preg_match('/^[\d\.]+$/', $rec[5])) {
		_exit_text(sprintf('Record %d; Invalid UnitWeightGrams Value', $idx), 400);
	}

	// ExternalIdentifier
	if ( ! preg_match('/^.+$/', $rec[6])) {
		_exit_text(sprintf('Record %d; Invalid ExternalIdentifier Value', $idx), 400);
	}

	// 7 CreatedBy

	// 8 Created Date
	if ( ! preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $rec[8])) {
		_exit_text(sprintf('Record %d; Invalid CreatedDate Value', $idx), 400);
	}

	// 9 UpdatedBy
	// 10 UpdatedDate

	// 11 Operation
	CCRS::assertOperation($idx, $rec[11]);

}


$out_info[] = CCRS::assertFileName('/^product_(\d{6}|\w{10})_(\d{14})\.csv$/');
$out_text = implode("\n", $out_info);
_exit_text($out_text);
