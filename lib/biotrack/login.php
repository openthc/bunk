<?php
/**
 * Simulate the BioTrack API for Login
 * HI, IL, NM, WA
 */

if (empty($json['license_number'])) {

	return $RES->withJSON(array(
		'success' => 0,
		// 'errorcode' => null, // Not Set by BioTrack
		'error' =>  'BUNK#012: Company identifier not provided (license_number)',
		'_request' => $json,
	));
}

if (empty($json['username'])) {
	return $RES->withJSON([
		'success' => 0,
		'error' => 'Invalid username or password.',
		'_request' => $json,
	]);
}


// Validate against Fixed List
// The parameter called 'license_number' is really the UBI or Company ID
// BioTrack calls the Company the License
// BioTrack calls the License the Location
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

	// OK
	break;

default:

	return $RES->withJSON(array(
		'success' => 0,
		// 'error' => null, // Not Set by BioTrack
		// 'errorcode' => null, // Not Set by BioTrack
		'_detail' =>  'Invalid Company Identifier, only Test IDs allowed [LBL#040]',
		'_request' => $json,
	));

}

$cfg = \OpenTHC\Config::get('biotrack_bunk');
if (!empty($cfg['login_fail'])) {
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
}

session_start();

return $RES->withJSON([
	'success' => 1,
	'admin' => 1,
	'sessionid' => session_id(),
	'time' => $_SERVER['REQUEST_TIME'],
]);
