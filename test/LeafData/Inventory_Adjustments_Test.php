<?php
/**
 * Test Inventory Adjustments
 */

namespace Test\LeafData;

class Inventory_Adjustments_Test extends \Test\LeafData_Test
{
	protected $path = 'inventory_adjustments';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

	function test_post()
	{
		$res = $this->ghc->post_json($this->path);
		$this->assertValidResponse($res);
	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidDelete($res, $this->path);
	}
}
