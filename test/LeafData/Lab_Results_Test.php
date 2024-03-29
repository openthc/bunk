<?php
/**
 * Test Lab Results
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\LeafData;

class Lab_Results_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected $path = 'lab_results';

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
