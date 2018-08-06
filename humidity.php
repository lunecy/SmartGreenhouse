<?php include('humidityserver.php'); ?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Concordia Greenhouse | Humidity</title> 
	<link rel="stylesheet" type="text/css" href="graph.css"> 
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
		<li class="current"><a href="#">Graphs</a> 
			<ul> 
				<li class="nocurrent"><a href="temp.php">Temperature</a></li> 
				<li><a href="humidity.php">Humidity</a></li> 
				<li class="nocurrent"><a href="soil.php">Soil Moisture</a></li> 
				<li class="nocurrent"><a href="carbon.php">Carbon Dioxide</a></li> 
				
			</ul>
		</li>
		<li><a href="setrange.php">SetYourRange</a><li>
		<li><a href="about.html">About</a><li> 
	</u1>
</nav>
</header>

<?php include('humiditylastinserted.php'); ?>

<!-- load the d3.js library -->
<script src="http://d3js.org/d3.v3.min.js"></script>

<script>

// Set the dimensions of the canvas / graph
var margin = {top: 30, right: 20, bottom: 50, left: 100},
    width = 1000 - margin.left - margin.right,
    height = 400 - margin.top - margin.bottom;

// Parse the date / time
var parseDate = d3.time.format("%Y-%m-%d %H:%M:%S").parse;

// Set the ranges
var x = d3.time.scale().range([0, width]);
var y = d3.scale.linear().range([height, 0]);

// Define the axes
var xAxis = d3.svg.axis().scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis().scale(y)
    .orient("left").ticks(10);

//Define the line
/*var valueline = d3.svg.line()
    .x(function(d) { return x(d.dtg); })
    .y(function(d) { return y(d.humidity); });*/

// Adds the svg canvas
var svg = d3.select("body")
    .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
    .append("g")
        .attr("transform",
              "translate(" + margin.left + "," + margin.top + ")");

// Get the data
<?php echo "data=".$json_data.";" ?>
data.forEach(function(d) {
	d.dtg = parseDate(d.dtg);
	d.humidity = +d.humidity;
});

// Scale the range of the data
x.domain(d3.extent(data, function(d) { return d.dtg; }));
y.domain([0, d3.max(data, function(d) { return d.humidity; })]);

// Add the valueline path.
/*svg.append("path")
	.attr("d", valueline(data));*/


// Add the X Axis
svg.append("g")
	.attr("class", "x axis")
	.attr("transform", "translate(0," + height + ")")
	.call(xAxis);

svg.append("text")      
	.attr("transform", 
	      "translate(" + (width) + " ," + (height + margin.top + 15) + ")")
	.style("fill", "#276d29")
	.style("text-anchor", "end")
	.text("Date&time");

// Add the Y Axis
svg.append("g")
	.attr("class", "y axis")
	.call(yAxis);

svg.append("text")      // Add the text label for the humidity axis
	.attr("transform", "rotate(-90)")
	.attr("x",0)
	.attr("y", -40)
	.style("fill", "#276d29")
	.style("text-anchor", "end")
	.text("Humidity Level(%)");


var color = d3.scale.category10();

svg.selectAll(".dot")
      .data(data)
    .enter().append("circle")
      .attr("class", "dot")
      .attr("r", 4.0)
      .attr("cx", function(d) { return x(d.dtg); })
      .attr("cy", function(d) { return y(d.humidity); })
      .style("fill","#276d29")      
/*.style("fill", function(d) { return color(d.species); });*/

</script>

<footer>
	<p>Concordia Smart Greenhouse, Copyright &copy;2018</p>
	</footer>

</body>
</html>

