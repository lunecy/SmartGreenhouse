<?php include('carbonserver.php'); ?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Concordia Greenhouse | Carbon Dioxide</title> 
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
				<li class="nocurrent"><a href="humidity.php">Humidity</a></li> 
				<li class="nocurrent"><a href="soil.php">Soil Moisture</a></li> 
				<li><a href="carbon.php">CO<sub>2</sub> </a></li> 
				
			</ul>
		</li>
		<li><a href="setrange.php">SetYourRange</a><li>
		<li><a href="about.html">About</a><li> 
	</u1>
</nav>
</header>

<?php include('carbonlastinserted.php'); ?>

<!-- load the d3.js library -->
<script src="http://d3js.org/d3.v3.min.js"></script>

<script>

var margin = {top: 30, right: 30, bottom: 50, left: 100},
    width = 1000 - margin.left - margin.right,
    height = 400 - margin.top - margin.bottom;

// Parse the date / time
var parseDate = d3.time.format("%Y-%m-%d %H:%M:%S").parse;

// specify the scale/range for each dimension
var x = d3.scale.ordinal().rangeRoundBands([0, width], .05);
var y = d3.scale.linear().range([height, 0]);


// axis formatting
var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom")
    .tickFormat(d3.time.format("%y-%d-%m"));

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .ticks(10);

// setup the svg area
var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", 
          "translate(" + margin.left + "," + margin.top + ")");

// Get the data
<?php echo "data=".$json_data.";" ?>

// wrangle the data into the correct formats and units
data.forEach(function(d) {
    d.date = parseDate(d.date);
    d.level = +d.level;
});
    
// Scale the range of the data
x.domain(data.map(function(d) { return d.date; }));
y.domain([0, d3.max(data, function(d) { return d.level; })]);


// Add the X Axis
svg.append("g")
    .attr("class", "x axis")
    .attr("transform", "translate(0," + height + ")")
    .call(xAxis)

/*svg.append("text")      
	.attr("transform", 
	      "translate(" + (width) + " ," + (height + margin.top + 15) + ")")
	.style("fill", "#276d29")
	.style("text-anchor", "end")
	.text("Day&Month");*/

  .selectAll("text")
    .attr("dx", "-.8em")
    .attr("dy", "-.35em")
    .style("text-anchor", "end")
    .attr("transform", "rotate(-90)" );

// Add the Y Axis and the Y axis label
svg.append("g")
    .attr("class", "y axis")
    .call(yAxis)
  .append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", -50)
    .attr("dy", ".71em")
    .style("fill","#276d29")
    .style("text-anchor", "end")
    .text("Carbon Dioxide Level (V)");

// Add the bars
svg.selectAll("bar")
    .data(data)
  .enter().append("rect")
    .style("fill", "#276d29")
    .attr("x", function(d) { return x(d.date); })
    .attr("width", x.rangeBand())
    .attr("y", function(d) { return y(d.level); })
    .attr("height", function(d) { return height - y(d.level); });
    
</script>
<footer> 
<p>Concordia Smart Greenhouse, Copyright &copy;2018</p>
</footer>

</body>

