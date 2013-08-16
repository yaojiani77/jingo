<?php
require_once('header.php');


require_once('time_ago.php');

$query = "SELECT notetext, Utime FROM USER,NOTE WHERE USER.uid=NOTE.uid and email='".$email."'";

$result = $mysqli->query($query);

require_once('clickgeo.php');
?>

<script type="text/javascript">
var responseTextArray;
function showZestimate(obj)
{
var xmlhttp;
if (obj.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
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
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
      responseTextArray = xmlhttp.responseText.split(",");
    document.getElementById("amount").innerHTML=responseTextArray[0];
    document.getElementById("lastupdated").innerHTML=responseTextArray[1];
    var location = [responseTextArray[2],responseTextArray[3]];
    var locationJoin = location.join(" ");
    document.getElementById("location").innerHTML= locationJoin;
    document.getElementById("location").href= responseTextArray[4];
    //document.getElementById("houserow").show();
    //x.append($(existingdiv).clone().show()).html();
    existingdiv=document.getElementById("houserow");
      var x=$("#houserow").parent();
      x.append($(existingdiv).clone().show()).html();


    }
  }
xmlhttp.open("GET","zillow.php?address="+obj.elements[0].value+"&citystatezip="+obj.elements[1].value,true);
xmlhttp.send();
}

function showComp()
{
var xmlhttp;

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
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
      for (var i = 0; i < 25; ) {
     
    document.getElementById("img").src="../include/img/house"+i+".png"; 
    var responseTextArray2 = xmlhttp.responseText.split(",");
    document.getElementById("amount").innerHTML=responseTextArray2[i];
    document.getElementById("lastupdated").innerHTML=responseTextArray2[i+1];
    var location = [responseTextArray2[i+2],responseTextArray2[i+3]];
    var locationJoin = location.join(" ");
    document.getElementById("location").innerHTML= locationJoin;
    document.getElementById("location").href= responseTextArray2[i+4];
    existingdiv=document.getElementById("houserow");
      var x=$("#houserow").parent();
      x.append($(existingdiv).clone().show()).html();
      i=i+5;
    }
    }
  }
xmlhttp.open("GET","zillow_comp.php?zpid="+responseTextArray[5],true);
xmlhttp.send();
}



  </script>


 <form >
  <div id="mapCanvas" style="position:relative;z-index:1"></div>

  <div id="infoPanel" style="display:none"  >
    <b>Marker status:</b>
    <div id="markerStatus"><i>Click and drag the marker.</i></div>
    <b>Current position:</b>
    <div id="info"></div>
   <label for="latitude">latitude:</label><br>
   <input id="lat" type="text" name="lat" value="" maxlength="100" /><br>
   <label for="longitude">longitude:</label><br>
   <input id="lng" type="text" name="lng" value="" maxlength="100" /><br>
    <b>Closest matching address:</b>
    <div id="address"></div>
    <div>
 
    </div>
  </div>

</form >

<form style="position:relative;right:450px;bottom:300px;z-index:2;opacity:0.7;">
<input id="search" type="text" placeholder="address" value="2114 Bigelow Ave N" style="float:right;border:2px solid;border-radius:5px; ">
<input id="search" type="text" placeholder="citystatezip" value="Seattle, WA" style="float:right;border:2px solid;border-radius:5px; ">
<button  style="float:right;border:2px solid;border-radius:5px; " type="button" onclick="showZestimate(this.form);">Search</button>
 </form>

 <p>Suggestions: <span id="txtHint"></span></p>



</div>
<div>
<div class="container" id="houserow" style="display:none;">
<!--Notes-->
<div class="span10 well" >
  <div class="row">
    <div class="span2 left"><a href="#" class="thumbnail"><img id="img" src="../include/img/house.png" alt=""></a></div>
    <div class="span6" >
      <p><a href="#" id="location"><strong ></strong></a></p>
      <p><strong>House for sale by owner: $</strong><strong id="amount"></strong></p>
        <span class="pull-right"><small>last updated: </small><small id="lastupdated"></small></span>
    </div>
    <input type="button" value="compare" onclick="showComp();" style="position:relative;left:350px;bottom:60px">
    
      <p></p>
    


  </div>
  <!--row -->
</div>
<!-- span 10 well-->
</div>
<!--container-->
</div>

<!--
<?php



//while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>



<div class="container" >

<div class="span10 well" >
	<div class="row">
		<div class="span1 left"><a href="#" class="thumbnail"><img src="../include/img/users/user.jpg" alt=""></a></div>
		<div class="span5" >
			<p><a href="#"><strong>Hi</strong><?php //echo ' '.$email; ?></a></p>
		    <span class="pull-right"><small><?php //echo time_ago(strtotime($row['Utime']));?></small></span>
		</div>
		
			<p><?php //echo $row['notetext'];?></p>
		


	</div>

</div>

</div>
-->



	




<?php require_once('footer.php'); ?>