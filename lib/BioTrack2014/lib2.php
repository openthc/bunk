<?php
/**
	Library of Shit for the mock BioTrack API
*/

function _fail($text, $code='eFake')
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

	die(json_encode(array(
		'success' => '0',
		'error' => $text,
		'errorcode' => $code,
	)));
}

function _rnd_barcode($com=null)
{
	//if (empty($k)) $k = '0000';
	//return "9999{$k}00" . sprintf('%06d', mt_rand(1, 9999));
	$A = new API_GUID();
	$r = $A->_gen_biotrack($com, '');
	//_gen_biotrack
	return $r;
}

function _rnd_inventory_type()
{
	$list = Service_WSLCB::kindList();
	$list = array_keys($list);
	$idx = array_rand($list);
	return $list[$idx];
}

function _rnd_license()
{
	$list = array(
		'100111111',
		'200222222',
		'300333333',
		'400444444',
		'500555555',
		'600666666',
		'700777777',
		'800888888',
		'900999999',
	);
	$idx = array_rand($list);
	return $list[$idx];
}

function _rnd_product_name()
{
	$rnd_list = array(
		'BTMRND: Matanuska TF',
		'BTMRND: Trainwreck',
		'BTMRND: Granberry Skunkhound',
		'BTMRND: Barack O Bubba',
		'BTMRND: Bluesnow Yum-Yum',
		'BTMRND: Pineapple Rhino',
		'BTMRND: Dankenstein',
		'BTMRND: Blue Dragon',
		'BTMRND: Plunkbottom Sourc Diesel',
		'BTMRND: Strawberry Stankness',
	);

	$idx = array_rand($rnd_list);

	return $rnd_list[$idx];
}

function _rnd_transaction_id()
{
	static $i = 0;
	$i++;
	return floor($_SERVER['REQUEST_TIME'] / 10) + $i;
}

