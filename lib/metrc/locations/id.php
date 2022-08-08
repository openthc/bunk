<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Locations;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	"Id" => 1,
	"Name" => "Harvest Location",
	"LocationTypeId" => 1,
	"LocationTypeName" => "Default",
	"ForPlantBatches" => true,
	"ForPlants" => true,
	"ForHarvests" => true,
	"ForPackages" => true
);

return $RES->withJSON($ret);
