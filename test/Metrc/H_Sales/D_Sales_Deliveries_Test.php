<?php

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class D_Sales_Deliveries_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'sales/v1/deliveries';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"SalesDateTime"=> date('Y-m-d g:ia'),
				"SalesCustomerType"=> "Consumer",
				"PatientLicenseNumber"=> null,
				"ConsumerId"=> null,
				"DriverName"=> "John Doe",
				"DriverOccupationalLicenseNumber"=> "1",
				"DriverVehicleLicenseNumber"=> "1",
				"PhoneNumberForQuestions"=> "+1-123-456-7890",
				"VehicleMake"=> "Car",
				"VehicleModel"=> "Small",
				"VehicleLicensePlateNumber"=> "000000",
				"RecipientName"=> null,
				"RecipientAddressStreet1"=> "1 Someplace Road",
				"RecipientAddressStreet2"=> "Ste 9",
				"RecipientAddressCity"=> "Denver",
				"RecipientAddressState"=> "CO",
				"RecipientAddressPostalCode"=> "11111",
				"PlannedRoute"=> "Drive to destination.",
				"EstimatedDepartureDateTime"=> date('Y-m-d g:ia'),
				"EstimatedArrivalDateTime"=> date('Y-m-d g:ia'),
				"Transactions"=> [
					[
					"PackageLabel"=> "ABCDEF012345670000000001",
					"Quantity"=> 1.0,
					"UnitOfMeasure"=> "Ounces",
					"TotalAmount"=> 9.99
					],
					[
					"PackageLabel"=> "ABCDEF012345670000000002",
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
