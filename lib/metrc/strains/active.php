<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Strains;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Id" => 201,
		"Name" => "Spring Hill Kush",
		"TestingStatus" => "ThirdParty",
		"ThcLevel" => null,
		"CbdLevel" => null,
		"IndicaPercentage" => 60.0,
		"SativaPercentage" => 40.0,
		"IsUsed" => false,
		"Genetics" => "60% Indica / 40% Sativa"
	],
	[
		"Id" => 202,
		"Name" => "Alpha Strain",
		"TestingStatus" => "ThirdParty",
		"ThcLevel" => null,
		"CbdLevel" => null,
		"IndicaPercentage" => 50.0,
		"SativaPercentage" => 50.0,
		"IsUsed" => false,
		"Genetics" => ""
	],
);

return $RES->withJSON($ret);
