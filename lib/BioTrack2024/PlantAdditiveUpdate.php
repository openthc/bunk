<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class PlantAdditiveUpdate
{
	// Create?
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
			'NextCursor' => 0,
			'NextTransactionID' => 0,
			'PlantAdditive' => [
				[
					'AdditiveName' => 'string',
					'AppliedQuantity' => 0,
					'AppliedQuantityUOM' => 'string',
					'CreatedOn' => 'string',
					'Deleted' => true,
					'ID' => 0,
					'LocationLicense' => 'string',
					'PlantID' => 'string',
					'TransactionID' => 0,
				],
			],
		]);
	}

	// PUT
	function put($REQ, $RES, $ARG) {
				return $RES->withJSON([
					'PlantAdditive' => [
						[
							'AdditiveName' => 'string',
							'AppliedQuantity' => 0,
							'AppliedQuantityUOM' => 'string',
							'CreatedOn' => 'string',
							'Deleted' => true,
							'ID' => 0,
							'LocationLicense' => 'string',
							'PlantID' => 'string',
							'TransactionID' => 0,
						],
					],
					'SessionTime' => 0,
					'TransactionID' => 0,
				]);
			}
}
