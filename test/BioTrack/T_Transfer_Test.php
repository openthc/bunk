<?php
/**
 * Test Basic Sync
 */

namespace Test\BioTrack;

class T_Transfer_Test extends \Test\BioTrack_Test
{
	function test_search()
	{
		#_curl '{ "action": "inventory_transfer_lookup", "location": "499995",  }'
		// _curl_post '{ "action": "inventory_transfer_lookup" }'
	}

	function test_search_incoming()
	{
		#_curl '{ "action": "inventory_transfer_inbound", "location": "$LICENSE",  }'
		// _curl_post '{ "action": "inventory_transfer_inbound" }'
		// _curl_post '{ "action": "inventory_transfer_inbound_modify" }'
	}

	function test_search_outgoing()
	{
		#_curl '{ "action": "inventory_transfer_outbound", "location": "$LICENSE",  }'
		// _curl_post '{ "action": "inventory_transfer_outbound" }'
		// _curl_post '{ "action": "inventory_transfer_outbound_modify" }'
		// _curl_post '{ "action": "inventory_transfer_outbound_return_lookup" }'
		// _curl_post '{ "action": "inventory_transfer_outbound_void" }'
	}

}
