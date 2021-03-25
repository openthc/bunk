<?php

	namespace OpenTHC\Bunk\Metrc\Transfers;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Name" => "Transfer",
			"ForLicensedShipments" => true,
			"ForExternalIncomingShipments" => false,
			"ForExternalOutgoingShipments" => false,
			"RequiresDestinationGrossWeight" => false,
			"RequiresPackagesGrossWeight" => false
		],
		[
			"Name" => "Wholesale",
			"ForLicensedShipments" => true,
			"ForExternalIncomingShipments" => false,
			"ForExternalOutgoingShipments" => false,
			"RequiresDestinationGrossWeight" => false,
			"RequiresPackagesGrossWeight" => false
		]
		
	);

	return $RES->withJSON($ret);