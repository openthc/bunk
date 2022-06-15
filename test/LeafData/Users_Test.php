<?php
/**
 * Test Users
 */

namespace OpenTHC\Bunk\Test\LeafData;

class Users_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected $path = 'users';

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
