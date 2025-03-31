<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the inventory_adjust_usable privilege.',
	'errorcode' => 62,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Your session has expired.',
	'errorcode' => 63,
));
