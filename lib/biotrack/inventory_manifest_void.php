<?php
/**
*/

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The manifest you specified could not be found or has already been voided.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'There was an error voiding the manifest. Please try again.',
	'errorcode' => 1000,
));
