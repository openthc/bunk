<?php
/**
 * @todo make a test with 4000+ items on an inbound
 */

use \OpenTHC\Bunk\BioTrack\Base;


/*
{
	"action":"inventory_transfer_lookup",
	"location":"418921",
	"manifest_id":"7815325929358807",
	"API":"4.0",
	"sessionid":"84792b93288b7cbdd0b04439ce676485cf58bf6fa977c8476f98fb3618b3c61ee87fcd760eec05b88a46a09c9f67307e842435d7fd454bf72f5793cee3a43f04",
	"nonce":"80e44d60b3743b890d8bf97f4edefe9d1756de51"
}
*/
// return $RES->withJSON(array(
// 	'success' => 0,
// 	'error' => 'No outstanding inbound inventory items were found.',
// 	'errorcode' => 602,
// ));

$ret = array(
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'success' => 1,
	'data' => array()
);

$ret['data'][] = array(
	'description' => null,
	'sample_id' => Base::_rnd_barcode(),
	'strain' => 'Dreadbread',
	"barcode_id" => "6033571320007909",
	"is_medical" => 0,
	"quantity" => "2246",
	"is_sample" => null,
	"inventorytype" => 13,
	"product" => "Flower Lot",
	"usableweight" => "2250",
);
return $RES->withJSON($ret);

// case 'inventory_transfer_lookup':

// "data":[{,,,,,,},{"usableweight":"3.5","barcode_id":"6033573300000126","quantity":"1","inventorytype":28,"is_sample":null,"strain":"Dutch Treat","description":"Dutch Treat 3.5 grams","product":"Dutch Treat 3.5 grams","is_return":1,"sample_id":"7808661315053576","is_medical":0},{"is_medical":0,"is_return":1,"sample_id":"2370636738816649","strain":"AK 420","is_sample":null,"product":"AK 420 7 grams","description":"AK 420 7 grams","usableweight":"7","quantity":"3","barcode_id":"6033573300000125","inventorytype":28},{"is_medical":0,"is_return":1,"sample_id":"1680884301390481","product":"UK Cheese 7 grams","description":"UK Cheese 7 grams","is_sample":null,"strain":"UK Cheese","barcode_id":"6033573300000124","quantity":"2","inventorytype":28,"usableweight":"7"}
// ],

$ret = array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'data' => array(),
);

// Random Amount of Returns?
$ret['data'][] = array(
	'barcode_id' => "6033573300000127",
	'inventorytype' => 28,
	'sample_id' => "6635764783964066",
	'strain' => "Dirty Girl",
	'product' => "Dirty Girl 1 gram",
	'description' => "Dirty Girl 1 gram",
	'quantity' => "3",
	'usableweight' => "1",
	'is_return' => 1,
	'is_medical' => 0,
	'is_sample' => null,
);

return $RES->withJSON($ret);

/*
	{"description":null,"sample_id":"9030420662684872","barcode_id":"6033571320007908","strain":"Ol' Mendo Hashplant","is_medical":0,"is_sample":null,"quantity":"2261","inventorytype":13,"product":"Flower Lot","usableweight":"2265"},
	{"barcode_id":"6033571320007910","strain":"Puna Budder Cookies","is_medical":0,"is_sample":null,"quantity":"2256","description":null,"sample_id":"1841077836935556","usableweight":"2260","inventorytype":13,"product":"Flower Lot"}
*/
