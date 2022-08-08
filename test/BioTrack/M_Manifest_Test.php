<?php
/**
 * Test B2B
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class M_Manifest_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_search()
	{
		#_curl "" "" '{ "action": "inventory_manifest_lookup", "location": "$LICENSE" }'
		$this->assertTrue(true);
	}

	function test_create()
	{
		#_curl "699999990" "499990" '{ "action": "inventory_manifest", "location": "499990" }'
		$this->assertTrue(true);
	}

	function test_create_pickup()
	{
		// _curl "699999991" "499991" '{ "action": "inventory_manifest_pickup", "location": "499991" }'
		$this->assertTrue(true);
	}

	function test_create_third_party()
	{
		// _curl "699999992" "499992" '{ "action": "inventory_manifest_third_party", "location": "499992" }'
		$this->assertTrue(true);
	}

}

# Search for Inbound Manifests


// _curl_post '{ "action": "inventory_manifest" }'
// _curl_post '{ "action": "inventory_manifest_lookup" }'
// _curl_post '{ "action": "inventory_manifest_pickup" }'
// _curl_post '{ "action": "inventory_manifest_third_party" }'
// _curl_post '{ "action": "inventory_manifest_void" }'
// _curl_post '{ "action": "inventory_manifest_void_items" }'
// _curl_post '{ "action": "inventory_manifest_void_stop" }'
