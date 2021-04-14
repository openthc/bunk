<?php 

namespace Test\Metrc\H_Sales;

class H_Sales_Receipts_Test extends \Test\Metrc_Test {

	protected $path = 'sales/v1/receipts';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body =  array(
			[
				"SalesDateTime"=> "2016-10-04T16:44:53.000",
				"SalesCustomerType"=> "Consumer",
				"PatientLicenseNumber"=> null,
				"CaregiverLicenseNumber"=> null,
				"IdentificationMethod"=> null,
				"Transactions"=> [
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
				]
			]
		);
	}

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
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
