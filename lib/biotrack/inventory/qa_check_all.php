<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

$ret = null;

// See data files located next to this file
foreach ($json['barcodeid'] as $barcodeid) {
	$ret[] = _read_data($barcodeid);
}

// @todo Check Header "OPENTHC_BUNK_SIMULATE_PRIVILEGE: fail"
if ($missing_privilege) {
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the inventory_qa_check_all privilege.',
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

// No trivial responses cases found /mbw 2024-058
if (empty($ret)) {
	// @todo BioTrack empty response from example
	throw new Exception('inventory_qa_check_all empty response');
}

return $RES->withJSON(array(
	'success' => 1,
	'data' => $ret,
));

function _read_data($case)
{
	$file = sprintf('%s/lib/BioTrack/inventory/qa_check-%s.php', APP_ROOT, $case);
	return include_once($file);
}
