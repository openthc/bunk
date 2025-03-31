<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class SaleRefund
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
			"Inventory" => [
				[
					"ActiveSampleInventoryID" => "string",
					"Deleted" => true,
					"Destroyed" => true,
					"Dried" => true,
					"ExpirationDate" => "string",
					"ExternalID" => "string",
					"ID" => "string",
					"Initial" => true,
					"InventoryParentID" => [
						"string"
					],
					"InventoryType" => 0,
					"IsSample" => true,
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
							]
						]
					],
					"LocationLicense" => "string",
					"MedUsableWeight" => 0,
					"Medicated" => true,
					"NetPackageWeight" => 0,
					"PackageDate" => "string",
					"ProductName" => "string",
					"ProductionBatchID" => 0,
					"QAStatus" => "string",
					"RecUsableWeight" => 0,
					"RemainingAmount" => 0,
					"Remediated" => true,
					"RemediationCount" => 0,
					"RemediationEligible" => true,
					"Restocked" => true,
					"Rework" => true,
					"RoomID" => 0,
					"Seized" => true,
					"SessionTime" => 0,
					"SourcePlantID" => "string",
					"StateProductIdentifier" => "string",
					"Status" => "string",
					"Strain" => "string",
					"TransactionID" => 0,
					"UOM" => "string",
					"UnitBased" => true,
					"UsableWeight" => 0
				]
			],
			"Refund" => [
				[
					"CardID" => "string",
					"CreatedByUserID" => 0,
					"CreatedOn" => "string",
					"Deleted" => true,
					"ExternalID" => "string",
					"ID" => 0,
					"Item" => [
						[
							"Barcode" => "string",
							"ExternalID" => "string",
							"FormID" => 0,
							"ItemNumber" => 0,
							"OrderTypeID" => 0,
							"Price" => 0,
							"Quantity" => 0,
							"TaxCollected" => [
								"Excise" => 0,
								"Other" => 0
							],
							"TransactionID" => 0,
							"VoidReason" => "string"
						]
					],
					"Location" => 0,
					"OrderingPhysician" => "string",
					"RequestID" => "string",
					"TransactionID" => 0,
					"Type" => "string",
					"UpdatedOn" => "string"
				]
			],
			"Sale" => [
				[
					"CardID" => "string",
					"CreatedByUserID" => 0,
					"CreatedOn" => "string",
					"Deleted" => true,
					"ExternalID" => "string",
					"ID" => 0,
					"Item" => [
						[
							"Barcode" => "string",
							"ExternalID" => "string",
							"FormID" => 0,
							"ItemNumber" => 0,
							"OrderTypeID" => 0,
							"Price" => 0,
							"Quantity" => 0,
							"TaxCollected" => [
								"Excise" => 0,
								"Other" => 0
							],
							"TransactionID" => 0,
							"VoidReason" => "string"
						]
					],
					"Location" => 0,
					"OrderingPhysician" => "string",
					"RequestID" => "string",
					"TransactionID" => 0,
					"Type" => "string",
					"UpdatedOn" => "string"
				]
			],
			"SessionTime" => 0,
			"TransactionID" => 0
		]);
	}
}
