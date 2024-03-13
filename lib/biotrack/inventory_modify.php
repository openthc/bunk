<?php
/**
*/

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the inventory_modify privilege.',
	'errorcode' => 62,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You did not provide a strain, product name or package weight to update.',
	'errorcode' => 602,
));
