<?php

	namespace OpenTHC\Bunk\Metrc\Labtests;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"PackageLabel" => "ABCDEF012345670000010041"
		],
		[
			"PackageLabel" => "ABCDEF012345670000010042"
		]
	);

	return $RES->withJSON($ret);