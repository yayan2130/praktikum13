<?php
include('koneksi.php');
$data = mysqli_query($koneksi,"select * from negara");
while($row = mysqli_fetch_array($data)){
	$nama_negara[] = $row['negara'];
	
	$query = mysqli_query($koneksi,"select sum(jumlah) as jumlah from data_covid where id_negara='".$row['id_negara']."'");
	$row = $query->fetch_array();
	$jumlah_covid[] = $row['jumlah'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_covid); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)', //1
					'rgba(54, 162, 235, 0.2)', //2
					'rgba(255, 206, 86, 0.2)', //3
					'rgba(75, 192, 192, 0.2)', //4
					'rgba(26, 255, 26, 0.2)',  //5
					'rgba(77, 77, 255, 0.2)',  //6
					'rgba(255, 153, 153, 0.2)',//7
					'rgba(0, 255, 204, 0.2)',  //8
					'rgba(204, 0, 204, 0.2)',  //9
					'rgba(204, 0, 102, 0.2)'  //10

					],
					borderColor: [
					'rgba(255, 99, 132, 1)', //1
					'rgba(54, 162, 235, 1)', //2
					'rgba(255, 206, 86, 1)', //3
					'rgba(75, 192, 192, 1)', //4
					'rgba(26, 255, 26, 1)',  //5
					'rgba(77, 77, 255, 1)',  //6
					'rgba(255, 153, 153, 1)',//7
					'rgba(0, 255, 204, 1)',  //8
					'rgba(204, 0, 204, 1)',  //9
					'rgba(204, 0, 102, 1)'  //10
					],
					label: 'Presentase covid di suatu negara'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>