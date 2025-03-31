<?php
/**
 * Fake Incoming Transfer
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

$inventory_transfer_inbound = array();

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
$inventory_transfer_inbound[] = $transfer_incoming;

// app#1568
$transfer_incoming = array(
	'deleted' => 0,
	'inventoryid' => '2023164042000000',
	'inventorytype' => 7,
	'is_refund' => 0,
	'location' => '990001',
	'manifest_stop' => '1',
	'manifestid' => '2023164090000000',
	'outbound_license' => '999000002',
	'price' => '0.01',
	'quantity' => '100',
	'refund_amount' => NULL,
	'sessiontime' => $time,
	'strain' => 'blue dream',
	'transactionid' => Base::_rnd_transaction_id(),
	'transactionid_original' => Base::_rnd_transaction_id(),
);
$inventory_transfer_inbound[] = $transfer_incoming;
$transfer_incoming = array(
	'deleted' => 0,
	'inventoryid' => '2023164042000001',
	'inventorytype' => 7,
	'is_refund' => 0,
	'location' => '990001',
	'manifest_stop' => '1',
	'manifestid' => '2023164090000000',
	'outbound_license' => '999000002',
	'price' => '0.01',
	'quantity' => '100',
	'refund_amount' => NULL,
	'sessiontime' => $time,
	'strain' => 'Shady Apples',
	'transactionid' => Base::_rnd_transaction_id(),
	'transactionid_original' => Base::_rnd_transaction_id(),
);
$inventory_transfer_inbound[] = $transfer_incoming;
$transfer_incoming = array(
	'deleted' => 0,
	'inventoryid' => '2023164042000002',
	'inventorytype' => 7,
	'is_refund' => 0,
	'location' => '990001',
	'manifest_stop' => '1',
	'manifestid' => '2023164090000000',
	'outbound_license' => '999000002',
	'price' => '0.01',
	'quantity' => '100',
	'refund_amount' => NULL,
	'sessiontime' => $time,
	'strain' => 'Shady Oranges',
	'transactionid' => Base::_rnd_transaction_id(),
	'transactionid_original' => Base::_rnd_transaction_id(),
);
$inventory_transfer_inbound[] = $transfer_incoming;

return $RES->withJSON(array(
	'success' => 1,
	'inventory_transfer_inbound' => array($transfer_incoming),
	'inventory_transfer_inbound' => $inventory_transfer_inbound,
));
