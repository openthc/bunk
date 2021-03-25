<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Transfers;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Id"=> 1,
		"RecipientFacilityLicenseNumber"=> "123-ABC",
		"RecipientFacilityName"=> "Lofty Med-Cultivation A",
		"ShipmentTypeName"=> "Transfer",
		"ShipmentTransactionType"=> "Standard",
		"EstimatedDepartureDateTime"=> "2016-10-11T14:48:30.000",
		"ActualDepartureDateTime"=> null,
		"EstimatedArrivalDateTime"=> "2016-10-11T16:50:00.000",
		"ActualArrivalDateTime"=> null,
		"GrossWeight"=> null,
		"GrossUnitOfWeightId"=> null,
		"GrossUnitOfWeightName"=> null,
		"PlannedRoute"=> "I will use this route.",
		"DeliveryPackageCount"=> 7,
		"DeliveryReceivedPackageCount"=> 0,
		"ReceivedDateTime"=> "2016-10-11T16:42:19-07:00",
		"EstimatedReturnDepartureDateTime"=> null,
		"ActualReturnDepartureDateTime"=> null,
		"EstimatedReturnArrivalDateTime"=> null,
		"ActualReturnArrivalDateTime"=> null,
		"RejectedPackagesReturned"=> false
	]
);

return $RES->withJSON($ret);
