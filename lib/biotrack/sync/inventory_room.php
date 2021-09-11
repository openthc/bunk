<?php
/**
 *
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 1,
	'inventory_room' => array(
		0 => array(
			"deleted" => "0",
			"location" => "18750",
			"name" => "Quarantine",
			"quarantine" => "1",
			"roomid" => "1",
			"transactionid" => "4032",
			"transactionid_original" => "4032"
		),
		1 => array(
			"deleted" => "0",
			"location" => "18750",
			"name" => "New",
			"quarantine" => "0",
			"roomid" => "7",
			"transactionid" => "4057",
			"transactionid_original" => "4057"
		),
	)
));
