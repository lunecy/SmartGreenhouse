<div class= "lastins">
   <?php foreach($resultp as $rd): ?>
	<p>Temperature Range: <?php echo $rd['lrtemp'];?>°C to <?php echo $rd['hrtemp'];?>°C</p>
	<p>Humidity Range: <?php echo $rd['lrhumi'];?>% to <?php echo $rd['hrhumi'];?>%</p>
	<p>Soil Moisture Range: <?php echo $rd['lrsoil'];?>% to <?php echo $rd['hrsoil'];?>%</p>
	<?php endforeach ?>
</div>





