// -------------
	// - PIE CHART -
  // -------------
  function pie_chart_summary_incidence(pie_chart_data) {
// Get context with jQuery - using jQuery's .get() method.
var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
var pieChart = new Chart(pieChartCanvas);
var PieData = [{
    value: pie_chart_data.count_accidents,
    color: '#dd4b39',
    highlight: '#dd4b39',
    label: 'สถิติอุบัติเหตุ'
  },
  {
    value: pie_chart_data.count_security_home,
    color: '#00a65a',
    highlight: '#00a65a',
    label: 'โครงการฝากบ้าน'
  },
  {
    value: pie_chart_data.count_vehicles_forget_key,
    color: '#00c0ef',
    highlight: '#00c0ef',
    label: 'สถิติการลืมกุญแจ'
  },
  {
    value: pie_chart_data.count_break_homes,
    color: '#f39c12',
    highlight: '#f39c12',
    label: 'สถิติเหตุทรัพย์งัดที่พักอาศัย'
  },
  {
    value: pie_chart_data.count_break_motorcycle_pad,
    color: '#ff851b',
    highlight: '#ff851b',
    label: 'สถิติงัดเบาะรถจักยานยนต์'
  },
  {
    value: pie_chart_data.count_student_do_not_wear_helmet,
    color: '#0073b7',
    highlight: '#0073b7',
    label: 'สถิติไม่สวมหมวกนิรภัย'
  }
];
var pieOptions = {
  // Boolean - Whether we should show a stroke on each segment
  segmentShowStroke: true,
  // String - The colour of each segment stroke
  segmentStrokeColor: '#fff',
  // Number - The width of each segment stroke
  segmentStrokeWidth: 1,
  // Number - The percentage of the chart that we cut out of the middle
  percentageInnerCutout: 50, // This is 0 for Pie charts
  // Number - Amount of animation steps
  animationSteps: 100,
  // String - Animation easing effect
  animationEasing: 'easeOutBounce',
  // Boolean - Whether we animate the rotation of the Doughnut
  animateRotate: true,
  // Boolean - Whether we animate scaling the Doughnut from the centre
  animateScale: false,
  // Boolean - whether to make the chart responsive to window resizing
  responsive: true,
  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
  maintainAspectRatio: false,
  // String - A legend template
  // legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
  // String - A tooltip template
  tooltipTemplate: '<%=label%> <%=value %> ครั้ง'
};
// Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
pieChart.Doughnut(PieData, pieOptions);
  }
	
	// -----------------
	// - END PIE CHART -
	// -----------------