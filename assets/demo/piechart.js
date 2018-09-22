// -------------
	// - PIE CHART -
  // -------------
  function myPieChart(data, render) {
// Get context with jQuery - using jQuery's .get() method.
var randomScalingFactor = function() {
  return Math.round(Math.random() * 100);
};
var ctx = $(render).get(0).getContext('2d');
var config = {
  type: 'pie',
  data: {
    datasets: [{
      data:data.data,
      backgroundColor: data.backgroundColor,
      // label: 'Dataset 1'
    }],
    labels: data.labels
  },
  options: {
    responsive: true
  }
};
var PieData = data;
new Chart(ctx, config);
// var pieChart = new Chart(pieChartCanvas);

// var pieOptions = {
//   // Boolean - Whether we should show a stroke on each segment
//   segmentShowStroke: true,
//   // String - The colour of each segment stroke
//   segmentStrokeColor: '#fff',
//   // Number - The width of each segment stroke
//   segmentStrokeWidth: 1,
//   // Number - The percentage of the chart that we cut out of the middle
//   percentageInnerCutout: 50, // This is 0 for Pie charts
//   // Number - Amount of animation steps
//   animationSteps: 100,
//   // String - Animation easing effect
//   animationEasing: 'easeOutBounce',
//   // Boolean - Whether we animate the rotation of the Doughnut
//   animateRotate: true,
//   // Boolean - Whether we animate scaling the Doughnut from the centre
//   animateScale: false,
//   // Boolean - whether to make the chart responsive to window resizing
//   responsive: true,
//   // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
//   maintainAspectRatio: false,
//   // String - A legend template
//   // legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
//   // String - A tooltip template
//   tooltipTemplate: '<%=label%> <%=value %> ครั้ง'
// };
// // Create pie or douhnut chart
// // You can switch between pie and douhnut using the method below.
// pieChart.Doughnut(PieData, pieOptions);
  }
	
	// -----------------
	// - END PIE CHART -
	// -----------------