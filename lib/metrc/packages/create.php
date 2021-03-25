<?php

	namespace OpenTHC\Bunk\Metrc\Packages;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Tag" => "ABCDEF012345670000020201",
			"Location" => null,
			"Item" => "Buds",
			"Quantity" => 16.0,
			"UnitOfMeasure" => "Ounces",
			"PatientLicenseNumber" => "X00001",
			"Note" => "This is a note.",
			"IsProductionBatch" => false,
			"ProductionBatchNumber" => null,
			"IsDonation" => false,
			"ProductRequiresRemediation" => false,
			"UseSameItem" => false,
			"ActualDate" => "2015-12-15",
			"Ingredients" => [
			  [
				"Package" => "ABCDEF012345670000010041",
				"Quantity" => 8.0,
				"UnitOfMeasure" => "Ounces"
			  ],
			  [
				"Package" => "ABCDEF012345670000010042",
				"Quantity" => 8.0,
				"UnitOfMeasure" => "Ounces"
			  ]
			]
		  ],
		  [
			"Tag" => "ABCDEF012345670000020202",
			"Location" => null,
			"Item" => "Buds",
			"Quantity" => 16.0,
			"UnitOfMeasure" => "Ounces",
			"PatientLicenseNumber" => "X00002",
			"Note" => null,
			"IsProductionBatch" => true,
			"ProductionBatchNumber" => "PB-2015-12-15",
			"IsDonation" => false,
			"ProductRequiresRemediation" => false,
			"UseSameItem" => false,
			"ActualDate" => "2015-12-15",
			"Ingredients" => [
			  [
				"Package" => "ABCDEF012345670000010043",
				"Quantity" => 8.0,
				"UnitOfMeasure" => "Ounces"
			  ],
			  [
				"Package" => "ABCDEF012345670000010044",
				"Quantity" => 8.0,
				"UnitOfMeasure" => "Ounces"
			  ]
			]
		  ],
		  [
			"Tag" => "ABCDEF012345670000020202",
			"Location" => null,
			"Item" => null,
			"Quantity" => 16.0,
			"UnitOfMeasure" => "Ounces",
			"PatientLicenseNumber" => "X00002",
			"Note" => null,
			"IsProductionBatch" => false,
			"ProductionBatchNumber" => null,
			"IsDonation" => false,
			"ProductRequiresRemediation" => false,
			"UseSameItem" => true,
			"ActualDate" => "2015-12-15",
			"Ingredients" => [
			  [
				"Package" => "ABCDEF012345670000010043",
				"Quantity" => 8.0,
				"UnitOfMeasure" => "Ounces"
			  ],
			  [
				"Package" => "ABCDEF012345670000010044",
				"Quantity" => 8.0,
				"UnitOfMeasure" => "Ounces"
			  ]
			]
		  ]
	);

	return $RES->withJSON($ret);