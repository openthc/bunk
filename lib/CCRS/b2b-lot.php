<?php
/**
 *
 */

use OpenTHC\Bunk\Module\CCRS;

$col_list = 'FromLicenseNumber,ToLicenseNumber,FromInventoryExternalIdentifier,ToInventoryExternalIdentifier,Quantity,TransferDate,ExternalIdentifier,CreatedBy,CreatedDate,UpdatedBy,UpdatedDate,Operation';
$col_size = substr_count($col_list, ',') + 1;

CCRS::assertIsCSV();
$src_data = CCRS::getCSVData();

// Row Checking
CCRS::checkRowA($src_data[0], $col_size);
CCRS::checkRowB($src_data[1], $col_size);
$src_size = CCRS::checkRowC($src_data[2], $col_size);
