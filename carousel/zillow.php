<?php
$address = $_GET['address'];
$citystatezip = $_GET['citystatezip'];
//$exploded_var = preg_split('/\s+/', $search); //space
//$exploded_var2 = preg_split('/\./', $search); //dot
//$exploded_var2 = explode('|', $search);

//echo $exploded_var[1];
//$address = urlencode($exploded_var2[0]);
//$citystatezip = rawurlencode($exploded_var2[1]);
//echo $address;
$addressURL = urlencode($address);
$citystatezipURL = urlencode($citystatezip);
//echo $addressURL;
//echo $citystatezipURL;
//$number = $exploded_var[0];
//$road = $exploded_var[1];



$url1 = "http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=X1-ZWz1beiaaskwej_avwne&address='".$addressURL."'&citystatezip='".$citystatezipURL."'";
//echo json_encode(simplexml_load_string(file_get_contents($url)));
$GetSearchResults = simplexml_load_string(file_get_contents($url1));
//print_r($data);
$zpid = $GetSearchResults->response->results->result->zpid;


//echo $zpid;






$url3 = "http://www.zillow.com/webservice/GetZestimate.htm?zws-id=X1-ZWz1beiaaskwej_avwne&zpid=".$zpid."";
$GetZestimate = simplexml_load_string(file_get_contents($url3));
$amount = $GetZestimate->response->zestimate->amount;
$lastUpdated =  $GetZestimate->response->zestimate->{'last-updated'};
$street = $GetZestimate->response->address->street;
$city = $GetZestimate->response->address->city;
$link = $GetZestimate->response->links->homedetails;







$response = $amount.','.$lastUpdated.','.$street.','.$city.','.$link.','.$zpid;

echo $response;



?>