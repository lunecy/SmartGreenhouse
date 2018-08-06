<display> 
<?php
   foreach($resultp as $rd){
	echo '<h2> Last Humidity of '; echo'<font color="#276d29">'; echo $rd['humidity']; echo'% </font>'; echo' recorded on '; echo'<font color="#276d29">'; echo $rd['dtg'];echo'</font></h2>';
	/*echo '<h2>Time: ';
	echo $rd['dtg'];
	echo '<br></br>';
	echo "humidity: ";
	echo $rd['humidity'];
	echo ' °C</center><h2>';*/
	
	if ($rd['humidity'] == NULL){
		echo '<h2><center><font color="red">Error in System</font></center></h2>';
	} else {
		echo"";
	}
      }	
?>
</display>
