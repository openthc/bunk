<?php
/**
 * A Mock BioTrackTHC API
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

$RES = new \OpenTHC\Bunk\BioTrack\Response();

$time = $_SERVER['REQUEST_TIME'];
$type_sent = strtolower(strtok($_SERVER['HTTP_CONTENT_TYPE'], ';'));

// Parse/Load JSON
$post = file_get_contents('php://input');

if (empty($post)) {
	return $RES->withJSON(array(
		'success' => 0,
		'meta' => [ 'note' => 'There was no JSON input [OBM-034]' ],
	), 400);
}

// Good JSON?
$json = json_decode($post, true);
if (empty($json)) {
	return $RES->withJSON(array(
		'success' => 0,
		'meta' => [
			'note' => 'Error Decoding Input [OBM-041]',
			'json_error' => json_last_error_msg(),
			'json_source' => $post,
		]
	), 400);
}

// API
if ($json['API'] != '4.0') {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'Invalid API Version',
		'errorcode' => 17,
		'meta' => [
			'note' => 'The "API" key must be provided, the only allowed value is "4.0"',
			'json_source' => $json,
		]
	), 400);
}

// Action
if (empty($json['action'])) {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'Invalid Action',
		'errorcode' => 62,
		'meta' => [
			'note' => 'The "action" parameter must be provided',
			'json_source' => $json,
		]
	), 400);
}
if ( ! preg_match('/^\w+$/', $json['action'])) {
	return $RES->withJSON(array(
		'success' => 0,
		'meta' => [
			'note' => 'Invalid "action" parameter',
			'json_source' => $json,
		]
	), 400);
}

// Load Given Session ID
if ( ! empty($json['sessionid'])) {
	session_id($json['sessionid']);
	session_start();
}

// Manual Switch based on action, for dummy/simple API calls
// Just Show Success Each Time
switch ($json['action']) {
// Core Data Stuffs
case 'employee_add':
case 'employee_modify':
case 'employee_remove':
case 'inventory_room_modify':
case 'inventory_room_remove':
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
		'transactionid' => Base::_rnd_transaction_id(),
		'sessiontime' => $_SERVER['REQUEST_TIME'],
	));

	break;

default:

	$action_path = sprintf('%s/%s.php', __DIR__, $json['action']);
	if (substr_count($json['action'], '_')) {
		$action_base = strtok($json['action'], '_');
		$action_file = str_replace($action_base, null, $json['action']);
		$action_file = trim($action_file, '_');
		$action_path = sprintf('%s/%s/%s.php', __DIR__, $action_base, $action_file);
	}

	// Response Handler?
	if (is_file($action_path)) {
		return require_once($action_path);
	}

	break;
}

// Failed
return $RES->withJSON([
	'success' => 0,
	'error' => 'Unhandled Request',
	'errorcode' => 999,
	'@openthc' => [
		'request_body' => $json,
		'action_base' => $action_base,
		'action_file' => $action_file,
		'action_path' => $action_path,
	]
], 500);
