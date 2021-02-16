<?php

	namespace OpenTHC\Bunk\Metrc\labtests;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id" => 1,
			"Name" => "THC",
			"RequiresTestResult" => false,
			"InformationalOnly" => false,
			"AlwaysPasses" => false,
			"LabTestResultMode" => 0,
			"LabTestResultMinimum" => null,
			"LabTestResultMaximum" => null,
			"DependencyMode" => 0
		  ],
		  [
			"Id" => 2,
			"Name" => "THCa",
			"RequiresTestResult" => false,
			"InformationalOnly" => false,
			"AlwaysPasses" => false,
			"LabTestResultMode" => 0,
			"LabTestResultMinimum" => null,
			"LabTestResultMaximum" => null,
			"DependencyMode" => 0
		  ],
		  [
			"Id" => 3,
			"Name" => "CBD",
			"RequiresTestResult" => false,
			"InformationalOnly" => false,
			"AlwaysPasses" => false,
			"LabTestResultMode" => 0,
			"LabTestResultMinimum" => null,
			"LabTestResultMaximum" => null,
			"DependencyMode" => 0
		  ],
		  [
			"Id" => 4,
			"Name" => "CBDa",
			"RequiresTestResult" => false,
			"InformationalOnly" => false,
			"AlwaysPasses" => false,
			"LabTestResultMode" => 0,
			"LabTestResultMinimum" => null,
			"LabTestResultMaximum" => null,
			"DependencyMode" => 0
		  ],
		  [
			"Id" => 5,
			"Name" => "Pesticides",
			"RequiresTestResult" => false,
			"InformationalOnly" => false,
			"AlwaysPasses" => false,
			"LabTestResultMode" => 0,
			"LabTestResultMinimum" => null,
			"LabTestResultMaximum" => null,
			"DependencyMode" => "RequiresOne"
		  ]
	);

	return $RES->withJSON($ret);