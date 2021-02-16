<?php

	namespace OpenTHC\Bunk\Metrc\labtests;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Label" => "ABCDEF012345670000000001",
			"ResultDate" => "2015-12-15T00 =>00 =>00Z",
			"DocumentFileName" => "Sparkly Ventures Lab Results 20151215.pdf",
			"DocumentFileBase64" => "File encoded in Base64==",
			"Results" => [
			  [
				"LabTestTypeName" => "THC",
				"Quantity" => 100.2345,
				"Passed" => true,
				"Notes" => ""
			  ]
			]
		  ],
		  [
			"Label" => "ABCDEF012345670000000002",
			"ResultDate" => "2015-12-15T00 =>00 =>00Z",
			"DocumentFileName" => null,
			"DocumentFileBase64" => null,
			"Results" => [
			  [
				"LabTestTypeName" => "THC",
				"Quantity" => 100.2345,
				"Passed" => true,
				"Notes" => ""
			  ]
			]
		  ]
	);

	return $RES->withJSON($ret);