<?php include('rangeserver.php'); ?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Concordia Greenhouse | Parameters' Ranges</title> 
	<link rel="stylesheet" type="text/css" href="setrange.css"> 
</head> 
<body>
<header> 
<nav>
	<p>#BeSmart&Green</p>
	<ul> 
		<li><a href="index.html">Home</a>
			<ul>
				<li><a href="controls.html">Auto&Manual</a><li> 	
			</ul>	
		</li>

		<li><a href="#">Graphs</a> 
			<ul> 
				<li class="nocurrent"><a href="temp.php">Temperature</a></li> 
				<li class="nocurrent"><a href="humidity.php">Humidity</a></li> 
				<li class="nocurrent"><a href="soil.php">Soil Moisture</a></li> 
				<li class="nocurrent"><a href="carbon.php">Carbon Dioxide</a></li> 
				
			</ul>
		</li>
		<li class="current"><a href="setrange.php">SetYourRange</a><li>
		<li><a href="about.html">About</a><li> 
	</u1>
</nav>
</header>

<section id="textbox">
<div class="rhead">
	<h1>Set Your Ranges</h1>	
</div>
<form action="setrange.php" method="post">
<?php include('rangelastinserted.php'); ?>
<?php include('errors.php'); ?>

<div class="input-group">
	<input type="text" name="lrtemp" placeholder="Low Temperature" value="<?php echo $lrtemp; ?>">
	<font color="#101a0a">to</font> <input type="text" name="hrtemp" placeholder="High Temperature" value="<?php echo $hrtemp; ?>">
</div>

<div class="input-group">
	<input type="text" name="lrhumi" placeholder="Low Humidity" value="<?php echo $lrhumi; ?>">
	<font color="#101a0a">to</font> <input type="text" name="hrhumi" placeholder="High Humidty" value="<?php echo $lrhumi; ?>">	
</div>

<div class="input-group">
	<input type="text" name="lrsoil" placeholder="Low Soil Moisture" value="<?php echo $lrsoil; ?>">
	<font color="#101a0a">to</font> <input type="text" name="hrsoil" placeholder="High Soil Moisture" value="<?php echo $lrsoil; ?>">	
</div>

<div class="input-group">
	<button type="submit" class="button_1" name="insert">ENTER</button>
</div>

</form>
</section>

<footer> 
<p>Concordia Smart Greenhouse, Copyright &copy;2018</p>
</footer>

</body>
</html>
