<?php
require_once('header.php');


require_once('time_ago.php');

$query = "SELECT notetext, Utime FROM USER,NOTE WHERE USER.uid=NOTE.uid and email='".$email."'";

$result = $mysqli->query($query);

require_once('clickgeo.php');
?>
</div>
<?php


while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>



<div class="container">
<!--Notes-->
<div class="span10 well" >
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
<!-- span 10 well-->
</div>
<!--container-->



	
<?php  } ?>



<?php require_once('footer.php'); ?>