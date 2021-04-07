<?php

namespace Test\Metrc\J_Transfer;

class Transfer_Templates_Test extends \Test\Metrc_Test
{
	
	protected $path = 'transfers/v1/templates';

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidResponse($res);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}