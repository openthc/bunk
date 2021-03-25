<?php

	namespace OpenTHC\Bunk\Metrc\Sales;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		"Consumer",
		"Patient",
		"Caregiver",
		"ExternalPatient"
	);

	return $RES->withJSON($ret);