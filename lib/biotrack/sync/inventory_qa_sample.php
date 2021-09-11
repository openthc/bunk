<?php
/**
 * Sync inventory_qa_sample
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 1,
	'inventory_qa_sample' => array(
		0 => array(
			"deleted" => "0",
			"inventoryid" => "2891345622130160",
			"inventorytype" => "13",
			"lab_license" => "999978",
			"location" => "999999",
			"parentid" => "0000000090000190",
			"quantity" => "1.00",
			"result" => "1",
			"sample_use" => "1",
			"sessiontime" => $time,
			"strain" => "Blueberry",
			"transactionid" => "4863",
			"transactionid_original" => "4863",
		),
	)
));
