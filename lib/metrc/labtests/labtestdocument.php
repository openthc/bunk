<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Labtests;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"LabTestResultId" =>  1,
		"DocumentFileName" => "Medigrazers Lab Results 20181215.pdf",
		"DocumentFileBase64" => "File encoded in Base64==",
	],
	[
		"LabTestResultId" => 2,
		"DocumentFileName" => "Medigrazers Lab Results 20190215.pdf",
		"DocumentFileBase64" => "File encoded in Base64==",
	]
);

return $RES->withJSON($ret);
