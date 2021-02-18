<?php

	namespace OpenTHC\Bunk\Metrc\Strains;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Name"=> "Spring Hill Kush",
			"TestingStatus"=> "None",
			"ThcLevel"=> 0.1865,
			"CbdLevel"=> 0.1075,
			"IndicaPercentage"=> 25.0,
			"SativaPercentage"=> 75.0
		  ],
		  [
			"Name"=> "TN Orange Dream",
			"TestingStatus"=> "None",
			"ThcLevel"=> 0.075,
			"CbdLevel"=> 0.14,
			"IndicaPercentage"=> 25.0,
			"SativaPercentage"=> 75.0
		  ]
	);

	return $RES->withJSON($ret);