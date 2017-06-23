<?php 

$d = $_POST['newPayment'];

echo json_encode(sendToServer($d));


function sendToServer($row){
		
        
        $url = 'http://lightapi.torque.co.rw:8080/requestpayment/';
		
	$data = array();
	$data = $row;
       

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
                        'Version' => "HTTP/1.1",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error */ 
		
		//var_dump($result);	
		
		return (object)$row;
		
	}	

	//var_dump($result);		
	
	return json_decode($result);
}

?>
