<?php

	namespace OpenTHC\Bunk\Metrc\Plant_Batches;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Name" => "AK-47 Clone 1/31/2017",
			"Location" => "Plants Location",
			"MoveDate" => "2015-12-15"
		  ],
		  [
			"Name" => "Metrc Bliss 5/30/2018",
			"Location" => "Plants Location",
			"MoveDate" => "2018-01-05"
		  ]
	);

	return $RES->withJSON($ret);