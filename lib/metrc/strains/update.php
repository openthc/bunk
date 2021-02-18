<?php

	namespace OpenTHC\Bunk\Metrc\Strains;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id"=> 1,
			"Name"=> "Spring Hill Kush",
			"TestingStatus"=> "InHouse",
			"ThcLevel"=> 0.1865,
			"CbdLevel"=> 0.1075,
			"IndicaPercentage"=> 25.0,
			"SativaPercentage"=> 75.0
		  ],
		  [
			"Id"=> 2,
			"Name"=> "TN Orange Dream",
			"TestingStatus"=> "ThirdParty",
			"ThcLevel"=> 0.075,
			"CbdLevel"=> 0.14,
			"IndicaPercentage"=> 25.0,
			"SativaPercentage"=> 75.0
		  ]
	);

	return $RES->withJSON($ret);