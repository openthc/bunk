<?php

	namespace OpenTHC\Bunk\METRC\Harvests;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id" =>  1,
			"WasteType" =>  "Plant Material",
			"UnitOfWeight" =>  "Grams",
			"WasteWeight" =>  10.05,
			"ActualDate" =>  "2015-12-15"
		],
		[
			"Id" =>  2,
			"WasteType" =>  "Fibrous Material",
			"UnitOfWeight" =>  "Grams",
			"WasteWeight" =>  30.6,
			"ActualDate" =>  "2015-12-15"
		]
	);

	return $RES->withJSON($ret);