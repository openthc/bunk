<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the inventory_qa_check privilege.',
	'errorcode' => 62,
));


return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Your session has expired.',
	'errorcode' => 63,
));


return $RES->withJSON(array(
	'success' => 0,
	'error' => 'There were no samples found for the specified identifer.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Test results have not yet been filed.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Please specify at least one identifier.',
	'errorcode' => 602,
));

//inventory_qa_check
//    case 'inventory_qa_check':
//        die(json_encode(array('success' => '1', 'result' => 1, 'test' => array(0000000090000059), 'transactionid' => '33778', 'sessiontime' => $time)));
//        break;
