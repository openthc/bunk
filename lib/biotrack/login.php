<?php
/**
 * Simulate the BioTrack API for Login
 * HI, IL, NM, WA
 *
 * SPDX-License-Identifier: MIT
 */

use Edoceo\Radix\DB\SQL;

if (empty($json['license_number'])) {

	return $RES->withJSON(array(
		'success' => 0,
		// 'errorcode' => null, // Not Set by BioTrack
		'error' => 'Company identifier not provided (license_number) [LBL-012]',
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
		'_detail' =>  'Invalid Company Identifier, only Test IDs allowed [LBL-040]',
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

$_SESSION['Company'] = [
	'id' => $json['license_number']
];
$sql_file = sprintf('%s/var/biotrack_%s.sqlite', APP_ROOT, $_SESSION['Company']['id']);
if ( ! is_file($sql_file)) {

	$dsn = sprintf('sqlite:%s', $sql_file);
	$dbc = new SQL($dsn);

	$dbc->query('CREATE TABLE section (id, name, meta)');
	// $dbc->query('CREATE TABLE variety (id, name, meta)');
	// $dbc->query('CREATE TABLE product (id, name, meta)');

	$dbc->query('CREATE TABLE crop (id, name, meta)');
	$dbc->query('CREATE TABLE crop_collect (id, name, meta)');

	$dbc->query('CREATE TABLE inventory (id, name, meta)');
	$dbc->query('CREATE TABLE inventory_adjust (id, name, meta)');

	$dbc->query('CREATE TABLE b2b_incoming (id, name, meta)');
	$dbc->query('CREATE TABLE b2b_incoming_item (id, b2b_incoming_id, name, meta)');

	$dbc->query('CREATE TABLE b2b_outgoing (id, name, meta)');
	$dbc->query('CREATE TABLE b2b_outgoing_item (id, b2b_outgoing_id, name, meta)');

}


return $RES->withJSON([
	'success' => 1,
	'admin' => 1,
	'sessionid' => session_id(),
	'time' => $_SERVER['REQUEST_TIME'],
]);
