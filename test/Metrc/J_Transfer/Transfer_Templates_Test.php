<?php

namespace Test\Metrc\J_Transfer;

class Transfer_Templates_Test extends \Test\Metrc_Test
{
	
	protected $path = 'transfers/v1/templates';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Name" => "Template 1",
				"TransporterFacilityLicenseNumber" => null,
				"DriverOccupationalLicenseNumber" => null,
				"DriverName" => null,
				"DriverLicenseNumber" => null,
				"PhoneNumberForQuestions" => null,
				"VehicleMake" => null,
				"VehicleModel" => null,
				"VehicleLicensePlateNumber" => null,
				"Destinations" => [
					[
						"RecipientLicenseNumber" => "123-XYZ",
						"TransferTypeName" => "Transfer",
						"PlannedRoute" => "I will drive down the road to the place.",
						"EstimatedDepartureDateTime" => "2018-03-06T09:15:00.000",
						"EstimatedArrivalDateTime" => "2018-03-06T12:24:00.000",
						"Transporters" => [
							[
								"TransporterFacilityLicenseNumber" => "123-ABC",
								"DriverOccupationalLicenseNumber" => "50",
								"DriverName" => "X",
								"DriverLicenseNumber" => "5",
								"PhoneNumberForQuestions" => "18005555555",
								"VehicleMake" => "X",
								"VehicleModel" => "X",
								"VehicleLicensePlateNumber" => "X",
								"IsLayover" => false,
								"EstimatedDepartureDateTime" => "2018-03-06T12:00:00.000",
								"EstimatedArrivalDateTime" => "2018-03-06T21:00:00.000",
								"TransporterDetails" => null
							]
						],
						"Packages" => [
							[
								"PackageLabel" => "ABCDEF012345670000010026",
								"WholesalePrice" => null
							],
							[
								"PackageLabel" => "ABCDEF012345670000010027",
								"WholesalePrice" => null
							]
						]
					]
				]
			]
		);
	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidResponse($res);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}