<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

// @todo Check Header "OPENTHC_BUNK_SIMULATE_PRIVILEGE: fail"
if ($missing_privilege) {
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the inventory_qa_check privilege.',
	'errorcode' => 62,
));
}


// @todo Base::_rnd_session_exp ?
if ($session_expired) {
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Your session has expired.',
	'errorcode' => 63,
));
}

// @todo Find a real API example
$barcodeid = (is_array($_POST['barcodeid']) ? $_POST['barcodeid'][0] : $_POST['barcodeid']);
if (empty($barcodeid)) {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'Please specify at least one identifier.',
		'errorcode' => 602,
	));
}

$file = sprintf('%s/lib/BioTrack/inventory/qa_check-%s.php', APP_ROOT, $barcodeid);
$ret = include_once($file);

if (empty($ret)) {
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'There were no samples found for the specified identifer.',
	'errorcode' => 602,
));
}

$result_not_filed = (empty($ret['test']) || 0 == $ret['result']);
if ($result_not_filed) {
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Test results have not yet been filed.',
	'errorcode' => 602,
));
}

return $RES->withJSON(array(
	'success' => 1,
	'data' => $ret,
));

/*
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Please specify at least one identifier.',
	'errorcode' => 602,
));
*/

//inventory_qa_check
//    case 'inventory_qa_check':
//        die(json_encode(array('success' => '1', 'result' => 1, 'test' => array(0000000090000059), 'transactionid' => '33778', 'sessiontime' => $time)));
//        break;
