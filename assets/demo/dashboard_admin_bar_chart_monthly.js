//-------------
//- BAR CHART -
//-------------

var areaChartData = {
	labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
	datasets: [{
			label: 'Electronics',
			fillColor: 'rgba(60,141,188,0.9)',
			strokeColor: 'rgba(60,141,188,0.8)',
			pointColor: '#3b8bba',
			pointStrokeColor: '#c1c7d1',
			pointHighlightFill: '#fff',
			pointHighlightStroke: 'rgba(220,220,220,1)',
			data: [65, 59, 80, 81, 56, 55, 40, 32, 59, 34, 90, 10],
		},
  ],
}

var barChartCanvas = $('#barChart').get(0).getContext('2d')
var barChart = new Chart(barChartCanvas)
var barChartData = areaChartData
var barChartOptions = {
  scaleFontFamily: "'Kanit'",
	pointLabelFontFamily: "'Kanit'",
  // titleFontFamily = "'Kanit'",
	//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
	scaleBeginAtZero: true,
	//Boolean - Whether grid lines are shown across the chart
	scaleShowGridLines: true,
	//String - Colour of the grid lines
	scaleGridLineColor: 'rgba(0,0,0,.05)',
	//Number - Width of the grid lines
	scaleGridLineWidth: 1,
	//Boolean - Whether to show horizontal lines (except X axis)
	scaleShowHorizontalLines: true,
	//Boolean - Whether to show vertical lines (except Y axis)
	scaleShowVerticalLines: true,
	//Boolean - If there is a stroke on each bar
	barShowStroke: true,
	//Number - Pixel width of the bar stroke
	barStrokeWidth: 2,
	//Number - Spacing between each of the X value sets
	barValueSpacing: 5,
	//Number - Spacing between data sets within X values
	barDatasetSpacing: 1,
	//String - A legend template
	legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
	//Boolean - whether to make the chart responsive
	tooltipTemplate: '<%=label%> <%=value %> ครั้ง',
	responsive: true,
  maintainAspectRatio: true,
}

barChartOptions.datasetFill = false
barChart.Bar(barChartData, barChartOptions);
