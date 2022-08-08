<?php
/**
 * Test MMEs
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\LeafData;

class MMEs_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected $path = 'mmes';

	function test_get()
	{
		// This is one with the different response
		$res = $this->ghc->get('mmes');
		$this->assertNotEmpty($res);
		$this->assertEquals(200, $res->getStatusCode());
		$this->assertValidResponse($res);

		$raw = $res->getBody()->getContents();
		$this->assertNotEmpty($raw);

		$ret = \json_decode($raw, true);
		// $this->assertValidResponse($res);
		$this->assertIsArray($ret);

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
