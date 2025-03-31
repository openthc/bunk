<?php
/**
 * Bunk Inventoy Manifest action
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

$_inventory_manifest_list = array(
	// @gitlab app#1654
	'GITLAB-APP-1654' => array(
		'barcode_id' => '7288034569537775',
	),
);

// $case = $REQ->headers->get('X-OPENTHC-TEST-CASE');
$case = 'GITLAB-APP-1654';
if ( ! empty($case)) {
	$IM = $_inventory_manifest_list[ $case ];
	$barcode_id = $IM['barcode_id'];
}

return $RES->withJSON(array(
	'sessiontime' => time(),
	'barcode_id' => $barcode_id,
	'success' => 1,
	'transactionid' => Base::_rnd_transaction_id(),

));
