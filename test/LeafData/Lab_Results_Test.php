<?php
/**
 * Test Lab Results
 */

namespace Test\LeafData;

class Lab_Results_Test extends \Test\LeafData
{
	protected $path = 'lab_results';

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
