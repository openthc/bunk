<?php
/**
 * Fake Incoming Transfer
 */

use \OpenTHC\Bunk\BioTrack\Base;


$transfer_incoming = array(
	"deleted" => "1",
	"inventoryid" => "0000000090000191",
	"inventorytype" => "28",
	"is_refund" => "1",
	"location" => "999999",
	"manifest_stop" => "1",
	"manifestid" => "3387557157087693",
	"outbound_license" => "990002",
	"price" => "0.00",
	"quantity" => "50",
	"refund_amount" => "50.00",
	"sessiontime" => $time,
	"strain" => "Blueberry",
	"transactionid" => "4919",
	"transactionid_original" => "4918",
);


return $RES->withJSON(array(
	'success' => 1,
	'inventory_transfer_inbound' => array($transfer_incoming),
));
