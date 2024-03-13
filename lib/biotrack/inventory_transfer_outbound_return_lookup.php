<?php
/**
*/

// {"success":0,"error":"No outstanding returned items were found.","errorcode":"602"}


return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the inventory_transfer_outbound_return_lookup privilege.',
	'errorcode' => 62,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Your session has expired.',
	'errorcode' => 63,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'No outstanding returned items were found.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Please specify a licensed location.',
	'errorcode' => 602,
));
