<?php
/**
	Sync Vehicle
*/

return $RES->withJSON(array(
	'success' => 1,
	'vehicle' => array(
		0 => array(
			'color' => 'blue',
			'deleted' => '0',
			'make' => 'ford',
			'model' => 'gt',
			'nickname' => 'ford gt',
			'plate' => '123456',
			'transactionid' => '1',
			'transactionid_original' => '1',
			'vehicle_id' => '12345',
			'vin' =>' 123123123123123',
			'year' => '2002',
		),
		1 => array(
			'color' => 'red',
			'deleted' => '0',
			'make' => 'honda',
			'model' => 'pilot',
			'nickname' => 'honda pilot',
			'plate' => '654321',
			'transactionid' => '2',
			'transactionid_original' => '2',
			'vehicle_id' => '54321',
			'vin' => '321321321321321',
			'year' => '2007',
		),
	)
), 200, JSON_PRETTY_PRINT);

/*
{"success":1,"vehicle":[{"plate":"NCG925","vin":"JTEBU5JRXC5079123","make":"toyota","nickname":"Fred's 4-Runner","transactionid_original":17782959,"model":"4-runner","transactionid":17782959,"deleted":0,"color":"gray","year":"2012","vehicle_id":3},{"plate":"PJC815","vin":"5TDBKRFH0ES043150","make":"Toyota","nickname":"Jill's Toyota","transactionid_original":18854119,"model":"Highlander","transactionid":18854119,"deleted":0,"color":"Gray","year":"2104","vehicle_id":4},{"year":"2005","color":"white","deleted":0,"vehicle_id":5,"transactionid":19606079,"transactionid_original":19606079,"model":"4-runner","plate":"818SYX","vin":"JTEBU14R458043126","nickname":"Minka's 4-runner","make":"toyota"},{"transactionid":19886990,"vehicle_id":6,"year":"2015","color":"silver","deleted":0,"nickname":"Marcus's Forester","make":"Subaru","plate":"MTZ246","vin":"JF2SJGWC6FH805545","model":"Forester","transactionid_original":19886990},{"model":"Matrix","transactionid_original":23660254,"nickname":"Sascha's Matrix","make":"Toyota","plate":"146TSA","vin":"2T1KY38EX4C273915","vehicle_id":7,"year":"2004","deleted":0,"color":"Blue","transactionid":23660254}]}
 */
