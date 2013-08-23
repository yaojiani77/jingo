


    <script>
function initialize2() {
var locations = [];
// function loadXMLDoc()
//{

var xmlhttp;
var i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    xmlDoc=xmlhttp.responseXML;
    var array = [];
    
   // txt="";
    var amount=xmlDoc.getElementsByTagName("amount");
    var latitude=xmlDoc.getElementsByTagName("latitude");
    var longitude=xmlDoc.getElementsByTagName("longitude");

   for (var i=0;i<amount.length;i++)
     {
        array[0] = amount[i].childNodes[0].nodeValue;
        array[1] = latitude[i].childNodes[0].nodeValue;
        array[2] = longitude[i].childNodes[0].nodeValue;
        array[3] = i+1;

      locations[i]=array;
      array = [];
   
     }
     //document.getElementById("txtHint").innerHTML=locations[2];
    var rows = locations[0];
    var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(rows[1], rows[2]),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById('mapCanvas'),
                                mapOptions);

 // setMarkers(map, beaches);

 /*
var locations = [
  ['Bondi Beach', -33.890542, 151.274856, 4],
  ['Coogee Beach', -33.923036, 151.259052, 5],
  ['Cronulla Beach', -34.028249, 151.157507, 3],
  ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
  ['Maroubra Beach', -33.950198, 151.259302, 1]
];



/**
 * Data for the markers consisting of a name, a LatLng and a zIndex for
 * the order in which these markers should display on top of each
 * other.
 */

 //function setMarkers(map, locations) {
  // Add markers to the map

  // Marker sizes are expressed as a Size of X,Y
  // where the origin of the image (0,0) is located
  // in the top left of the image.

  // Origins, anchor positions and coordinates of the marker
  // increase in the X direction to the right and in
  // the Y direction down.
  var image = {
    url: 'icon1.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(20, 32),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(0, 32)
  };
  var shadow = {
    url: 'icon1.png',
    // The shadow image is larger in the horizontal dimension
    // while the position and offset are the same as for the main image.
    size: new google.maps.Size(37, 32),
    origin: new google.maps.Point(0,0),
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon.
  // The type defines an HTML &lt;area&gt; element 'poly' which
  // traces out a polygon as a series of X,Y points. The final
  // coordinate closes the poly by connecting to the first
  // coordinate.
  var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };


  
  for (var k = 0; k < locations.length; k++) {
    var beach = locations[k];
    
    //console.log(beach);
    
    var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
   
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        shadow: shadow,
        //icon: image,
        shape: shape,
        title: '$'+beach[0],
        zIndex: beach[3]
    });
     

    
  }
//}







   
    }
  }
xmlhttp.open("GET","http://www.zillow.com/webservice/GetComps.htm?zws-id=X1-ZWz1beiaaskwej_avwne&zpid="+responseTextArray[5]+"&count=5",true);
xmlhttp.send();
}  




  

//google.maps.event.addDomListener(window, 'load', initialize);



    </script>



