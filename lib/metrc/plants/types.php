<?php

	namespace OpenTHC\Bunk\Metrc\Plants;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		"Fertilizer",
		"Pesticide",
		"Other"
	);

	return $RES->withJSON($ret);