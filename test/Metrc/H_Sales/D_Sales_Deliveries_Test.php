<?php 

namespace Test\Metrc\H_Sales;

class D_Sales_Deliveries_Test extends \Test\Metrc_Test {

	protected $path = 'sales/v1/deliveries';

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

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidDelete($res, $this->path);
	}

}