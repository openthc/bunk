<?php

	namespace OpenTHC\Bunk\Metrc\Packages;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"PackageLabel" => "ABCDEF012345670000020201",
			"RemediationMethodName" => "Further Drying",
			"RemediationDate" => "2016-10-17",
			"RemediationSteps" => "Used hair dryer"
		  ],
		  [
			"PackageLabel" => "ABCDEF012345670000020201",
			"RemediationMethodName" => "Further Drying",
			"RemediationDate" => "2016-10-17",
			"RemediationSteps" => "Used natural sunlight"
		  ]
	);

	return $RES->withJSON($ret);