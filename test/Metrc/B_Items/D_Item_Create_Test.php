<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\B_Items;

class D_Item_Create_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path =  'items/v1/create';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = [
			"Id" =>  1,
			"Name" =>  "Buds",
			"ProductCategoryName" =>  "Buds",
			"ProductCategoryType" =>  "Buds",
			"QuantityType" =>  "WeightBased",
			"DefaultLabTestingState" =>  "NotSubmitted",
			"UnitOfMeasureName" =>  "Ounces",
			"ApprovalStatus" =>  "Approved",
			"ApprovalStatusDateTime" =>  date('m/d/Y g:ia'),
			"StrainId" =>  1,
			"StrainName" =>  "Spring Hill Kush",
			"AdministrationMethod" =>  null,
			"UnitCbdPercent" =>  null,
			"UnitCbdContent" =>  null,
			"UnitCbdContentUnitOfMeasureName" =>  null,
			"UnitCbdContentDose" =>  null,
			"UnitCbdContentDoseUnitOfMeasureName" =>  null,
			"UnitThcPercent" =>  null,
			"UnitThcContent" =>  null,
			"UnitThcContentUnitOfMeasureName" =>  null,
			"UnitThcContentDose" =>  null,
			"UnitThcContentDoseUnitOfMeasureName" =>  null,
			"UnitVolume" =>  null,
			"UnitVolumeUnitOfMeasureName" =>  null,
			"UnitWeight" =>  null,
			"UnitWeightUnitOfMeasureName" =>  null,
			"ServingSize" =>  null,
			"SupplyDurationDays" =>  null,
			"NumberOfDoses" =>  null,
			"UnitQuantity" =>  null,
			"UnitQuantityUnitOfMeasureName" =>  null,
			"Ingredients" =>  null,
			"Description" =>  null,
			"IsUsed" =>  false
		];
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, [ 'json' => $this->body ]);
		$this->assertValidResponse($res);
	}

}
