<display>
<?php
foreach($resultp as $rd){
echo '<h2> Last Soil Moisture Level of '; echo'<font color="#276d29">'; echo $rd['moisture']; echo'% </font>'; echo' recorded on '; echo'<font color="#276d29">'; echo $rd['dtg'];echo'</font></h2>';
	/*echo '<h2>Time: ';
	echo $rd['dtg'];
	echo '<br></br>';
	echo "Temperature: ";
	echo $rd['temperature'];
	echo ' °C</center><h2>';*/
	
	if ($rd['moisture'] == NULL){
		echo '<h2><center><font color="red">Error in System</font></center></h2>';
	} else {
		echo"";
	}
      }	
?>
</display>
