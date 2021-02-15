<?php

	namespace OpenTHC\Bunk\Metrc\;

	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		"HireDate" => "0001-01-01",
		"IsOwner" => false,
		"IsManager" => true,
		"Occupations" => [],
		"Name" => "Cultivation LLC",
		"Alias" => "Cultivation on Road St",
		"DisplayName" => "Cultivation on Road St",
		"CredentialedDate" => "1969-08-15",
		"SupportActivationDate" => null,
		"SupportExpirationDate" => null,
		"SupportLastPaidDate" => null,
		"FacilityType" => null,
		"License" => [
			"Number" => "403-X0001",
			"StartDate" => date('m/d/Y'),
			"EndDate" => date('m/d/Y'),
			"LicenseType" => "Medical Cultivation",
		]
	);

	return $RES->withJSON($ret);