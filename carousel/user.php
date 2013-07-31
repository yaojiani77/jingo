<?php
require_once('header.php');
require_once('time_ago.php');




//store notes
$lat= $_POST['lat'];
$lng= $_POST['lng'];
$note=$_POST['note'];


if($note){


$query2= "INSERT INTO NOTE (uid,notetext,x,y,x1,y1)
VALUES ('7','$_POST[note]','$_POST[lat]','$_POST[lng]','40','50')";

$mysqli->query($query2);

}


?>





<div class="container ">
	<?php require_once('clickgeo.php');?>
 <style>
  #mapCanvas {
    width: 500px;
    height: 300px;
    float:left;
  
  }
  </style>


<!--post notes-->

<div class="span5 well ">
	<div class="row">
		<div class="span2 left" ><a href="#" class="thumbnail"><img src="../include/img/users/user.jpg" alt=""></a></div>
		<div class="span5 ">
			<p><a href="#">Hi<?php echo ' '.$email; ?></a></p>
          <!--	<p><strong><?php echo $firstname.' '.$lastname ?></strong></p>-->
		</div>
		<div class="span3 left">
			<span class=" badge badge-warning"><!--<?php echo $row3['ncount'] ;?>--> notes</span> 
			<span class=" badge badge-info"><!--<?php echo $row_follower_count['fcount']?>--> followers</span>
			<a href="set_filters.php"><span class="badge badge-inverse">filters</span></a>
		</div>
		<div class="span4 " style="padding-left:8px;" >
		    <form accept-charset="UTF-8" action="user.php" id="post-note" method="POST">
		    	<!-- hidden type for location-->
		    	<!-- <input type="hidden" value="" name="lat" id="lat"/>
		    	<input type="hidden" value="" name="lon" id="lon"/> -->

		        <textarea class="span4" id="new_message" name="note"
		        placeholder="Type in your message" rows="4"></textarea>

		        <div class="clear-fix"></div>
		        <span class="clickid badge" name="range">location</span>
				<span class="clickid badge" name="tag">tag</span>
				<span class="clickid badge" name="schedule">schedule</span>
				<span class="clickid badge" name="me">#me</span>
				<h6>200 characters remaining</h6>

				<div class="span3" style="margin:0">
				<!-- div#range-->
				<div id="range" style="display:none;">
					radius:	<input type="text" name="radius" class="input-medium" value="" maxlength="100" />
					<div id="mapCanvas"></div>
					<div id="infoPanel">
					    
					    <div id="info"></div>
					    <div id="markerStatus"><i>Click and drag the marker.</i></div>
					    <label for="latitude">latitude:</label>
					   <input id="lat" type="text" name="lat" value="" maxlength="100" />
					   <label for="longitude">longitude:</label>
					   <input id="lng" type="text" name="lng" value="" maxlength="100" />
					    <b>Closest matching address:</b>
					    <input id="address" type="text" name="address" value="" maxlength="100" ><br/>
					 </div>
				</div>

				<!-- div#tag-->
				<div id="tag" style="display:none;">
					tag : <input type="text" name="tag_name" class="input-small" value="" maxlength="100" />
					<span class="clickid btn btn-inverse mb10" name="tag2">Add</span>
				</div>

				<!-- div#tag2-->
				<div id="tag2" style="display:none;">
					tag : <input type="text" name="tag_name2" class="input-small" value="" maxlength="100" />
					<span class="clickid btn btn-inverse mb10"  name="tag3">Add</span>
				</div>

				<!-- div#tag3-->
				<div id="tag3" class="clickid" style="display:none;">
					tag : <input type="text" name="tag_name3" class="input-small" value="" maxlength="100" />
				</div>

				<!-- div#schedule -->
				<div id="schedule" class="clickid" style="display:none;">
					Time from :
					<div id="datetimepicker1" class="input-append">
						<input data-format="hh:mm:ss" type="text" class="input-small" name="timefrom" value="" placeholder="00:00:00" maxlength="100">
						<span class="add-on">
							<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-time"></i>
					    </span>
			  		</div>
			  		<br/>

			  		Time to :&nbsp;&nbsp;&nbsp;&nbsp;
			  		<div id="datetimepicker2" class="input-append">
						<input data-format="hh:mm:ss" type="text" class="input-small" name="timeto" value="" placeholder="00:00:00" maxlength="100">
						<span class="add-on">
							<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-time"></i>
					    </span>
			  		</div>

			  		Date from :
			  		<div id="datefrompicker1" class="input-append">
			  			<input data-format="yyyy-MM-dd" name="datefrom" class="input-small" value="" type="text"></input>
				  		<span class="add-on">
					      <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
					    </span>
					</div>

					Date to :&nbsp;&nbsp;&nbsp;&nbsp;
			  		<div id="datetopicker1" class="input-append">
			  			<input data-format="yyyy-MM-dd" name="dateto" class="input-small" value="" type="text"></input>
				  		<span class="add-on">
					      <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
					    </span>
					</div>

			  		<label for="repeatday">Repeat:</label>
					<select name="repeatday">
					  <option value ="Any">Any</option>  <!--any refer to null in the database-->
					  <option value ="Monday">Monday</option>
					  <option value ="Tuesday">Tuesday</option>
					  <option value ="Wednesday">Wednesday</option>
					  <option value ="Thursday">Thursday</option>
					  <option value ="Friday">Friday</option>
					  <option value ="Saturday">Saturday</option>
					  <option value ="Sunday">Sunday</option>
					</select>
				</div><!-- end div#schedule -->
				 </div><!-- end div.span3-->
			  <button class="btn btn-success" type="submit">Post Note</button>
		    </form>

		</div>
	</div>
</div>





<?php





$query = "SELECT notetext, Utime FROM USER,NOTE WHERE USER.uid=NOTE.uid and email='".$email."'";

$result = $mysqli->query($query);


while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>


<!--Notes-->
<div class="container">
<div class="span10 well ">
	<div class="row">
		<div class="span1 left"><a href="#" class="thumbnail"><img src="../include/img/users/user.jpg" alt=""></a></div>
		<div class="span5" >
			<p><a href="#"><strong>Hi</strong><?php echo ' '.$email; ?></a></p>
		    <span class="pull-right"><small><?php echo time_ago(strtotime($row['Utime']));?></small></span>
		</div>
		
			<p><?php echo $row['notetext'];?></p>
		


	</div>
	<!--row -->
</div>
<!-- span 3 well-->
</div>
</div>
<!--container-->



	
<?php  } ?>



<?php require_once('footer.php'); ?>