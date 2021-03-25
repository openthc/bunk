<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Locations;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Id" => 1,
		"Name" => "Harvest Location",
		"LocationTypeId" => 1,
		"LocationTypeName" => "Default",
		"ForPlantBatches" => true,
		"ForPlants" => true,
		"ForHarvests" => true,
		"ForPackages" => true
	],
	[
		"Id" => 2,
		"Name" => "Plants Location",
		"LocationTypeId" => 2,
		"LocationTypeName" => "Planting Station",
		"ForPlantBatches" => false,
		"ForPlants" => true,
		"ForHarvests" => false,
		"ForPackages" => false
	]
);

return $RES->withJSON($ret);
