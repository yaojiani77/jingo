<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">





var geocoder = new google.maps.Geocoder();
var latLng;

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

//output lat and lng to html form in user.php
function updateMarkerPosition(latLng) {
  document.getElementById("lat").value=latLng.lat();
  document.getElementById("lng").value=latLng.lng();

}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

function initialize() {
 var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 14,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(function(position) {
      latLng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);

    var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
    });

    // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);

  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });

      map.setCenter(latLng);
    },function() {
      handleNoGeolocation(true);});

    }
  else{
    //x.innerHTML="Geolocation is not supported by this browser.";
  handleNoGeolocation(false);
      }
      
  function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);


</script>
</head>
<body>
  <style>
  #mapCanvas {
    width: 100%;
    height: 300px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;

  }
  #infoPanel div {
    margin-bottom: 5px;
  }
  </style>
  <div class="container" >
  <form >
  <div id="mapCanvas" ></div>

  <div id="infoPanel" style="display:none"  >
    <b>Marker status:</b>
    <div id="markerStatus"><i>Click and drag the marker.</i></div>
    <b>Current position:</b>
    <div id="info"></div>
   <label for="latitude">latitude:</label><br>
   <input id="lat2" type="text" name="lat" value="" maxlength="100" /><br>
   <label for="longitude">longitude:</label><br>
   <input id="lng2" type="text" name="lng" value="" maxlength="100" /><br>
    <b>Closest matching address:</b>
    <div id="address"></div>
    <div>
      <input id="submit" type="submit" value="Submit" />
    </div>
  </div>

</form>




</body>
</html>

