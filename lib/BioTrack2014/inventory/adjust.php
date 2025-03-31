<?php
/**
*/

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You cannot create marijuana mix lots greater than 5 pounds.',
	'errorcode' => 202,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You cannot create flower lots greater than 5 pounds.',
	'errorcode' => 202,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You cannot create flower lots greater than 15 pounds.',
	'errorcode' => 202,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You do not currently have possession of identifier 6033499030000217.',
	'errorcode' => 602,
));
