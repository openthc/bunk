<?php
/**
 * Test Disposals
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\LeafData;

class Disposals_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected $path = 'disposals';

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

	function test_post_daily_waste()
	{

	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidDelete($res, $this->path);
	}
}
