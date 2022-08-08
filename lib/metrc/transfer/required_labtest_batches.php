<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Transfers;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"PackageId" => 2,
		"LabTestBatchId" => 1,
		"LabTestBatchName" => "Cannabinoids"
	],
	[
		"PackageId" => 2,
		"LabTestBatchId" => 2,
		"LabTestBatchName" => "Category I Residual Pesticides (required)"
	]

);

return $RES->withJSON($ret);
