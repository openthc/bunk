<?php
/**
*/

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'No inventory conversion could be found for the inventory identifier specified.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The inventory item has been adjusted after conversion and is no longer eligible to be reverted.',
	'errorcode' => 602,
));
