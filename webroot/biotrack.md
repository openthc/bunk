# BioTrackTHC Mock API Interface

It's like the *serverjson.asp* interface that BioTrack provides.
It's compatible with WA, HI, IL, ND, NM interfaces.

## Usage

 * **$BASE** is $HOST/biotrack/v2013/serverjson.asp

Like the standard BioTrack API you simply login() and get a session token.
This session token is then included with all subsequent calls.

	POST /biotrack/v2013/serverjson.asp
	Content-Type: text/JSON

	{ "license_number": "", "username": "", "password": "" }

## Example

    curl \
		$HOST/biotrack/v2013/serverjson.asp \
		-X POST \
		-H "content-type: application/json" \
		--data '{
			"action": "login",
			"license_number": "",
			"username": "",
			"password": ""
		}'


## Extended Data

Some responses will come with extended data, maybe useful for debugging.
They will all begin with an underscore prefix, *_detail* or or something.


## Supported Calls:

 * employee_add
 * employee_modify
 * employee_remove
 * employee_remove
 * inventory_adjust
 * inventory_adjust
 * inventory_adjust_usable
 * inventory_check
 * inventory_convert
 * inventory_convert_undo
 * inventory_create_lot
 * inventory_destroy
 * inventory_destroy_schedule
 * inventory_destroy_schedule_undo
 * inventory_manifest
 * inventory_manifest_lookup
 * inventory_manifest_pickup
 * inventory_manifest_third_party
 * inventory_manifest_void
 * inventory_manifest_void
 * inventory_manifest_void_items
 * inventory_manifest_void_items
 * inventory_manifest_void_stop
 * inventory_manifest_void_stop
 * inventory_modify
 * inventory_modify
 * inventory_move
 * inventory_new
 * inventory_qa_check
 * inventory_qa_check_all
 * inventory_qa_sample
 * inventory_qa_sample_non_mandatory
 * inventory_qa_sample_results
 * inventory_qa_sample_void
 * inventory_qa_sample_void
 * inventory_room_add
 * inventory_room_modify
 * inventory_room_remove
 * inventory_sample
 * inventory_split
 * inventory_transfer_inbound
 * inventory_transfer_inbound_modify
 * inventory_transfer_lookup
 * inventory_transfer_outbound
 * inventory_transfer_outbound_modify
 * inventory_transfer_outbound_return_lookup
 * inventory_transfer_outbound_void
 * login
 * plant_convert_to_inventory
 * plant_cure
 * plant_destroy
 * plant_destroy_schedule
 * plant_harvest
 * plant_harvest_schedule
 * plant_modify
 * plant_modify
 * plant_move
 * plant_new
 * plant_room_add
 * plant_room_modify
 * plant_room_remove
 * plant_waste_weigh
 * plant_yield_modify
 * sale_dispense
 * sale_modify
 * sale_refund
 * sale_void
 * sync_check
 * sync_employee
 * sync_inventory
 * sync_inventory_adjust
 * sync_inventory_qa_sample
 * sync_inventory_room
 * sync_inventory_sample
 * sync_inventory_transfer
 * sync_inventory_transfer_inbound
 * sync_manifest
 * sync_plant
 * sync_plant_derivative
 * sync_plant_room
 * sync_qa_lab
 * sync_sale
 * sync_tax_report
 * sync_third_party_transporter
 * sync_vehicle
 * sync_vendor
 * tax_obligation_file
 * user_add
 * user_modify
 * user_remove
 * vehicle_add
 * vehicle_modify
 * vehicle_remove


## See Alsow

 * HI Documentation: https://www.biotrack.com/wp-content/uploads/2018/03/JSON-1.pdf
 * IL Documentation: https://www.biotrack.com/wp-content/uploads/2018/04/IL-JSON-2-1.pdf
 * NM Documentation: https://www.biotrack.com/wp-content/uploads/2018/01/JSON-2.pdf
