<?php
/**
 * Test Sales
 */

namespace Test\LeafData;

class Sales_Test extends \Test\LeafData_Test
{
	protected $path = 'sales';

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
		$this->assertValidDelete($res, $this->path);
	}
}
