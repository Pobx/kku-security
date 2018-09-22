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
  
	var maxValue = Math.max.apply(null, data.data);
	var ctx = $(render).get(0).getContext('2d');
	new Chart(ctx, {
		type: data.type,
		data: areaChartData,
		options: {
			scales: {
				yAxes: [{
					ticks: {
						max: maxValue,
						min: 0,
						stepSize: 10
					}
				}]
			},
			elements: {
				rectangle: {
					borderWidth: 1,
				}
			},
			responsive: true,
			legend: {
				display: false,
				position: 'bottom',
			},
			title: {
				display: true,
				text: ''
			},
			tooltips: {
				// enabled: false
				callbacks: {
					label: function (tooltipItem) {
            console.log(tooltipItem)
            var point = 0;
            if (Number.isInteger(tooltipItem.yLabel)) {
              point = tooltipItem.yLabel;
            }else {
              point = tooltipItem.xLabel;
            }
						return point + " ครั้ง";
					}
				}
			}
		}
	});

}
