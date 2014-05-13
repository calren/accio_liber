<?php

/*
* calls an API and returns the XML response
*/

class API {

	function getPage($path){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $path);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		$retValue = curl_exec($ch);			 
		curl_close($ch);
		return new SimpleXMLElement($retValue);
	}
}