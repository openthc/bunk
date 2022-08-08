<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Transfers;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	"Shipped",
	"Rejected",
	"Accepted",
	"Returned"
);

return $RES->withJSON($ret);
