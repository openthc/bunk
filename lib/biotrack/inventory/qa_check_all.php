<?php
/**
 *
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the inventory_qa_check_all privilege.',
	'errorcode' => 62,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Your session has expired.',
	'errorcode' => 63,
));
