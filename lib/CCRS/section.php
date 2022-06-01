<?php
/**
 *
 */

use OpenTHC\Bunk\Module\CCRS;

$out_info = [];

$col_list = 'LicenseNumber,Area,IsQuarantine,ExternalIdentifier,CreatedBy,CreatedDate,UpdatedBy,UpdatedDate,Operation';
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

	// LicenseNumber must be numeric:
	// Invalid LicenseeID:
	// License Number doesn't match the file name
	if ( ! preg_match('/^\d{6}$/', $rec[0])) {
		_exit_text(sprintf('Record %d; Invalid License', $idx), 400);
	}

	if ( ! preg_match('/^.+$/', $rec[1])) {
		_exit_text(sprintf('Record %d; Invalid Section Name', $idx), 400);
	}
	if ( ! preg_match('/^(FALSE|TRUE)$/', $rec[2])) {
		_exit_text(sprintf('Record %d; Invalid Quarantine Value', $idx), 400);
	}

	// Duplicate External Identifier (on INSERT)
	if ( ! preg_match('/^\w{1,100}$/', $rec[3])) {
		_exit_text(sprintf('Record %d; Invalid External Value', $idx), 400);
	}


	if ( ! preg_match('/^\w+\s+\w+$/', $rec[4])) {
		_exit_text(sprintf('Record %d; Invalid CreatedBy Value', $idx), 400);
	}
	if ( ! preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $rec[5])) {
		_exit_text(sprintf('Record %d; Invalid CreatedDate Value', $idx), 400);
	}

	if ( ! empty($rec[6])) {
		if ( ! preg_match('/^\w+\s+\w+$/', $rec[6])) {
			_exit_text(sprintf('Record %d; Invalid CreatedDate Value', $idx), 400);
		}
	}

	if ( ! empty($rec[7])) {
		if ( ! preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $rec[7])) {
			_exit_text(sprintf('Record %d; Invalid CreatedDate Value', $idx), 400);
		}
	}

	// UpdatedBy is required for Update or Delete Operations:
	// UpdatedDate is required for Update or Delete Operations:
	// License Number doesn't match the file name

	CCRS::assertOperation($idx, $rec[8]);

}

$out_info[] = CCRS::assertFileName('/^area_(\d{6}|\w{10})_(\d{14})\.csv$/');
$out_text = implode("\n", $out_info);
_exit_text($out_text);
