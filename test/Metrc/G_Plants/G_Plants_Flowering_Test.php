<?php 

namespace Test\Metrc\G_Plants;

class G_Plants_Flowering_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/flowering';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
