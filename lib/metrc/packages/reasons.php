<?php

	namespace OpenTHC\Bunk\Metrc\Packages;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Name" => "Drying",
			"RequiresNote" => false
		  ],
		  [
			"Name" => "Entry Error",
			"RequiresNote" => false
		  ]
	);

	return $RES->withJSON($ret);