<?php

	namespace OpenTHC\Bunk\Metrc\Plant_Batches;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"PlantBatch" => "AK-47 Clone 1/31/2017",
			"Count" => 25,
			"ReasonNote" => "",
			"ActualDate" => "2015-12-15"
		  ],
		  [
			"PlantBatch" => "AK-47 Clone 1/31/2017",
			"Count" => 10,
			"ReasonNote" => "McQueen ran over the plants. Poor little plants. =(",
			"ActualDate" => "2015-12-15"
		  ]
	);

	return $RES->withJSON($ret);