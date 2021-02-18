<?php

	namespace OpenTHC\Bunk\Metrc\Sales;
	use OpenTHC\Bunk\Module\METRC;

	switch ($_SERVER['REQUEST_METHOD']) {

		case 'GET':

			$ret = array(

			);
		
			return $RES->withJSON($ret);

			break;

		case 'POST':

			$ret = array(

			);
		
			return $RES->withJSON($ret);
			break;

		case 'PUT':
			
			$ret = array(

			);
		
			return $RES->withJSON($ret);

			break;

		case 'Delete':
			
			break;
	}