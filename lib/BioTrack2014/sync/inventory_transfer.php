<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;


return $RES->withJSON(array(
	'success' => 1,
	'inventory_transfer' => array(
		0 => array(
			"deleted" => "1",
			"inventoryid" => "0000000090000191",
			"inventorytype" => "28",
			"location" => "999999",
			"manifest_stop" => "1",
			"manifestid" => "3387557157087693",
			"outbound_license" => "999909",
			"price" => "1000.00",
			"quantity" => "50",
			"sessiontime" => $time,
			"strain" => "Blueberry",
			"transactionid" => "4918",
			"transactionid_original" => "4918",
		),
	)
));
