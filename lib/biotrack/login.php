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


// Validate against Fixed List
// The parameter called 'license_number' is really the UBI
$ubi = $json['license_number'];
$lic = preg_match('/^(99).+(\d\d)$/', $ubi, $m) ? sprintf('%02d00%02d', $m[1], $m[2]) : null;

switch ($ubi) {
case '999000001':
case '999000002':
case '999000003':
case '999000004':
case '999000005':
case '999000006':
case '999000007':
case '999000008':
case '999000009':
case '999999999':

	// OK
	break;

default:

	return $RES->withJSON(array(
		'success' => 0,
		// 'error' => null, // Not Set by BioTrack
		// 'errorcode' => null, // Not Set by BioTrack
		'_detail' =>  'LBL#040: Invalid Company Identifier',
		'_request' => $json,
	));

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

$auth_db->hset($hkey, 'ubi', $ubi);
$auth_db->hset($hkey, 'lic', $lic);
$auth_db->expire($hkey, 3600);

return $RES->withJSON(array(
	'success' => 1,
	'admin' => 1,
	'sessionid' => $hash,
	'time' => $_SERVER['REQUEST_TIME'],
));
