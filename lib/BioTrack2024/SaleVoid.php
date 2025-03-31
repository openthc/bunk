<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class SaleVoid
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
			"transactionID" => 0
		]);
	}
}
