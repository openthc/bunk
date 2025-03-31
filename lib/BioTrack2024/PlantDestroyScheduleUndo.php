<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class PlantDestroyScheduleUndo
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
			'Plant' => [
				[
					'BirthDate' => 'string',
					'Converted' => true,
					'CureCollections' => 0,
					'Deleted' => true,
					'DestroyReason' => 'string',
					'DestroyReasonID' => 0,
					'DestroyScheduled' => true,
					'DestroyScheduledTime' => 'string',
					'ExternalID' => 'string',
					'HarvestBatchID' => 'string',
					'HarvestCollections' => 0,
					'HarvestScheduled' => true,
					'ID' => 'string',
					'Location' => 'string',
					'Mother' => true,
					'OrgID' => 0,
					'ParentPlantID' => 'string',
					'RoomID' => 0,
					'SessionTime' => 0,
					'SourceInventoryID' => 'string',
					'State' => 'string',
					'StateID' => 0,
					'Strain' => 'string',
					'TransactionID' => 0,
				],
			],
			'SessionTime' => 0,
			'TransactionID' => 0,
		]);
	}
}
