<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class InventoryTransferVoid
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
							   ],
							   "TransactionID" => 0
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
				"InventoryTransfer" => [
				   "Deleted" => true,
				   "ID" => 0,
				   "InboundLicense" => "string",
				   "Invoice" => [
					  "Accepted" => true,
					  "BuyerLocationLicense" => "string",
					  "Deleted" => true,
					  "Inventory" => [
						 [
							"Amount" => 0,
							"Deleted" => true,
							"ID" => 0,
							"InventoryID" => "string",
							"InvoiceID" => "string",
							"Price" => 0,
							"TransactionID" => 0
						 ]
					  ],
					  "InvoiceID" => "string",
					  "LocationLicense" => "string",
					  "Payment" => [
							   [
								  "Accepted" => true,
								  "AcceptedLocationID" => "string",
								  "AcceptedOn" => "string",
								  "Amount" => 0,
								  "BuyerLocationLicense" => "string",
								  "BuyerUserID" => 0,
								  "CreatedOn" => "string",
								  "Deleted" => true,
								  "ID" => 0,
								  "InvoiceID" => "string",
								  "Rejected" => true,
								  "RejectedLocationLicense" => "string",
								  "RejectedOn" => "string",
								  "RejectedReason" => "string",
								  "TransactionID" => 0,
								  "UpdatedOn" => "string"
							   ]
							],
					  "Refund" => true,
					  "SessionTime" => 0,
					  "TransactionID" => 0
				   ],
				   "InvoiceID" => "string",
				   "IsRejected" => true,
				   "Item" => [
					  [
						 "Amount" => 0,
						 "Deleted" => true,
						 "Description" => "string",
						 "ID" => 0,
						 "Inventory" => [
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
								  ],
								  "TransactionID" => 0
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
						 ],
						 "InventoryID" => "string",
						 "InventoryTransferID" => 0,
						 "IsRejected" => true,
						 "IsReturn" => true,
						 "ManifestID" => "string",
						 "Received" => true,
						 "ReceivedAmount" => 0,
						 "ReceivedTime" => "string",
						 "TransactionID" => 0
					  ]
				   ],
				   "ManifestID" => "string",
				   "ManifestStopNumber" => 0,
				   "OutboundLicense" => "string",
				   "Received" => true,
				   "ReceivedTime" => "string",
				   "SessionTime" => 0,
				   "TransactionID" => 0,
				   "TransferType" => "string"
				],
				"Manifest" => [
				   "City" => "string",
				   "Completed" => true,
				   "CompletionDate" => "string",
				   "CreatedOn" => "string",
				   "Deleted" => true,
				   "Driver" => [
					  [
						 "DateofBirth" => "string",
						 "ID" => 0,
						 "Name" => "string"
					  ]
				   ],
				   "DriverArrived" => true,
				   "InTransit" => true,
				   "IsAccepted" => true,
				   "IsParked" => true,
				   "LicenseNumber" => "string",
				   "Links" => [
							[
							   "Href" => "string",
							   "Method" => "string",
							   "Rel" => "string"
							]
						 ],
				   "ManifestID" => "string",
				   "Name" => "string",
				   "Phone" => "string",
				   "Received" => true,
				   "SessionTime" => 0,
				   "State" => "string",
				   "Stop" => [
								  [
									 "ApproximateArrival" => "2024-01-31T10:00:00.000Z",
									 "ApproximateDeparture" => "2024-01-31T10:00:00.000Z",
									 "ApproximateRoute" => "string",
									 "City" => "string",
									 "DriverArrived" => true,
									 "DriverArrivedTime" => "string",
									 "ID" => 0,
									 "Invoice" => [
										"Accepted" => true,
										"BuyerLocationLicense" => "string",
										"Deleted" => true,
										"Inventory" => [
										   [
											  "Amount" => 0,
											  "Deleted" => true,
											  "ID" => 0,
											  "InventoryID" => "string",
											  "InvoiceID" => "string",
											  "Price" => 0,
											  "TransactionID" => 0
										   ]
										],
										"InvoiceID" => "string",
										"LocationLicense" => "string",
										"Payment" => [
												 [
													"Accepted" => true,
													"AcceptedLocationID" => "string",
													"AcceptedOn" => "string",
													"Amount" => 0,
													"BuyerLocationLicense" => "string",
													"BuyerUserID" => 0,
													"CreatedOn" => "string",
													"Deleted" => true,
													"ID" => 0,
													"InvoiceID" => "string",
													"Rejected" => true,
													"RejectedLocationLicense" => "string",
													"RejectedOn" => "string",
													"RejectedReason" => "string",
													"TransactionID" => 0,
													"UpdatedOn" => "string"
												 ]
											  ],
										"Refund" => true,
										"SessionTime" => 0,
										"TransactionID" => 0
									 ],
									 "InvoiceID" => "string",
									 "Item" => [
													   [
														  "Deleted" => true,
														  "Description" => "string",
														  "ID" => 0,
														  "InventoryID" => "string",
														  "ManifestID" => "string",
														  "Quantity" => 0,
														  "QuantityReceived" => 0,
														  "SessionTime" => 0,
														  "StopNumber" => 0,
														  "TransactionID" => 0
													   ]
													],
									 "ItemsCount" => 0,
									 "Links" => [
															 [
																"Href" => "string",
																"Method" => "string",
																"Rel" => "string"
															 ]
														  ],
									 "LocationLicense" => "string",
									 "ManifestID" => "string",
									 "Name" => "string",
									 "ParkedTime" => "string",
									 "Phone" => "string",
									 "ResumedDirections" => "string",
									 "ResumedEstimatedArrival" => "string",
									 "ResumedEstimatedDeparture" => "string",
									 "ResumedTime" => "string",
									 "State" => "string",
									 "StopNumber" => 0,
									 "TransporterParked" => true,
									 "TransporterResumed" => true,
									 "ZipCode" => "string"
								  ]
							   ],
				   "StopCount" => 0,
				   "Street" => "string",
				   "ThirdPartyTransporter" => [
						 "LicenseNumber" => "string",
						 "Name" => "string"
					 ],
				   "TotalItemCount" => 0,
				   "TransactionID" => 0,
				   "Type" => "string",
				   "UpdatedOn" => "string",
				   "Vehicle" => [
						 "Description" => "string",
						 "ID" => "string"
					 ],
				   "Zip" => "string"
				],
				"SessionTime" => 0,
				"TransactionID" => 0
			 ]);
	}
}
