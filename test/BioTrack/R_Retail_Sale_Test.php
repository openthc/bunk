<?php
/**
 * Test Basic Sync
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class R_Retail_Sale_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	/**
	 *
	 */
	function test_create()
	{
		$res = $this->post_json('', [
			'action' => 'employee_remove',
		]);
		$res = $this->assertValidResponse($res);
		// _curl_post '{ "action": "sale_dispense" }'
	}

	/**
	 *
	 */
	function test_update()
	{
		$res = $this->post_json('', [
			'action' => 'sale_modify',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 *
	 */
	function test_refund()
	{
		$res = $this->post_json('', [
			'action' => 'sale_refund',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 *
	 */
	function test_delete()
	{
		$res = $this->post_json('', [
			'action' => 'sale_void',
		]);
		$res = $this->assertValidResponse($res);
	}

}
