<?php

	namespace OpenTHC\Bunk\METRC\Harvests;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id"=>  1,
			"HarvestName" =>  null,
			"DryingLocation" =>  "Flower Location A",
			"ActualDate" =>  "2019-05-29T00:00:00Z"
		],
		[
			"Id" =>  null,
			"HarvestName" =>  "2019-05-29-Flower Location A-H",
			"DryingLocation" =>  "Drying Location B",
			"ActualDate" =>  "2019-05-29T00:00:00Z"
		]
	);

	return $RES->withJSON($ret);