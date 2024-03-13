<?php
/**
	Creates an Inventory Item
*/

//use Edoceo\Radix\DB\SQL;

/*
{\"action\":\"plant_waste_weigh\",\"collectiontime\":1484870914,\"location\":\"416510\",\"weight\":1402.19,\"uom\":\"lb\",\"API\":\"4.0\",\"sessionid\":\"8b73a7c1a8bc183c49c8eadef6d79ab81ce3a883605783c741be37d55245c5f2b663f0a3cb3c95fd1ac456cce565aeb4dc2f5a8bb9685b5c7de80e2cbd7ca87e\",\"nonce\":\"21b2174e5dc5b37ec2129322d6addc4742ac0653\"}"
*/

/*
"{\"barcode_id\":\"1323798068022947\",\"success\":1,\"sessiontime\":1484870913,\"barcode_type\":\"27\"
"transactionid\":\"71373995\
*/

$iid =_rnd_barcode();
$txn = _rnd_transaction_id();

$ret = array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'barcode_id' => $iid,
	'barcode_type' => 27,
	'transactionid' => $txn,
);

//SQL::init(sprintf('sqlite:%s/var/%09d.db', APP_ROOT, $_SESSION['ubi']));
//SQL::query('CREATE TABLE sync_inventory (id INTEGER PRIMARY KEY, meta TEXT)');

$arg = array('meta' => json_encode(array(
	'id' => $iid,
    'wet' => 0,
    'seized' => null,
    'strain' => null,
    'deleted' => 0,
    'plantid' => null,
    'location' => -1,
    'parentid' => array(),
    'is_sample' => null,
    'source_id' => null,
    'in_process' => null,
    'is_medical' => null,
    'currentroom' => null,
    'net_package' => null,
    'productname' => null,
    'sessiontime' => $_SERVER['REQUEST_TIME'],
    'inventorytype' => 27,
    'transactionid' => $txn,
    'usable_weight' => $json['weight'],
    'inventorystatus' => 1,
    'inventoryparentid' => array(),
    'remaining_quantity' => $json['weight'],
    'inventorystatustime' => $_SERVER['REQUEST_TIME'],
    'transactionid_original' =>  $txn,
    //'sessiontime_iso] => 2017-10-30 10:48:10
    //'inventorystatustime_iso] => 2017-11-02 10:48:11
)));
//SQL::insert('sync_inventory', $arg);

return $RES->withJSON($ret);
