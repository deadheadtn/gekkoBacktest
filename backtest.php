<?php

function launchebot($pairs)
	{
	$from = $pairs['to'];
	$jsonwatcher = '{"watch":{"exchange":"binance","currency":"' . $pairs["currency"] . '","asset":"' . $pairs["asset"] . '"},"candleWriter":{"enabled":true,"adapter":"sqlite"},"type":"market watcher","mode":"realtime"}';
	$jsonpaper = '{"market":{"type":"leech","from":"' . $from . '"},"mode":"realtime","watch":{"exchange":"binance","currency":"' . $pairs["currency"] . '","asset":"' . $pairs["asset"] . '"},"tradingAdvisor":{"enabled":true,"method":"mounirs-ga-version-2","candleSize":' . $pairs['candlesize'] . ',"historySize":10},"x2_rsi":{"interval":14,"thresholds":{"low":30,"high":70,"persistence":1}},"paperTrader":{"feeMaker":0.25,"feeTaker":0.25,"feeUsing":"maker","slippage":0.05,"simulationBalance":{"asset":1,"currency":100},"reportRoundtrips":true,"enabled":true},"candleWriter":{"enabled":true,"adapter":"sqlite"},"type":"paper trader","performanceAnalyzer":{"riskFreeReturn":2,"enabled":true},"valid":true}';
	$connection = curl_init();
	curl_setopt($connection, CURLOPT_URL, "http://localhost:3000/api/startGekko");
	curl_setopt($connection, CURLOPT_POST, true);
	curl_setopt($connection, CURLOPT_POSTFIELDS, $jsonwatcher);
	curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($connection, CURLOPT_ENCODING, 'gzip, deflate');
	curl_setopt($connection, CURLOPT_TIMEOUT, -1);
	$headers = array();
	$headers[] = "Origin: http://localhost:3000/api/startGekko";
	$headers[] = "Accept-Encoding: gzip, deflate, br";
	$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
	$headers[] = "X-Hola-Request-Id: 80131";
	$headers[] = "X-Requested-With: XMLHttpRequest";
	$headers[] = "Connection: keep-alive";
	$headers[] = "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36";
	$headers[] = "Content-Type: application/json";
	$headers[] = "Accept: */*";
	$headers[] = "Cache-Control: no-cache,no-store,must-revalidate,max-age=-1,private";
	$headers[] = "Referer: http://localhost:3000/api/startGekko";
	$headers[] = "Dnt: 1";
	$headers[] = "X-Hola-Unblocker-Bext: reqid 80131: before request, vpn is not allowed, send headers";
	$headers[] = "Expires: -1";
	curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
	$responsej = curl_exec($connection);

	//

	$connection = curl_init();
	curl_setopt($connection, CURLOPT_URL, "http://localhost:3000/api/startGekko");
	curl_setopt($connection, CURLOPT_POST, true);
	curl_setopt($connection, CURLOPT_POSTFIELDS, $jsonpaper);
	curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($connection, CURLOPT_ENCODING, 'gzip, deflate');
	curl_setopt($connection, CURLOPT_TIMEOUT, -1);
	$headers = array();
	$headers[] = "Origin: http://localhost:3000/api/startGekko";
	$headers[] = "Accept-Encoding: gzip, deflate, br";
	$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
	$headers[] = "X-Hola-Request-Id: 80131";
	$headers[] = "X-Requested-With: XMLHttpRequest";
	$headers[] = "Connection: keep-alive";
	$headers[] = "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36";
	$headers[] = "Content-Type: application/json";
	$headers[] = "Accept: */*";
	$headers[] = "Cache-Control: no-cache,no-store,must-revalidate,max-age=-1,private";
	$headers[] = "Referer: http://localhost:3000/api/startGekko";
	$headers[] = "Dnt: 1";
	$headers[] = "X-Hola-Unblocker-Bext: reqid 80131: before request, vpn is not allowed, send headers";
	$headers[] = "Expires: -1";
	curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
	$responsej = curl_exec($connection);
	}

function multiRequest($data, $options = array())
	{
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

	// array of curl handles

	$curly = array();

	// data to be returned

	$result = array(
		array()
	);

	// multi handle

	$mh = curl_multi_init();

	// loop through $data and create curl handles
	// then add them to the multi-handle
	foreach($data as $id => $d)
		{
		$curly[$id] = curl_init();
		curl_setopt($curly[$id], CURLOPT_URL, "127.0.0.1:3000/api/backtest");
		curl_setopt($curly[$id], CURLOPT_HEADER, 0);
		curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curly[$id], CURLOPT_ENCODING, 'gzip, deflate');
		curl_setopt($curly[$id], CURLOPT_TIMEOUT, -1);
		curl_setopt($curly[$id], CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curly[$id], CURLOPT_POST, 1);
		curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);

		// extra options?

		if (!empty($options))
			{
			curl_setopt_array($curly[$id], $options);
			}

		curl_multi_add_handle($mh, $curly[$id]);
		}

	// execute the handles

	$running = null;
	do
		{
		curl_multi_exec($mh, $running);
		}

	while ($running > 0);

	// get content and remove handles

	$x = 0;
	foreach($curly as $id => $c)
		{

		$result[$id]["data"] = curl_multi_getcontent($c);
		$result[$id]['currency'] = $data[$x]['currency'];
		$result[$id]['asset'] = $data[$x]['asset'];
		$result[$id]['strat'] = $data[$x]['strat'];
		$result[$id]['namestrat'] = $data[$x]['namestrat'];
		$result[$id]['candlesize'] = $data[$x]['candlesize'];
		curl_multi_remove_handle($mh, $c);
		$x++;
		}

	// all done

	curl_multi_close($mh);
	return $result;
	}

function replace_recursive(Array $array, $key, $value)
	{
	array_walk_recursive($array,
	function (&$v, $k) use($key, $value)
		{
		$k == $key && $v = $value;
		});
	return $array;
	}

function rand_float($st_num = 0, $end_num = 1, $mul = 1000000)
	{
	if ($st_num > $end_num) return false;
	return mt_rand($st_num * $mul, $end_num * $mul) / $mul;
	}

function randparam($strategy)
	{
	foreach($strategy as $key1 => $p)
		{
		if (isset($strategy[$key1][0]))
			{
			if (!is_string($strategy[$key1][0]))
				{
				$pp[] = [$key1, $strategy[$key1][0], $strategy[$key1][1]];
				}
			}
		  else
			{
			foreach($strategy[$key1] as $key => $p1)
				{
				$pp[] = [$key, $p1[0], $p1[1]];
				}
			}
		}

	return $pp;
	}

function loadf($pp, $strategy)
	{
	for ($paramnumber = 0; $paramnumber < count($pp); $paramnumber++)
		{
		$strategy = replace_recursive($strategy, $pp[$paramnumber][0], rand_float($pp[$paramnumber][1], $pp[$paramnumber][2]));
		}

	return $strategy;
	}

$arrays = array();
$data1 = array(
	array() ,
	array()
);
$file = json_decode(file_get_contents('1.json', FILE_USE_INCLUDE_PATH) , true);
$i = 0;
$data = $file['datasets'];
require ("Toml.php");
$max=0;
$candlesize = array(
	15
);
$stratsegyarray = scandir("Param");
array_shift($stratsegyarray);
$file = fopen("result.csv", "a+");
$result = fopen("param.csv", "a+");
array_shift($stratsegyarray);
$j = - 1;
$pp = array();
$instanceid=0;
$max=0;
for ($i = 0; $i < count($data); $i++)
	{
		$max=0;
	foreach($stratsegyarray as $strat)
		{
			$max=0;
		if (isset($data[$i]['ranges'][0]) && strcmp($data[$i]["currency"], "BTC") == 0 && strcmp($data[$i]["asset"], "BNB") == 0 )
			{
			$strategy = json_decode(json_encode(Toml::parseFile("Param/" . $strat)) , true);
			$strategy_loaded = json_decode(json_encode(Toml::parseFile("params/" . $strat)) , true);
			$pp = randparam($strategy);
			foreach($candlesize as $candle)
				{
				for ($iteration = 0; $iteration < 156; $iteration++)
					{
					$tt = new Datetime();
					$datetime1 = new DateTime(date('Y-m-d H:i:s', $data[$i]['ranges'][0]['from']));
					$datetime2 = new DateTime(date('Y-m-d H:i:s', $data[$i]['ranges'][0]['to']));
					$oDiff = $datetime1->diff($datetime2);
					$tt->setTimestamp($data[$i]['ranges'][0]['to']);
					$score = 0;
					$cumulativeprofit = 0;
					$tradeCount = 0;
					$strategy_load = loadf($pp, $strategy_loaded);
						$tt->setTimestamp($data[$i]['ranges'][0]['to']);
						$from = date("Y-m-d\\TH:i:sP", strtotime('-125 days', $tt->getTimestamp()));
		        $to = $tt->format('Y-m-d H:i');
						$j++;
						$ttt = '{"watch":{"exchange":"binance","currency":"' . $data[$i]["currency"] . '","asset":"' . $data[$i]["asset"] . '"},"paperTrader":{"feeMaker":0.15,"feeTaker":0.15,"feeUsing":"maker","slippage":0.05,"simulationBalance":{"asset":1,"currency":100},"reportRoundtrips":true,"enabled":true},"tradingAdvisor":{"enabled":true,"method": "' . str_replace(".toml", "", $strat) . '","candleSize": ' . $candle . ',"historySize":10},"' . str_replace(".toml", "", $strat) . '": ' . json_encode($strategy_load) . ',"backtest":{"daterange":{"from":"' . $from . '","to":"' . $to . '"}},"backtestResultExporter":{"enabled":true,"writeToDisk":false,"data":{"stratUpdates":false,"roundtrips":true,"stratCandles":true,"stratCandleProps":["open"],"trades":false}},"performanceAnalyzer":{"riskFreeReturn":2,"enabled":true},"valid":true}';
						$data1[$j]['post'] = $ttt;
						$data1[$j]['currency'] = $data[$i]["currency"];
						$data1[$j]['asset'] = $data[$i]["asset"];
						$data1[$j]['strat'] = json_encode($strategy_load, true);
						$data1[$j]['candlesize'] = $candle;
						$data1[$j]['namestrat'] = str_replace(".toml", "", $strat);
						if ($j == 5)
							{
							$j = 0;
							$r = multiRequest($data1);
							foreach($r as $aa)
								{
								$array = json_decode($aa["data"], true);

								if (isset($array["performanceReport"]))
									{
									$cumulativeprofit+= $array["performanceReport"]["relativeProfit"];
									$tradeCount+= $array["performanceReport"]["trades"];
									if ($array["stratCandles"][count($array["stratCandles"]) - 1]["open"] > $array["stratCandles"][0]["open"])
										{
										$market = round($array["stratCandles"][count($array["stratCandles"]) - 1]["open"] / $array["stratCandles"][0]["open"], 2);
										$market = ($market * 100) - 100;
										}
									  else
										{
										$market = round($array["stratCandles"][0]["open"] / $array["stratCandles"][count($array["stratCandles"]) - 1]["open"], 2);
										$market = ($market * 100) - 100;
										$market = - 1 * $market;
										}

									if ($array["performanceReport"]["relativeProfit"] > $max && $array["performanceReport"]["relativeProfit"] > $market && $array["performanceReport"]["relativeProfit"] > 1)
										{
											fputcsv($result, [$array["performanceReport"]["relativeProfit"],$aa['candlesize'], $aa['strat'], $array["stratCandles"][0]["start"], $array["stratCandles"][count($array["stratCandles"]) - 1]["start"]]);
											$max = $array["performanceReport"]["relativeProfit"];
											echo "Profit: " . round($array["performanceReport"]["relativeProfit"], 2) . " , Pair: " . $aa['currency'] . $aa['asset'] . ", Market:" . $market . " ,NÃ‚Â°trades:" . $array["performanceReport"]["trades"] . " ,candleSize:" . $aa['candlesize'] . " stratname:" . $aa['namestrat'] . "\n";
											fputcsv($file, [round($array["performanceReport"]["relativeProfit"], 2) , $aa['currency'] . $aa['asset'], $market, $array["performanceReport"]["trades"], $aa['namestrat'], $aa['candlesize'], str_replace('""', '', $aa['strat']) , $array["stratCandles"][0]["start"], $array["stratCandles"][count($array["stratCandles"]) - 1]["start"]]);
										}
								}
							}
						}
					}
				}
			}
		}
	}

?>
