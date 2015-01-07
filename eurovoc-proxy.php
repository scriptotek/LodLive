<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

function file_get_contents2($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    # curl_setopt($ch, CURLOPT_USERAGENT, 'UBO Scriptotek Dalek (+data.ub.uio.no)');
    curl_setopt($ch, CURLOPT_HEADER, 0); // no headers in the output
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return instead of output
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Accept: application/sparql-results+json',
	    ));
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$url = 'http://open-data.europa.eu/en/linked-data';
$url .= '?' . $_SERVER['QUERY_STRING'];

header('Content-type: application/json; charset=utf-8');
echo file_get_contents2($url);
