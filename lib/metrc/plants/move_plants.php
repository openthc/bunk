<?php

	namespace OpenTHC\Bunk\Metrc\Plants;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id"=> null,
			"Label"=> "ABCDEF012345670000000001",
			"Location"=> "Plants Location",
			"ActualDate"=> "2015-12-15"
		  ],
		  [
			"Id"=> 2,
			"Label"=> null,
			"Location"=> "Plants Location",
			"ActualDate"=> "2015-12-15"
		  ]
	);

	return $RES->withJSON($ret);