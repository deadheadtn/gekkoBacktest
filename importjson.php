<?php

$api = "http://127.0.0.1:3000";
        $scanset = "/api/scansets";
        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $api . $scanset);
        curl_setopt($connection, CURLOPT_POST, true);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connection, CURLOPT_HEADER, 0);
        $response = curl_exec($connection);
        echo $response;
?>
