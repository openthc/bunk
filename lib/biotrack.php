<?php
/**
	A Mock BioTrackTHC API
*/

//require_once(APP_ROOT . '/lib/RBE/BioTrack.php');
require_once(__DIR__ . '/biotrack/lib.php');

class BioTrack_Response extends Slim\Http\Response
{
	function withJSON($json, $code=200, $opts=JSON_PRETTY_PRINT)
	{
		return parent::withJSON($json, $code, $opts);
	}
}

$RES = new BioTrack_Response();

$auth_db = new \Redis();
$auth_db->connect('127.0.0.1');

$time = $_SERVER['REQUEST_TIME'];

$mime = strtok($_SERVER['HTTP_CONTENT_TYPE'], ';');

// Parse/Load JSON
$post = file_get_contents('php://input');

if (empty($post)) {
	return $RES->withJSON(array(
		'success' => 0,
		'_detail' => 'MFB#034: There was no JSON input',
	));
}

// Good JSON?
$json = json_decode($post, true);
if (empty($json)) {
	return $RES->withJSON(array(
		'success' => 0,
		'_detail' => 'MFB#034: Error Decoding Input',
		'_errors' => json_last_error_msg(),
		'_input' => $post,
	), 400, JSON_PRETTY_PRINT);
}

// API
if ($json['API'] != '4.0') {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'Invalid API Version',
		'errorcode' => 17,
		'_detail' => 'The "API" key must be provided, the only allowed value is "4.0"',
		'_request' => $json,
	), 400);
}

// Action
if (empty($json['action'])) {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'Invalid Action',
		'errorcode' => 62,
		'_detail' => 'The "action" parameter must be provided',
		'_request' => $json,
	), 400);
}
if (!preg_match('/^\w+$/', $json['action'])) {
	return $RES->withJSON(array(
		'success' => 0,
		'_detail' => 'Invalid "action" parameter',
		'_request' => $json,
	), 400);
}

// Load Session from Redis
if (!empty($json['sessionid'])) {

	$h = $json['sessionid'];
	$h = preg_match('/^([0-9a-f]{128})$/', $h, $m) ? $m[1] : null;
	$k = sprintf('api-fake/' . $h);
	$x = $auth_db->hGetAll($k);
	$_SESSION = $x;

}

// Manual Switch based on action, for dummy/simple API calls
// Just Show Success Each Time
switch ($json['action']) {
// Core Data Stuffs
case 'employee_add':
case 'employee_modify':
case 'employee_remove':
case 'inventory_room_add':
case 'inventory_room_modify':
case 'inventory_room_remove':
case 'plant_room_add':
case 'plant_room_modify':
case 'plant_room_remove':
case 'vehicle_add':
case 'vehicle_modify':
case 'vehicle_remove':
// Grow Data
case 'inventory_adjust':
case 'inventory_destroy':
case 'inventory_destroy_schedule':
case 'inventory_destroy_schedule_undo':
case 'inventory_manifest_void':
case 'inventory_manifest_void_stop':
case 'inventory_manifest_void_items':
case 'inventory_modify':
case 'inventory_move':
case 'inventory_qa_sample_void':
case 'inventory_transfer_inbound_modify':
case 'inventory_transfer_outbound_void':
case 'plant_convert_to_inventory':
case 'plant_destroy':
case 'plant_destroy_schedule':
case 'plant_harvest_schedule':
case 'plant_modify':
case 'plant_move':
case 'plant_yield_modify':
case 'sale_dispense':
case 'sale_modify':
case 'sale_refund':
case 'sale_void':

	return $RES->withJSON(array(
		'success' => 1,
		'transactionid' => _rnd_transaction_id(),
		'sessiontime' => $_SERVER['REQUEST_TIME'],
	));

	break;

default:

	// Response Handler?
	$file = sprintf('%s/biotrack/%s.php', __DIR__, $json['action']);
	if (is_file($file)) {
		return require_once($file);
	}

	break;
}

// Failed
return $RES->withJSON(array(
	'_request' => $json,
	'success' => 0,
	'error' => 'Unhandled Request',
	'errorcode' => 999,
), 500);
