<?php

	namespace OpenTHC\Bunk\Metrc\Plants;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
		"Name" => "Contamination",
		"RequiresNote" => false
	],
	[
		"Name" => "Male Plants",
		"RequiresNote" => false
	]
	);

	return $RES->withJSON($ret);