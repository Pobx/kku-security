//-------------
//- BAR CHART -
//-------------
function myBarChart(data, render) {
	var areaChartData = {
		// labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
		labels: data.labels,
		datasets: [{
      label: data.dataset_label,
      backgroundColor: data.backgroundColor,
      data: data.data,
		}, ],
	}

	var ctx = $(render).get(0).getContext('2d');
	new Chart(ctx, {
		type: data.type,
		data: areaChartData,
		options: {
			elements: {
				rectangle: {
					borderWidth: 1,
				}
			},
			responsive: true,
			legend: {
				position: 'bottom',
			},
			title: {
				display: true,
				text: ''
			}
		}
	});

}
