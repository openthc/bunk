<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 1,
	'transactionid' => Base::_rnd_transaction_id(),
	'barcode_id' => [
		Base::_rnd_barcode()
	],
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Your session has expired.',
	'errorcode' => 63,
));
