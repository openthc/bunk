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
case '999000100':
case '999000200':
case '999000300':
case '999000500':
case '999000600':
case '999000700':

	// OK
	break;

case '999000403': // Always Gives this Error

	return $RES->withJSON([
		'success' => 0,
		'error' => 'Invalid username or password.',
		// 'errorcode' => '602', // Not Provided on this one
	]);

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
$_SESSION = [];
$_SESSION['Company'] = [
	'id' => $json['license_number']
];
$sql_file = sprintf('%s/var/biotrack_%s.sqlite', APP_ROOT, $_SESSION['Company']['id']);
$_SESSION['Company']['dsn'] = sprintf('sqlite:%s', $sql_file);

if ( ! is_file($sql_file)) {

	$dbc = new SQL($_SESSION['Company']['dsn']);

	// \OpenTHC\Bunk\BioTrack\Seed::create($dbc);

	$dbc->query('CREATE TABLE license (id, name, meta)');
	$dbc->insert('license', [
		'id' => '990001',
		'name' => 'Bunk Grower',
		'meta' => json_encode([
			'ubi' => '999000100',
			'location' => '990010',
			'name' => 'Bunk Grower',
			'locationtype' => 1,
			'address1' => '111 FAKE ST   STE 1',
			'address2' => 'STE 1',
			'city' => 'Oakland',
			'state' => 'CA',
			'zip' => '94601',
			'processor' => 0,
			'producer' => 1,
			'retail' => 0,
			'deleted' => 0,
			'medical' => 0,
			'transactionid' => 990010,
			'transactionid_original' => 990010,
		])
	]);
	$dbc->insert('license', [
		'id' => '990020',
		'name' => 'Bunk Processor',
		'meta' => json_encode([
			'ubi' => '999000200',
			'location' => '990020',
			'name' => 'Bunk Processor',
			'locationtype' => 2,
			'address1' => '123 FAKE ST   STE 2',
			'address2' => 'STE 2',
			'city' => 'Oakland',
			'state' => 'CA',
			'zip' => '94601',
			'processor' => 1,
			'producer' => 0,
			'retail' => 0,
			'deleted' => 0,
			'medical' => 0,
			'transactionid' => 990020,
			'transactionid_original' => 990020,
		])
	]);
	$dbc->insert('license', [
		'id' => '990030',
		'name' => 'Bunk Producer/Processor',
		'meta' => json_encode([
			'ubi' => '999000300',
			'location' => '990030',
			'name' => 'Bunk Producer/Processor',
			'locationtype' => 3, // ??
			'address1' => '123 FAKE ST   STE 3',
			'address2' => 'STE 3',
			'city' => 'Oakland',
			'state' => 'CA',
			'zip' => '94601',
			'processor' => 1,
			'producer' => 1,
			'retail' => 0,
			'deleted' => 0,
			'medical' => 0,
			'transactionid' => 990030,
			'transactionid_original' => 990030,
		])
	]);
	$dbc->insert('license', [
		'id' => '990050',
		'name' => 'Bunk Laboratory',
		'meta' => json_encode([
			'ubi' => '999000500',
			'location' => '990050',
			'name' => 'Bunk Laboratory',
			// 'locationtype' => 3, // ??
			'address1' => '555 FAKE ST',
			'address2' => 'STE 5',
			'city' => 'Oakland',
			'state' => 'CA',
			'zip' => '94601',
			'processor' => 0,
			'producer' => 0,
			'retail' => 0,
			'deleted' => 0,
			'medical' => 0,
			'transactionid' => 990050,
			'transactionid_original' => 990050,
		])
	]);

	$dbc->query('CREATE TABLE section (id, name, type, meta)');
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
