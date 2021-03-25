<?php

	namespace OpenTHC\Bunk\Metrc\Sales;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id"=> 6,
			"ActualArrivalDateTime"=> "2017-04-04T13:00:00.000",
			"AcceptedPackages"=> [
			  "ABCDEF012345670000000001"
			],
			"ReturnedPackages"=> [
			  [
				"Label"=> "ABCDEF012345670000000002",
				"ReturnQuantityVerified"=> 1.0,
				"ReturnUnitOfMeasure"=> "Ounces",
				"ReturnReason"=> "Spoilage",
				"ReturnReasonNote"=> ""
			  ]
			]
		  ]
	);

	return $RES->withJSON($ret);