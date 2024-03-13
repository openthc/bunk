<?php
/**

*/

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The transaction you specified could not be found or has already been voided.',
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'There was an error voiding the transaction. Please try again.',
	'errorcode' => 1000,
));

//inventory_qa_sample_void
//    case 'inventory_qa_sample_void':
//        die(json_encode(array('success' => '1', 'transactionid' => '33778', 'sessiontime' => $time)));
//        break;
//