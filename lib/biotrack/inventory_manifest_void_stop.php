<?php
/**
*/

// Not sure what the numbers mean
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The manifest you specified could not be found or has already been voided.',
	'errorcode' => 602,
));

// Not sure what the numbers mean
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'There was an error voiding the manifest stop. Please try again.',
	'errorcode' => 1000,
));
