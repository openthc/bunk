<?php
/**
 * Test Inventory Transfers
 */

namespace Test\LeafData;

class Inventory_Transfers_Test extends \Test\LeafData
{
	protected $path = '/inventory_transfers';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidResponse($res);
	}
}
