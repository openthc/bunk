<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Transfers;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"PackageId" => 1,
		"PackageLabel" => "ABCDEF012345670000010026",
		"ShipperWholesalePrice" => null,
		"ReceiverWholesalePrice" => null
		],
		[
		"PackageId" => 2,
		"PackageLabel" => "ABCDEF012345670000010027",
		"ShipperWholesalePrice" => 3.50,
		"ReceiverWholesalePrice" => null
		],
		[
		"PackageId" => 3,
		"PackageLabel" => "ABCDEF012345670000010028",
		"ShipperWholesalePrice" => 3.50,
		"ReceiverWholesalePrice" => 3.50
		],
		[
		"PackageId" => 4,
		"PackageLabel" => "ABCDEF012345670000010029",
		"ShipperWholesalePrice" => 3.50,
		"ReceiverWholesalePrice" => 7.00
		]
);

return $RES->withJSON($ret);
