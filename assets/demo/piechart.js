// -------------
// - PIE CHART -
// -------------
function myPieChart(data, render) {
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
			responsive: true
		}
	};
	new Chart(ctx, config);
}

// -----------------
// - END PIE CHART -
// -----------------
