<?php
/**
 * Test Strains
 */

namespace Test\LeafData;

class Strains_Test extends \Test\LeafData
{
	protected $path = 'strains';

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
		$this->assertValidDelete($res);
	}
}
