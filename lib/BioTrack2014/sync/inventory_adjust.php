<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 1,
	'inventory_adjust' => array(
		0 => array(
			"atype" => "4",
			"inventoryid" => "0000000090000178",
			"location" => "999999",
			"new_quantity" => "8.00",
			"previous_quantity" => "10",
			"reason" => "Testing",
			"sessiontime" => $time,
			"transactionid" => "4856",
			"transactionid_original" => "4856"
		),
	)
));
