<display>
<?php
   foreach($resultp as $rd){
	echo '<center><h2>Last Temperature of '; echo'<font color="#276d29">'; echo $rd['temperature']; echo'°C </font>'; echo' recorded on '; echo'<font color="#276d29">'; echo $rd['dtg'];echo'</font></h2></center>';
	/*echo '<h2>Time: ';
	echo $rd['dtg'];
	echo '<br></br>';
	echo "Temperature: ";
	echo $rd['temperature'];
	echo ' °C</center><h2>';*/
	
	if ($rd['temperature'] == NULL){
		echo '<h2><center><font color="red">Error in System</font></h2></center>';
	} else {
		echo"";
	}
      }	
?>
</display>
