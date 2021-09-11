<?php
/**
	Return List of Plant Rooms
*/

use \OpenTHC\Bunk\BioTrack\Base;


$ret = array(
	'success' => 1,
	'plant_room' => array(),
);

$ret['plant_room'][] = array(
	'deleted' => 0,
	'location' => '999999',
	'name' => 'Default',
	'roomid' => 1,
	'transactionid' => 4075,
	'transactionid_original' => 4070
);

$ret['plant_room'][] = array(
	'deleted' => 0,
	'location' => '999999',
	'name' => 'Clone Room 1',
	'roomid' => 7,
	'transactionid' => 4081,
	'transactionid_original' => 4081
);

return $RES->withJSON($ret);
