<?php
/**
 * Test Basic Sync
 */

namespace Test\BioTrack;

class T_Transfer_Test extends \Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	/**
	 *
	 */
	function test_search()
	{
		#_curl '{ "action": "inventory_transfer_lookup", "location": "499995",  }'
		// _curl_post '{ "action": "inventory_transfer_lookup" }'
		$res = $this->post_json('', [
			'action' => 'inventory_transfer_lookup',
			'location' => '123456',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 *
	 */
	function test_incoming_search()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_transfer_inbound',
			'location' => '123456',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 *
	 */
	function test_incoming_modify()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_transfer_inbound_modify',
			'location' => '123456',
		]);
		$res = $this->assertValidResponse($res);


	}

	/**
	 *
	 */
	function test_search_outgoing()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_transfer_outbound',
			'location' => '123456',
		]);
		$res = $this->assertValidResponse($res);
		// _curl_post '{ "action": "inventory_transfer_outbound_modify" }'
		// _curl_post '{ "action": "inventory_transfer_outbound_return_lookup" }'
		// _curl_post '{ "action": "inventory_transfer_outbound_void" }'
	}

}
