// -------------
// - PIE CHART -
// -------------
function myPieChart(data, render) {
  var maxValue = Math.max.apply(null, data.data);
	var ctx = $(render).get(0).getContext('2d');
	var config = {
		type: 'pie',
		data: {
			datasets: [{
				data: data.data,
				backgroundColor: data.backgroundColor,
				label: 'Dataset 1'
			}],
			labels: data.labels
    },
    
		options: {
      responsive: true,
      // scales: {
			// 	yAxes: [{
			// 		ticks: {
			// 			max: maxValue,
			// 			min: 0,
			// 			stepSize: 10
			// 		}
			// 	}]
			// },
		}
	};
	new Chart(ctx, config);
}

// -----------------
// - END PIE CHART -
// -----------------
