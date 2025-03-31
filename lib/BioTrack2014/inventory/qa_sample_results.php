<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

/*
{"action":"inventory_qa_sample_results",
"sample_id":"4202870000000304",
"test":[
	{"type":6,"total_mycotoxins":0},{"type":7,"pesticide_residue":0},{"type":8,"heavy_metal":0}
]
}
*/

return $RES->withJSON(array(
	'success' => 1,
	'transactionid' => Base::_rnd_transaction_id(),
	'sessiontime' => $_SERVER['REQUEST_TIME'],
));
