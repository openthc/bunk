<?php
/**
*/

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'This was not an internal transfer and must have a valid price associated with it.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The transaction specified occurred in 12/2016 which is a currently locked tax period.',
	'errorcode' => 1020,
));
// The transaction specified occurred in 3/2017 which is a currently locked tax period.
