<?php

	function getaddress($lat,$lng){
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false';
		$json = @file_get_contents($url);
		$data=json_decode($json);
		$status = $data->status;
		 
		if($status=="OK"){
		   return $data->results[0]->formatted_address;
		}else{
		   return false;
		}
	}

	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
		$lat1 = (float)$lat1;
		$lon1 = (float)$lon1;
		$lat2 = (float)$lat2;
		$lon2 = (float)$lon2; 
	  	$theta = $lon1 - $lon2;
	 	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	 	$dist = acos($dist);
	 	$dist = rad2deg($dist);
	 	$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

	 	if ($unit == "K") {
		    return ($miles * 1.609344);
		}else if ($unit == "N") {
		    return ($miles * 0.8684);
		}else {
	 	    return $miles;
	 	}
	}
