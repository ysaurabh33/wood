<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>check</title>
	<script src="js/d3.v4.min.js"></script>
</head>
<body>
	<h1>this is SVG</h1>
	<div id="element"></div>
	<script>
		d3.select('body')
			.append('svg')
				.attr('width', 400)
				.attr('height', 400)
				.style('background', '#f4f4f4')
			.append('rect')
				.attr('width', 300)
				.attr('height', 300)
				.attr('x', 50)
				.attr('y', 50)
				.style('fill', 'green')
				.style('stroke', 'black')
				.style('stroke-width', '1')
	</script>
</body>
</html>