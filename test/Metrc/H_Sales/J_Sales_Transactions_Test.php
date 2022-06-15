<?php

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class J_Sales_Transactions_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'sales/v1/transactions';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"PackageLabel"=> "ABCDEF012345670000010331",
				"Quantity"=> 1.0,
				"UnitOfMeasure"=> "Ounces",
				"TotalAmount"=> 9.99
				],
				[
				"PackageLabel"=> "ABCDEF012345670000010332",
				"Quantity"=> 1.0,
				"UnitOfMeasure"=> "Ounces",
				"TotalAmount"=> 9.99
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidDelete($res, $this->path);
	}

}
