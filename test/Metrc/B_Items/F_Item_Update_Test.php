<?php 

namespace Test\Metrc\B_Items;

class F_Item_Update_Test extends \Test\Metrc_Test {

	protected $path =  'items/v1/update';

	protected $body;

	protected function setUp() : void {
		$this->body = array(
			[
				"Id" => 1,
				"Name" => "Buds Item",
				"ItemCategory" => "Buds",
				"UnitOfMeasure" => "Ounces",
				"Strain" => "String Hill Kush",
				"ItemBrand" => null,
				"AdministrationMethod" => null,
				"UnitCbdPercent" => null,
				"UnitCbdContent" => null,
				"UnitCbdContentUnitOfMeasure" => null,
				"UnitCbdContentDose" => null,
				"UnitCbdContentDoseUnitOfMeasure" => null,
				"UnitThcPercent" => null,
				"UnitThcContent" => null,
				"UnitThcContentUnitOfMeasure" => null,
				"UnitThcContentDose" => null,
				"UnitThcContentDoseUnitOfMeasure" => null,
				"UnitVolume" => null,
				"UnitVolumeUnitOfMeasure" => null,
				"UnitWeight" => null,
				"UnitWeightUnitOfMeasure" => null,
				"ServingSize" => null,
				"SupplyDurationDays" => null,
				"NumberOfDoses" => null,
				"Ingredients" => null,
				"Description" => null
			],
			[
				"Id" => 2,
				"Name" => "Extract Spray Paint",
				"ItemCategory" => "Concentrate (Each)",
				"UnitOfMeasure" => "Each",
				"Strain" => null,
				"ItemBrand" => null,
				"AdministrationMethod" => null,
				"UnitCbdPercent" => null,
				"UnitCbdContent" => null,
				"UnitCbdContentUnitOfMeasure" => null,
				"UnitCbdContentDose" => null,
				"UnitCbdContentDoseUnitOfMeasure" => null,
				"UnitThcPercent" => null,
				"UnitThcContent" => null,
				"UnitThcContentUnitOfMeasure" => null,
				"UnitThcContentDose" => null,
				"UnitThcContentDoseUnitOfMeasure" => null,
				"UnitVolume" => 100.0,
				"UnitVolumeUnitOfMeasure" => "Milliliters",
				"UnitWeight" => null,
				"UnitWeightUnitOfMeasure" => null,
				"ServingSize" => null,
				"SupplyDurationDays" => null,
				"NumberOfDoses" => null,
				"Ingredients" => null,
				"Description" => null
			],
			[
				"Id" => 2,
				"Name" => "Concentrate Extract",
				"ItemCategory" => "Concentrate (Each)",
				"UnitOfMeasure" => "Each",
				"Strain" => null,
				"ItemBrand" => null,
				"AdministrationMethod" => null,
				"UnitCbdPercent" => null,
				"UnitCbdContent" => null,
				"UnitCbdContentUnitOfMeasure" => null,
				"UnitCbdContentDose" => null,
				"UnitCbdContentDoseUnitOfMeasure" => null,
				"UnitThcPercent" => null,
				"UnitThcContent" => 10.0,
				"UnitThcContentUnitOfMeasure" => "Milligrams",
				"UnitThcContentDose" => 5.0,
				"UnitThcContentDoseUnitOfMeasure" => "Milligrams",
				"UnitVolume" => null,
				"UnitVolumeUnitOfMeasure" => null,
				"UnitWeight" => 100.0,
				"UnitWeightUnitOfMeasure" => "Milligrams",
				"ServingSize" => null,
				"SupplyDurationDays" => null,
				"NumberOfDoses" => 2,
				"Ingredients" => null,
				"Description" => null
			]
		);
	}
	
	function test_post()
	{
		$res = $this->ghc->post($this->path, ['body' => $this->body]);
		$this->assertValidResponse($res);
	}

}