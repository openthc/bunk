<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\J_Transfer;

class Transfer_Delivery_External_Incoming_Test extends \OpenTHC\Bunk\Test\Metrc\Base
{

	protected $path = 'transfers/v1/delivery/external/incoming';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body =  array(
			[
				"ShipperLicenseNumber" => "123-ABC",
				"ShipperName" => "Lofty Med-Cultivation B",
				"ShipperMainPhoneNumber" => "123-456-7890",
				"ShipperAddress1" => "123 Real Street",
				"ShipperAddress2" => null,
				"ShipperAddressCity" => "Somewhere",
				"ShipperAddressState" => "CO",
				"ShipperAddressPostalCode" => null,
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
						"GrossWeight" => null,
						"GrossUnitOfWeightId" => null,
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
								"ItemName" => "Buds",
								"Quantity" => 10.0,
								"UnitOfMeasureName" => "Ounces",
								"PackagedDate" => "2018-02-04T00:00:00Z",
								"GrossWeight" => null,
								"GrossUnitOfWeightName" => null,
								"WholesalePrice" => null
							],
							[
								"ItemName" => "Buds",
								"Quantity" => 9.5,
								"UnitOfMeasureName" => "Ounces",
								"PackagedDate" => "2018-03-06T00:00:00Z",
								"GrossWeight" => null,
								"GrossUnitOfWeightName" => null,
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
