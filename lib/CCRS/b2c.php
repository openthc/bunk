<?php
/**
 *
 */

use OpenTHC\Bunk\Module\CCRS;

$col_list = 'LicenseNumber,SoldToLicenseNumber,InventoryExternalIdentifier,PlantExternalIdentifier,SaleType,SaleDate,Quantity,UnitPrice,Discount,SalesTax,OtherTax,SaleExternalIdentifier,SaleDetailExternalIdentifier,CreatedBy,CreatedDate,UpdatedBy,UpdatedDate,Operation';
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
