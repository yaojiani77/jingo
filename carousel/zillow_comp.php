<?php
$zpid = $_GET['zpid'];
//echo $zpid;

$url2 = "http://www.zillow.com/webservice/GetComps.htm?zws-id=X1-ZWz1beiaaskwej_avwne&zpid=".$zpid ."&count=5";
$GetComps = simplexml_load_string(file_get_contents($url2));


//echo $url2;

//echo $zpids;
for ($i=0; $i <5 ; $i++) { 
//$zpids = $GetComps->response->properties->comparables->comp[$i]->zpid;
$amount = $GetComps->response->properties->comparables->comp[$i]->zestimate->amount;
$lastUpdated = $GetComps->response->properties->comparables->comp[$i]->zestimate->{'last-updated'};
$street = $GetComps->response->properties->comparables->comp[$i]->address->street;
$city = $GetComps->response->properties->comparables->comp[$i]->address->city;
$link = $GetComps->response->properties->comparables->comp[$i]->links->homedetails;



$response = $amount.','.$lastUpdated.','.$street.','.$city.','.$link.',';

echo $response;
}







?>