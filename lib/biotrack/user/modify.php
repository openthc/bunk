<?php
/**
	Just make random errors
*/


return $RES->withJSON(array(
	'success' => 1,
));

/*
{"action":"user_modify","new_admin":1,"new_username":"itskckush@gmail.com","new_permissions":{"justauthenticate":1,"sync_check":1,"sync_employee":1,"sync_inventory":1,"sync_inventory_adjust":1,"sync_inventory_qa_sample":1,"sync_inventory_sample":1,"sync_inventory_room":1,"sync_inventory_transfer":1,"sync_inventory_transfer_inbound":1,"sync_manifest":1,"sync_plant":1,"sync_plant_derivative":1,"sync_plant_room":1,"sync_qa_lab":1,"sync_sale":1,"sync_tax_report":1,"sync_third_party_transporter":1,"sync_vehicle":1,"sync_vendor":1,"plant_new":1,"plant_new_undo":1,"plant_move":1,"plant_modify":1,"plant_harvest_schedule":1,"plant_harvest_schedule_undo":1,"plant_harvest":1,"plant_harvest_undo":1,"plant_cure":1,"plant_cure_undo":1,"plant_yield_modify":1,"plant_convert_to_inventory":1,"plant_waste_weigh":1,"plant_destroy_schedule":1,"plant_destroy_schedule_undo":1,"plant_destroy":1,"inventory_new":1,"inventory_move":1,"inventory_adjust":1,"inventory_adjust_usable":1,"inventory_modify":1,"inventory_create_lot":1,"inventory_split":1,"inventory_convert":1,"inventory_convert_undo":1,"inventory_sample":1,"inventory_qa_check":1,"inventory_qa_check_all":1,"inventory_qa_sample":1,"inventory_qa_sample_non_mandatory":1,"inventory_qa_sample_void":1,"inventory_check":1,"inventory_destroy_schedule":1,"inventory_destroy_schedule_undo":1,"inventory_destroy":1,"inventory_manifest":1,"inventory_manifest_pickup":1,"inventory_manifest_third_party":1,"inventory_manifest_modify":1,"inventory_manifest_lookup":1,"inventory_manifest_void":1,"inventory_manifest_void_stop":1,"inventory_manifest_void_items":1,"inventory_transfer_lookup":1,"inventory_transfer_inbound":1,"inventory_transfer_inbound_modify":1,"inventory_transfer_outbound":1,"inventory_transfer_outbound_modify":1,"inventory_transfer_outbound_return_lookup":1,"inventory_transfer_outbound_return":1,"inventory_transfer_outbound_void":1,"plant_room_add":1,"plant_room_modify":1,"plant_room_remove":1,"inventory_room_add":1,"inventory_room_modify":1,"inventory_room_remove":1,"vehicle_add":1,"vehicle_modify":1,"vehicle_remove":1,"employee_add":1,"employee_modify":1,"employee_remove":1,"user_add":1,"user_modify":1,"user_remove":1,"tax_obligation_file":1,"card_lookup":1,"sale_dispense":1,"sale_modify":1,"sale_refund":1,"sale_void":1},"new_password":"GreenChief420","API":"4.0","sessionid":"48139a9d2911e5c53f6dc86d3785b702b52a696b42200991ba7a240e3a0579cfc0ee039413be07f95154152e847e0487d526f95d6a48b4ff58f22d210474f5e8","nonce":"4f144003995fc90abda1a4f6fe1a520d796fcfb7"}
*/

if ($rpct <= 10) {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'The user you provided could not be found.',
		//'errorcode' => null,
	));
}

if ($rpct <= 20) {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'Your password was too simple. Please choose another password and try again.',
		//'errorcode' => null,
	));
}

if ($rpct <= 30) {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'You did not provide any information to update.',
		//'errorcode' => null,
	));
}
