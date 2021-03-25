<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Plants;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Id" => null,
		"Label" => "ABCDEF012345670000000001",
		"WasteMethodName" => "Compost",
		"WasteMaterialMixed" => "Soil",
		"WasteWeight" => 15.69,
		"WasteUnitOfMeasureName" => "grams",
		"WasteReasonName" => "Destroy",
		"ReasonNote" => "Had to go.",
		"ActualDate" => "2015-12-15"
		],
		[
		"Id" => 2,
		"Label" => null,
		"WasteMethodName" => "Grinder",
		"WasteMaterialMixed" => "Soil",
		"WasteWeight" => 15.69,
		"WasteUnitOfMeasureName" => "grams",
		"WasteReasonName" => "Destroy",
		"ReasonNote" => "Had to go.",
		"ActualDate" => "2015-12-15"
		]
);

return $RES->withJSON($ret);
