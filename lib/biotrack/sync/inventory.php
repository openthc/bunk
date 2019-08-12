<?php
/**
	Fake Inventory Sync
*/

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
			'transactionid'=>_rnd_transaction_id(),
			'transactionid_original'=>_rnd_transaction_id(),
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
			'transactionid'=>_rnd_transaction_id(),
			'transactionid_original'=>_rnd_transaction_id(),
			'usable_weight'=>'100.00',
			'wet'=>'0',
			'net_package'=>'50.00',
		),
	)
));
