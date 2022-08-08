<?php
/**
 * Dump the Plant Derivatives
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

$ret = array(
	'success' => 1,
	'plant_derivative' => array(),
);

// $res = SQL::fetch_all('SELECT meta FROM plant_derivative');
// foreach ($res as $rec) {
// 	$rec = json_decode($rec['meta'], true);
// 	$ret['plant_derivative'][] = $rec;
// }

return $RES->withJSON($ret);

//sync_plant_derivative
//case 'sync_plant_derivative':
//	return $RES->withJSON(array(
//		'success' => 1,
//		"plant_derivative" => array(
//			0 => array(
//				"collectadditional" => "0",
//				"deleted" => "0",
//				"inventoryid" => "6902364819540939",
//				"inventorytype" => "6",
//				"location" => "18750",
//				"plantid" => "3749713237156948",
//				"room" => "5",
//				"sessiontime" => $time,
//				"transactionid" => "4861",
//				"transactionid_original" => "4861",
//				"weight" => "250",
//				"wholeweight" => "250.00",
//		 ),
//		),
//));
//break;
//
