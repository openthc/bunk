<?php
/**
*/

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the plant_modify privilege.',
	'errorcode' => 62,
));


return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You did not provide any data to update.',
	'errorcode' => 602,
));
