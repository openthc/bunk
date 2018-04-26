<?php
/**
	Simulate the BioTrack API for Login
	HI, WA
*/

if (empty($json['license_number'])) {

	return $RES->withJSON(array(
		'success' => 0,
		// 'errorcode' => null, // Not Set by BioTrack
		'error' =>  'BUNK#012: Company identifier not provided (license_number)',
		'_request' => $json,
	));
}

// If you want to validate Company IDs
if (false) {

	switch ($json['license_number']) {
	case '999999999':
	case '888888888':
	case '777777777':
	case '666666666':
	case '555555555':
	case '444444444':
	case '333333333':
	case '222222222':
	case '111111111':
	case '123456789':

		// OK
		break;

	default:

		return $RES->withJSON(array(
			'success' => 0,
			// 'errorcode' => null, // Not Set by BioTrack
			'error' =>  'LBL#040: Invalid Company Identifier',
			'_request' => $json,
		));

	}
}

// 10% of the time say invalid username/password
//if ($rpct <= 10) {
//
//	return $RES->withJSON(array(
//		'_request' => $json,
//		'success' => 0,
//		// 'errorcode' => null, // Not Set by BioTrack
//		'error' =>  'Invalid username or password.',
//	));
//
//}

$hash = hash('sha512', openssl_random_pseudo_bytes(512));
$hkey = sprintf('api-fake/%s', $hash);

$auth_db->hset($hkey, 'ubi', $json['license_number']);
$auth_db->expire($hkey, 3600);

return $RES->withJSON(array(
	'success' => 1,
	'admin' => 1,
	'sessionid' => $hash,
	'time' => $_SERVER['REQUEST_TIME'],
	'_request' => $json,
));
