<?php

	namespace OpenTHC\Bunk\Metrc\Labtests;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"PackageId" => 2,
			"LabTestResultId" => 1,
			"LabFacilityLicenseNumber" => "405R-X0001",
			"LabFacilityName" => "CO PERCEPTIVE TESTING LABS, LLC",
			"SourcePackageLabel" => "ABCDEF012345670000010042",
			"ProductName" => "Buds",
			"ProductCategoryName" => "Buds",
			"TestPerformedDate" => "2014-11-29",
			"OverallPassed" => true,
			"RevokedDate" => null,
			"ResultReleased" => true,
			"ResultReleaseDateTime" => "2014-11-29T00 =>00 =>00+00 =>00",
			"TestTypeName" => "Microbiologicals",
			"TestPassed" => true,
			"TestResultLevel" => 0.1,
			"TestComment" => "This is a comment.",
			"TestInformationalOnly" => false,
			"LabTestDetailRevokedDate" => null
		  ],
		  [
			"PackageId" => 3,
			"LabTestResultId" => 2,
			"LabFacilityLicenseNumber" => "405R-X0001",
			"LabFacilityName" => "CO PERCEPTIVE TESTING LABS, LLC",
			"SourcePackageLabel" => "ABCDEF012345670000010043",
			"ProductName" => "Buds",
			"ProductCategoryName" => "Buds",
			"TestPerformedDate" => "2014-11-29",
			"OverallPassed" => true,
			"RevokedDate" => null,
			"ResultReleased" => false,
			"ResultReleaseDateTime" => null,
			"TestTypeName" => "Microbiologicals",
			"TestPassed" => true,
			"TestResultLevel" => 0.15,
			"TestComment" => "This is a comment.",
			"TestInformationalOnly" => false,
			"LabTestDetailRevokedDate" => null
		  ]
	);

	return $RES->withJSON($ret);