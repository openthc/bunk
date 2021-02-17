<?php

	namespace OpenTHC\Bunk\Metrc\Locations;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Name" => "Harvest Location",
			"LocationTypeName" => "Default"
		  ],
		  [
			"Name" => "Plants Location",
			"LocationTypeName" => "Planting"
		  ]
	);

	return $RES->withJSON($ret);