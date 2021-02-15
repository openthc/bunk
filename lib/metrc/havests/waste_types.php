<?php 
	
	namespace OpenTHC\Bunk\METRC\Harvests;
	use OpenTHC\Bunk\Module\METRC;

	$ret = 	array(
		[
			"Name"=> "Plant Material"
		],
		[
			"Name"=> "Fibrous"
		],
		[
			"Name"=> "Root Ball"
		]
	);

	$RES->withJSON($ret);