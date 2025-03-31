<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class LabSearch
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
				'Labs' => [
					[
						'Address1' => 'string',
						'City' => 'string',
						'Deleted' => 0,
						'ID' => 0,
						'LicenseNumber' => 'string',
						'Name' => 'string',
						'Phone' => 'string',
						'State' => 'string',
						'TransactionID' => 0,
						'Zip' => 'string',
					],
				],
				'NextCursor' => 0,
				'NextTransactionID' => 0,
			]
		);
	}
}
