<?php
/**
 * Test Basic Sync
 */

namespace Test\BioTrack;

class M_Manifest_Test extends \Test\BioTrack_Test
{

}

#
#
#_curl "699999990" "499990" '{ "action": "inventory_manifest", "location": "499990" }'
#_curl "699999991" "499991" '{ "action": "inventory_manifest_pickup", "location": "499991" }'
#_curl "699999992" "499992" '{ "action": "inventory_manifest_third_party", "location": "499992" }'

# Search for Inbound Manifests
#_curl "" "" '{ "action": "inventory_manifest_lookup", "location": "$LICENSE" }'

// _curl_post '{ "action": "inventory_manifest" }'
// _curl_post '{ "action": "inventory_manifest_lookup" }'
// _curl_post '{ "action": "inventory_manifest_pickup" }'
// _curl_post '{ "action": "inventory_manifest_third_party" }'
// _curl_post '{ "action": "inventory_manifest_void" }'
// _curl_post '{ "action": "inventory_manifest_void_items" }'
// _curl_post '{ "action": "inventory_manifest_void_stop" }'
