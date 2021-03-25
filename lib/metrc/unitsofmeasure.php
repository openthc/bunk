<?php
/**
 *
 */

namespace OpenTHC\Bunk\METRC;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"QuantityType" => "CountBased",
		"Name" => "Each",
		"Abbreviation" => "ea"
	],
	[
		"QuantityType" => "WeightBased",
		"Name" => "Ounces",
		"Abbreviation" => "oz"
	],
	[
		"QuantityType" => "WeightBased",
		"Name" => "Pounds",
		"Abbreviation" => "lb"
	],
	[
		"QuantityType" => "WeightBased",
		"Name" => "Grams",
		"Abbreviation" => "g"
	],
	[
		"QuantityType" => "WeightBased",
		"Name" => "Milligrams",
		"Abbreviation" => "mg"
	],
	[
		"QuantityType" => "WeightBased",
		"Name" => "Kilograms",
		"Abbreviation" => "kg"
	]
);

return $RES->withJSON($ret);
