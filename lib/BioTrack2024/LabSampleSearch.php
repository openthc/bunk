<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class LabSampleSearch
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
				"LabSample" => [
					[
						"Amount" => 0,
						"AmountUsed" => 0,
						"CertOfAnalysisHyperlink" => "string",
						"Deleted" => true,
						"ID" => 0,
						"InventoryID" => "string",
						"InventoryType" => 0,
						"LabLicense" => "string",
						"LocationLicense" => "string",
						"Medical" => true,
						"MedicalGrade" => true,
						"ParentID" => "string",
						"QualityControlDataHyperlink" => "string",
						"Result" => "string",
						"RnD" => true,
						"SampleUse" => "string",
						"SessionTime" => 0,
						"TestingData" => [
							[
								"LabAnalysisTime" => "2024-01-31T10:00:00.000Z",
								"SamplePreparationTime" => "2024-01-31T10:00:00.000Z",
								"TestID" => 0,
								"TestResult" => [
									[
										"LabProvided" => true,
										"TestPanel" => "string",
										"TestPass" => true,
										"TestValue" => 0,
										"TransactionID" => 0
									]
								]
							]
						],
						"TransactionID" => 0
					]
				],
				"NextCursor" => 0,
				"NextTransactionID" => 0
			]);
	}
}
