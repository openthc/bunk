<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Locations;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Id" => 1,
		"Name" => "Default",
		"ForPlantBatches" => true,
		"ForPlants" => true,
		"ForHarvests" => true,
		"ForPackages" => true
	],
	[
		"Id" => 2,
		"Name" => "Planting",
		"ForPlantBatches" => true,
		"ForPlants" => true,
		"ForHarvests" => false,
		"ForPackages" => false
	],
	[
		"Id" => 3,
		"Name" => "Packing",
		"ForPlantBatches" => false,
		"ForPlants" => false,
		"ForHarvests" => false,
		"ForPackages" => true
	]
);

return $RES->withJSON($ret);
