
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width = device-width, initial-scale= 1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">-->
	<title>Data Driven Documents</title>
	<!--<script src="js/jquery-3.2.1.min.js"></script>-->
	<script src="js/d3.v4.min.js"></script>
</head>
<body>
	<h1>Normal Range Bar</h1>
	<P>CHANGE COLOR</P>
	<ul class="items">
		<li>iPhone</li>
		<li>Galaxy</li>
		<li>Life's Good</li>
		<li>One Care</li>
	</ul>

	
	<script>
		//d3.selectAll('.items li').style('color':'green', 'font-size': '20px');
		var styleData = [
			{
				'background': 'blue',
				'color': 'white',
				'width': '10'
			},
			{
				'background': 'blue',
				'color': 'white',
				'width': '20'
			},
			{
				'background': 'blue',
				'color': 'white',
				'width': '30'
			},
			{
				'background': 'blue',
				'color': 'white',
				'width': '40'
			},
		];
		console.log(styleData);
		d3.selectAll('li')
			.data(styleData)
			.style({
				'font-size':'18px',
				'padding':'6px',
				'margin':'4px',
				'list-style':'none',
				'background': function(d){
					//console.log(d.background);
					return d.background;
				},
				'color': function(d){
					//console.log(d.color);
					return d.color;
				},
				'width': function(d){
					//console.log(d.width);
					return d.width+'%';
				}
			});
	</script>
</body>
</html>