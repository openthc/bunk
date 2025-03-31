<?php
/**
	User Remove
*/

return $RES->withJSON(array(
	'success' => 1,
));

if ($rpct <= 10) {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'The user you provided could not be found.',
	));
}
