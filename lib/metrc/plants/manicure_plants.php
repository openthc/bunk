<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Plants;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Plant" => "ABCDEF012345670000000001",
		"Weight" => 100.23,
		"UnitOfWeight" => "Grams",
		"DryingLocation" => "Plants Location",
		"HarvestName" => null,
		"PatientLicenseNumber" => "X00001",
		"ActualDate" => "2015-12-15"
		],
		[
		"Plant" => "ABCDEF012345670000000001",
		"Weight" => 50.10,
		"UnitOfWeight" => "Grams",
		"DryingLocation" => "Plants Location",
		"HarvestName" => "2015-12-15-Harvest Location-M",
		"PatientLicenseNumber" => "X00002",
		"ActualDate" => "2015-12-15"
		]
);

return $RES->withJSON($ret);
