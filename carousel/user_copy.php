<?php
require_once('header.php');
require_once('time_ago.php');


if ($_POST) {
//store notes
$lat= $_POST['lat'];
$lng= $_POST['lng'];
$note=$_POST['note'];
$email2=$_POST['email'];
//echo $email2;

$starttime = $_POST['timefrom_name'];
echo $starttime;

//if($note){

$query = "SELECT uid FROM USER WHERE  email='".$email2."'";
$uid = $mysqli->query($query);
$row=$uid->fetch_array(MYSQLI_BOTH);
//echo $row['uid'];

	


$query2= "INSERT INTO NOTE (uid,notetext,x,y,x1,y1)
VALUES ('$row[uid]','$_POST[note]','$_POST[lat]','$_POST[lng]','40','50')";

$mysqli->query($query2);


}


?>




<!--
<div class="container ">
-->
	<?php require_once('clickgeo.php');?>
 <style>
  #mapCanvas {
    width: 66%;
    height: 312px;
    float: left;
  }
  #mask {
	display: none;
	background: #000; 
	position: fixed; left: 0; top: 0; 
	z-index: 10;
	width: 100%; height: 100%;
	opacity: 0.3;
	z-index: 999;
}

.login-popup{
	display:none;
	background: #333;
	padding: 10px; 	
	border: 2px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	overflow: scroll;
	top: 75%; left: 43%;
	z-index: 99999;
	box-shadow: 0px 0px 20px #999;
	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
	border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}
img.btn_close {
	float: right; 
	margin: -10px -10px 0 0;
}



.button { 
	background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
	background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
	background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
	border-color:#000; 
	border-width:1px;
	border-radius:4px 4px 4px 4px;
	-moz-border-radius: 4px;
    -webkit-border-radius: 4px;
	color:#333;
	cursor:pointer;
	display:inline-block;
	padding:0px;
	margin-top:10px;
	font:12px; 
	width:80px;
	height: 30px;
	float: right;
}

.input-append input{
	border-radius: 4px 4px 4px 4px;
}
  </style>
  <script type="text/javascript">
$(document).ready(function() {
	$('a.filters-window').click(function() {
		
		// Getting the variable's value from a link 
		var filters = $(this).attr('href');

		//Fade in the Popup and add close button
		$(filters).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(filters).height() + 150)/2 ;
		var popMargLeft = ($(filters).width() - 400)/2 ;


		$(filters).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').click(function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});


$(document).ready( function() {
  var form = $('#schedule');
  form.find(':input').change( function() {
    $.ajax( {
      type: "POST",
      url: form.attr( 'action' ),
      data: form.serialize(),
      success: function( msg ) {
        alert( "okay");
      }
    } );
  } );

} );

  </script>



<!--post notes-->
<div style="float:left;margin-left:10px;width=200px" >
<div class="span5 well " >
	<div class="row">
		<div class="span2 left" ><a href="#" class="thumbnail"><img src="../include/img/users/user.jpg" alt=""></a></div>
		<div class="span5 ">
			<p><a href="#">Hi<?php echo ' '.$email; ?></a></p>
          <!--	<p><strong><?php echo $firstname.' '.$lastname ?></strong></p>-->
		</div>
		<div class="span3 left">
			<span class=" badge badge-warning"><!--<?php echo $row3['ncount'] ;?>--> notes</span> 
			<span class=" badge badge-info"><!--<?php echo $row_follower_count['fcount']?>--> followers</span>
			
		</div >
		
		<div id="filters" class="login-popup">
		<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
		<form id="schedule" class="filter" action="user.php" method="post">
		<fieldset>
			<legend style="color:white;">when wants to be seen ?</legend>

			<div id="datetimepicker1" class="input-append">
			<label for="timefrom">start time:</label><br>
			<input data-format="hh:mm:ss" type="text" name="timefrom_name" value="" placeholder="00:00:00" maxlength="100" />
			<span class="add-on">
		      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
		    </span>
			  </div>

			<div id="datetimepicker2" class="input-append">
			<label for="timeto">end time:</label><br>
			<input data-format="hh:mm:ss" type="text" name="timeto_name" value="" placeholder="24:00:00" maxlength="100" />
		    <span class="add-on">
		      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
		      </i>
		    </span>
		     </div>

		     <label for="repeatday">Repeat:</label><br>
				<select name="repeatday" >
				  <option value ="Any" >Any</option>  <!--any refer to null in the database-->
				  <option value ="Monday">Monday</option>
				  <option value ="Tuesday">Tuesday</option>
				  <option value ="Wednesday">Wednesday</option>
				  <option value ="Thursday">Thursday</option>
				  <option value ="Friday">Friday</option>
				  <option value ="Saturday">Saturday</option>
				  <option value ="Sunday">Sunday</option>
				</select>
				
		

			<div>
              <input id="schedule-btn" class="button" type="submit" value="Done" />
           </div>

		</fieldset>
		</form>
		
		</div> 




		<div class="span4 " style="padding-left:8px;" >
		    <form accept-charset="UTF-8" action="user.php" id="post-note" method="POST">
		    	<!-- hidden type for location-->
		    	<!-- <input type="hidden" value="" name="lat" id="lat"/>
		    	<input type="hidden" value="" name="lon" id="lon"/> -->
		    	<input type="hidden" value=<?php echo $email; ?> name="email" />


		        <textarea class="span4" id="new_message" name="note"
		        placeholder="Type in your message" rows="4"></textarea>

		        <div class="clear-fix"></div>
		     
				<span class="clickid badge" name="tag">tag</span>
				<a href="#filters" class="filters-window"><span class="clickid badge" name="schedule">schedule</span>
			
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
</div>





<?php





$query = "SELECT notetext, Utime FROM USER,NOTE WHERE USER.uid=NOTE.uid and email='".$email."'";

$result = $mysqli->query($query);


while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>


<!--Notes-->
<div style="float:left">
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



	
<?php  } ?>

<!--container-->
</div>

<?php require_once('footer.php'); ?>