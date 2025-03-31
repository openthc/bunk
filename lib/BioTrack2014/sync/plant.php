<?php
/**
 * Return List of Plants
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;


$p0 = array(
	'converted' => '0',
	'deleted' => '0',
	'id' => '6038749231561918',
	'harvestscheduled' => '0',
	'location' => '999999',
	'mother' => '0',
	'parentid' => '0000000090000177',
	'removescheduled' => '0',
	'room' => '7',
	'sessiontime' => $time,
	'state' => '0',
	'strain' => 'AK-47',
	'transactionid' => '4815',
	'transactionid_original' => '4815',
);

//$p1 = array(
//	'converted': 1,
//  'curecollect': null,
//  'deleted': 0,
//  'deletetime': null,
//  'harvestcollect': null,
//  'harvestscheduled': null,
//  'harvestscheduletime': null,
//  'id': '0866344199889151',
//  'location': '412240',
//  'mother': 0,
//  'parentid': '6033240110009880',
//  'removereason': null,
//  'removescheduled': 0,
//  'removescheduletime': null,
//  'room': '40',
//  'seized': null,
//  'sessiontime': '1456516799',
//  'state': 2,
//  'strain': 'Girl Scout Cookie 2013',
//  'transactionid': '22666006',
//  'transactionid_original': '22665964'
//);

$ret = array(
	'success' => 1,
	'plant' => array(),
);

$ret['plant'][] = $p0;
//$ret['plant'][] = $p1;

return $RES->withJSON($ret);
