<?php
/**
 * Test Basic Sync
 */

namespace Test\BioTrack;

class D_Crop_Test extends \Test\BioTrack_Test
{


}

##_curl '{ "action": "plant_new", "location": "$LICENSE", "source": "################", "quantity": 5, "room": 5, "strain": "Text", "mother": 1 }'
##_curl '{ "action": "plant_harvest", "barcodeid": "################", "collectadditional": 0, "new_room": "5", "weights" : [] }'
##_curl '{ "action": "plant_cure", "location": "$LICENSE", "barcodeid": [ "################" ], "weights": [ {} ] }'

#
#
##_curl '{ "action": "plant_convert_to_inventory", }'
##_curl '{ "action": "plant_move", }'
##_curl '{ "action": "plant_destroy_schedule", }'
##_curl '{ "action": "plant_destroy", }'
##_curl '{ "action": "plant_waste_weigh", }'

// _curl_post '{ "action": "plant_convert_to_inventory" }'
// _curl_post '{ "action": "plant_cure" }'
// _curl_post '{ "action": "plant_destroy" }'
// _curl_post '{ "action": "plant_destroy_schedule" }'
// _curl_post '{ "action": "plant_harvest" }'
// _curl_post '{ "action": "plant_harvest_schedule" }'
// _curl_post '{ "action": "plant_modify" }'
// _curl_post '{ "action": "plant_move" }'
// _curl_post '{ "action": "plant_new" }'
// _curl_post '{ "action": "plant_waste_weigh" }'
// _curl_post '{ "action": "plant_yield_modify" }'
