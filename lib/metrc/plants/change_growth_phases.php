<?php

	namespace OpenTHC\Bunk\Metrc\Plants;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id" => null,
			"Label" => "ABCDEF012345670000000001",
			"NewTag" => "ABCDEF012345670000020001",
			"GrowthPhase" => "Flowering",
			"NewLocation" => "Plants Location",
			"GrowthDate" => "2015-12-15"
		  ],
		  [
			"Id" => 2,
			"Label" => null,
			"NewTag" => "ABCDEF012345670000020002",
			"GrowthPhase" => "Vegetative",
			"NewLocation" => "Harvest Location",
			"GrowthDate" => "2015-12-15"
		  ]
	);

	return $RES->withJSON($ret);