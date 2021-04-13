<?php 

namespace Test\Metrc\A_Harvests;

class C_Harvests_Create_Packages_Testing_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/create/packages/testing';

	private $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Tag"=> "ABCDEF012345670000020201",
				"Location"=> null,
				"Item"=> "Buds",
				"UnitOfWeight"=> "Grams",
				"PatientLicenseNumber"=> "X00001",
				"Note"=> "This is a note.",
				"IsProductionBatch"=> false,
				"ProductionBatchNumber"=> null,
				"IsTradeSample"=> false,
				"IsDonation"=> false,
				"ProductRequiresRemediation"=> false,
				"RemediateProduct"=> false,
				"RemediationMethodId"=> null,
				"RemediationDate"=> null,
				"RemediationSteps"=> null,
				"ActualDate"=> "2015-12-15",
				"Ingredients"=> [
					[
						"HarvestId"=> 2,
						"HarvestName"=> null,
						"Weight"=> 100.23,
						"UnitOfWeight"=> "Grams"
					],
					[
						"HarvestId"=> null,
						"HarvestName"=> "2018-04-03-Harvest Location-M",
						"Weight"=> 25.1,
						"UnitOfWeight"=> "Grams"
					]
				]
			],
			[
				"Tag"=> "ABCDEF012345670000020202",
				"Location"=> null,
				"Item"=> "Buds",
				"UnitOfWeight"=> "Grams",
				"PatientLicenseNumber"=> "X00001",
				"Note"=> "This is a note.",
				"IsProductionBatch"=> false,
				"ProductionBatchNumber"=> null,
				"IsTradeSample"=> true,
				"IsDonation"=> false,
				"ProductRequiresRemediation"=> false,
				"RemediateProduct"=> false,
				"RemediationMethodId"=> null,
				"RemediationDate"=> null,
				"RemediationSteps"=> null,
				"ActualDate"=> date('m/d/Y'),
				"Ingredients"=> [
					[
						"HarvestId"=> 2,
						"HarvestName"=> null,
						"Weight"=> 100.23,
						"UnitOfWeight"=> "Grams"
					],
					[
						"HarvestId"=> null,
						"HarvestName"=> "2018-04-03-Harvest Location-M",
						"Weight"=> 25.1,
						"UnitOfWeight"=> "Grams"
					]
				]
			],
			[
				"Tag"=> "ABCDEF012345670000020203",
				"Location"=> null,
				"Item"=> "Shake",
				"UnitOfWeight"=> "Grams",
				"PatientLicenseNumber"=> "",
				"Note"=> null,
				"IsProductionBatch"=> true,
				"ProductionBatchNumber"=> "PB-2015-12-15",
				"IsTradeSample"=> false,
				"IsDonation"=> false,
				"ProductRequiresRemediation"=> false,
				"RemediateProduct"=> false,
				"RemediationMethodId"=> null,
				"RemediationDate"=> null,
				"RemediationSteps"=> null,
				"ActualDate"=> "2015-12-15",
				"Ingredients"=> [
					[
						"HarvestId"=> null,
						"HarvestName"=> "2018-04-03-Harvest Location-M",
						"Weight"=> 50.0,
						"UnitOfWeight"=> "Grams"
					],
					[
						"HarvestId"=> 4,
						"HarvestName"=> null,
						"Weight"=> 1.0,
						"UnitOfWeight"=> "Grams"
					]
				]
			],
			[
				"Tag"=> "ABCDEF012345670000020204",
				"Location"=> null,
				"Item"=> "Shake",
				"UnitOfWeight"=> "Grams",
				"PatientLicenseNumber"=> "X00002",
				"Note"=> null,
				"IsProductionBatch"=> true,
				"ProductionBatchNumber"=> "PB-2015-12-15",
				"IsTradeSample"=> true,
				"IsDonation"=> false,
				"ProductRequiresRemediation"=> false,
				"RemediateProduct"=> false,
				"RemediationMethodId"=> null,
				"RemediationDate"=> null,
				"RemediationSteps"=> null,
				"ActualDate"=> "2015-12-15",
				"Ingredients"=> [
					[
						"HarvestId"=> null,
						"HarvestName"=> "2018-04-03-Harvest Location-M",
						"Weight"=> 50.0,
						"UnitOfWeight"=> "Grams"
					],
					[
						"HarvestId"=> 4,
						"HarvestName"=> null,
						"Weight"=> 1.0,
						"UnitOfWeight"=> "Grams"
					]
				]
			]
		);
	} 

	function test_post()
	{
		$res = $this->ghc->post($this->path, [ 'json' => $this->body ]);
		$this->assertValidResponse($res);
	}
	
}