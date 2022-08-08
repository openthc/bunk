<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Packages;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	"Product",
	"ImmaturePlant",
	"VegetativePlant",
	"PlantWaste",
	"HarvestWaste"
);

return $RES->withJSON($ret);
