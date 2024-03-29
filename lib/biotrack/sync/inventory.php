<?php
/**
 * Fake Inventory Sync
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;


return $RES->withJSON(array(
	'success' => 1,
	'inventory' => array(
		0 => array(
			'deleted' => '0',
			'id' => '1234123412341234',
			'inventorytype'=>'7',
			'location' => '999999',
			'plantid'=>array('1234123412341234'),
			'remaining_quantity'=>'300.00',
			'sessiontime'=>$time,
			'strain'=>'dutch treat',
			'transactionid'=>Base::_rnd_transaction_id(),
			'transactionid_original'=>Base::_rnd_transaction_id(),
			'usable_weight'=>'300.00',
			'wet'=>'0',
			'net_package'=>'100.00',
		),
		1 => array(
			'deleted' => '0',
			'id' => '4321432143214321',
			'inventoryparentid'=>'4321432143214321',
			'inventorytype'=>'9',
			'location' => '999999',
			'parentid'=>'9876987698769876',
			'remaining_quantity'=>'200.00',
			'sessiontime'=>$time,
			'strain'=>'blue dream',
			'transactionid'=>Base::_rnd_transaction_id(),
			'transactionid_original'=>Base::_rnd_transaction_id(),
			'usable_weight'=>'100.00',
			'wet'=>'0',
			'net_package'=>'50.00',
		),
		array (
			'currentroom' => NULL,
			'deleted' => 0,
			'id' => '2891345622130160',
			'inventoryparentid' => NULL,
			'inventorystatus' => NULL,
			'inventorystatustime' => NULL,
			'inventorytype' => 13,
			'is_sample' => NULL,
			'location' => '999999',
			'net_package' => NULL,
			'parentid' => NULL,
			'plantid' => NULL,
			'productname' => NULL,
			'rec_usableweight' => NULL,
			'remaining_quantity' => '1',
			'seized' => NULL,
			'sessiontime' => $time,
			'source_id' => null,
			'strain' => 'Blueberry',
			'transactionid' => Base::_rnd_transaction_id(),
			'transactionid_original' => Base::_rnd_transaction_id(),
			'usable_weight' => '1',
			'wet' => 0,
		),
		array (
			'currentroom' => NULL,
			'deleted' => 0,
			'id' => '0000000090000178',
			'inventoryparentid' => NULL,
			'inventorystatus' => NULL,
			'inventorystatustime' => NULL,
			'inventorytype' => 13,
			'is_sample' => NULL,
			'location' => '999999',
			'net_package' => NULL,
			'parentid' => NULL,
			'plantid' => NULL,
			'productname' => NULL,
			'rec_usableweight' => NULL,
			'remaining_quantity' => '1',
			'seized' => NULL,
			'sessiontime' => $time,
			'source_id' => null,
			'strain' => 'Blueberry',
			'transactionid' => Base::_rnd_transaction_id(),
			'transactionid_original' => Base::_rnd_transaction_id(),
			'usable_weight' => '1',
			'wet' => 0,
		),

		// app#1568
		array(
			'deleted' => '0',
			'id' => '2023164042000000',
			'inventoryparentid' => null,
			'inventorytype'=>'7',
			'location' => '990001',
			'parentid'=>'',
			'remaining_quantity'=>'100.00',
			'sessiontime'=>$time,
			'strain'=>'blue dream',
			'transactionid'=>Base::_rnd_transaction_id(),
			'transactionid_original'=>Base::_rnd_transaction_id(),
			'usable_weight'=>'100.00',
			'wet'=>'0',
			'net_package' => null,
		),
		array (
			'currentroom' => NULL,
			'deleted' => 0,
			'id' => '2023164042000001',
			'inventoryparentid' => NULL,
			'inventorystatus' => NULL,
			'inventorystatustime' => NULL,
			'inventorytype' => 7,
			'is_sample' => NULL,
			'location' => '990001',
			'net_package' => NULL,
			'parentid' => NULL,
			'plantid' => NULL,
			'productname' => NULL,
			'rec_usableweight' => NULL,
			'remaining_quantity' => '200',
			'seized' => NULL,
			'sessiontime' => $time,
			'source_id' => null,
			'strain' => 'Shady Apples',
			'transactionid' => Base::_rnd_transaction_id(),
			'transactionid_original' => Base::_rnd_transaction_id(),
			'usable_weight' => '200',
			'wet' => 0,
		),
		array (
			'currentroom' => NULL,
			'deleted' => 0,
			'id' => '2023164042000002',
			'inventoryparentid' => NULL,
			'inventorystatus' => NULL,
			'inventorystatustime' => NULL,
			'inventorytype' => 7,
			'is_sample' => NULL,
			'location' => '990001',
			'net_package' => NULL,
			'parentid' => NULL,
			'plantid' => NULL,
			'productname' => NULL,
			'rec_usableweight' => NULL,
			'remaining_quantity' => '300',
			'seized' => NULL,
			'sessiontime' => $time,
			'source_id' => null,
			'strain' => 'Shady Oranges',
			'transactionid' => Base::_rnd_transaction_id(),
			'transactionid_original' => Base::_rnd_transaction_id(),
			'usable_weight' => '300',
			'wet' => 0,
		),

		// @gitlab app#1565
		array(
			'currentroom' => NULL,
			'deleted' => 0,
			'id' => '2023171133000000',
			'inventoryparentid' => array(
				0 => '2023171133000001',
			),
			'inventorystatus' => NULL,
			'inventorystatustime' => 1684591739,
			'inventorytype' => 28,
			'is_sample' => NULL,
			'location' => '990001',
			'net_package' => '1.5',
			'parentid' => array(
				0 => '2023171133000002',
			),
			'plantid' => NULL,
			'productname' => 'Preroll',
			'rec_usableweight' => '0.053',
			'remaining_quantity' => '99.00',
			'seized' => NULL,
			'sessiontime' => 1683396546,
			'source_id' => NULL,
			'strain' => 'Green Crack',
			'transactionid' => Base::_rnd_transaction_id(),
			'transactionid_original' => Base::_rnd_transaction_id(),
			'usable_weight' => '1.5050505050505',
			'wet' => 0,
		),

		// @gitlab app#1654
		array(
			'currentroom' => NULL,
			'deleted' => 0,
			'id' => '2023184130600000',
			'inventoryparentid' => array(
				0 => '2023184130600001',
			),
			'inventorystatus' => NULL,
			'inventorystatustime' => 1684591739,
			'inventorytype' => 28,
			'is_sample' => NULL,
			'location' => '990001',
			'net_package' => '1',
			'parentid' => array(
				0 => '2023184130600002',
			),
			'plantid' => NULL,
			'productname' => 'Preroll',
			'rec_usableweight' => '1',
			'remaining_quantity' => '1',
			'seized' => NULL,
			'sessiontime' => 1683396546,
			'source_id' => NULL,
			'strain' => 'Green Crack',
			'transactionid' => Base::_rnd_transaction_id(),
			'transactionid_original' => Base::_rnd_transaction_id(),
			'usable_weight' => '1',
			'wet' => 0,
		),
)));
