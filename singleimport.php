
<?php
$prod = json_decode(file_get_contents('product', FILE_USE_INCLUDE_PATH), true);
$prod = $prod["data"];
$file = json_decode(file_get_contents('1.json', FILE_USE_INCLUDE_PATH), true);
$instances = json_decode(file_get_contents('Instance.json', FILE_USE_INCLUDE_PATH) , true);
		$arrays= array();
        $data = $file['datasets'];
				$i=0;
		foreach($data as $pairs){
			if (strcmp($pairs["currency"],"BTC")==0 ){

		    	$i++;
        	$tt = new \Datetime();

        	$tt->setTimestamp($pairs["ranges"][0]["to"]);
	        $from = $tt->format('Y-m-d H:i');
		        $to = (new \DateTime())->format('Y-m-d H:i');
		      	$ttt='{"watch":{"exchange":"binance","currency":"'.$pairs["currency"].'","asset":"'.$pairs["asset"].'"},"importer":{"daterange":{"from":"'.$from.'","to":"'.$to.'"}},"candleWriter":{"enabled":true}}';
		        $connection = curl_init();
		        curl_setopt($connection, CURLOPT_URL, "http://127.0.0.1:3000/api/import");
		        curl_setopt($connection, CURLOPT_POST, true);
		        curl_setopt($connection, CURLOPT_POSTFIELDS,$ttt);
		        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
		        curl_setopt($connection, CURLOPT_ENCODING, 'gzip, deflate');
		        curl_setopt($connection, CURLOPT_TIMEOUT, -1);
		        $headers = array();
		        $headers[] = "Origin: http://127.0.0.1:3000";
		        $headers[] = "Accept-Encoding: gzip, deflate, br";
		        $headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
		        $headers[] = "X-Hola-Request-Id: 80131";
		        $headers[] = "X-Requested-With: XMLHttpRequest";
		        $headers[] = "Connection: keep-alive";
		        $headers[] = "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36";
		        $headers[] = "Content-Type: application/json";
		        $headers[] = "Accept: */*";
		        $headers[] = "Cache-Control: no-cache,no-store,must-revalidate,max-age=-1,private";
		        $headers[] = "Referer: http://127.0.0.1:3000/";
		        $headers[] = "Dnt: 1";
		        $headers[] = "X-Hola-Unblocker-Bext: reqid 80131: before request, vpn is not allowed, send headers";
		        $headers[] = "Expires: -1";
		        curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
		        $responsej = curl_exec($connection);
						sleep(5);

					}
 }
?>
