<?php
/**
 * inventory_transfer_outbound
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'transactionid' => Base::_rnd_transaction_id(),
));


return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The mandatory 24 hour waiting period has not passed.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The manifest you specified has already been fulfilled.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You did not provide a sale price for the inventory item 6033338510008828.',
	'errorcode' => 602,
));
