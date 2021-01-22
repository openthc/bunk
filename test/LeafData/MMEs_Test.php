<?php
/**
 * Test MMEs
 */

namespace Test\LeafData;

class MMEs_Test extends \Test\LeafData
{
	protected $path = '/mmes';

	function test_get()
	{
		// This is one with the different response
		$res = $this->ghc->get('mmes');
		$this->assertNotEmpty($res);
		$this->assertEquals(200, $res->getStatusCode());

		$raw = $res->getBody()->getContents();
		$this->assertNotEmpty($raw);

		$ret = \json_decode($raw, true);
		// $this->assertValidResponse($res);
		$this->assertIsArray($ret);

	}


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
