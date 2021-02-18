<?php

	namespace OpenTHC\Bunk\Metrc\Strains;
	use OpenTHC\Bunk\Module\METRC;

	switch ($_SERVER['REQUEST_METHOD']) {

		case 'GET':

			$ret = array(
				"Id" => 201,
				"Name" => "Spring Hill Kush",
				"TestingStatus" => "ThirdParty",
				"ThcLevel" => null,
				"CbdLevel" => null,
				"IndicaPercentage" => 60.0,
				"SativaPercentage" => 40.0,
				"IsUsed" => false,
				"Genetics" => "60% Indica / 40% Sativa"
			);
		
			return $RES->withJSON($ret);

			break;

		case 'Delete':
			
			return $RES->write("");
	}