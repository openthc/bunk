<?php

	namespace OpenTHC\Bunk\Metrc\Sales;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Name"=> "Spoilage",
			"RequiresNote"=> false
		  ],
		  [
			"Name"=> "Theft",
			"RequiresNote"=> false
		  ]
	);

	return $RES->withJSON($ret);