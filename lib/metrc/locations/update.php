<?php

	namespace OpenTHC\Bunk\Metrc\Locations;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id" => 5,
			"Name" => "Harvest Location",
			"LocationTypeName" => "Default"
		],
		[
			"Id" => 6,
			"Name" => "Plants Location",
			"LocationTypeName" => "Planting"
		]
	);

	return $RES->withJSON($ret);