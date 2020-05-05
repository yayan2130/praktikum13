<?php
include('koneksi.php');
$data = mysqli_query($koneksi,"select * from negara");
while($row = mysqli_fetch_array($data)){
	$nama_negara[] = $row['negara'];
	
	$query = mysqli_query($koneksi,"select * from data_covid where id_negara='".$row['id_negara']."'");
	$row = $query->fetch_array();
	$jumlah_covid[] = $row['jumlah'];
	$newcase[] = $row['newcase'];
	$totaldeath[] = $row['totaldeath'];
	$newdeath[] = $row['newdeath'];
	$recovered[] = $row['recovered'];
	$active[] = $row['active'];
	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
		.warning {color: #FF0000;}
		.container {
			padding-top: 25px;
		}
				
	</style>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<div style="width:100%; height:100%">
	<canvas id="myChart"></canvas>
</div>

	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{ 
        			data: <?php echo json_encode($jumlah_covid); ?>,
					label: 'Total Cases',
        			borderColor: 'rgba(255, 99, 132, 1)',
					fill: false
				},{
					data: <?php echo json_encode($newcase); ?>,
					label: 'New Cases',
        			borderColor: 'rgba(54, 162, 235, 1)',
					fill: false
				},{
					data: <?php echo json_encode($totaldeath); ?>,
					label: 'Total Death',
        			borderColor: 'rgba(255, 206, 86, 1)',
					fill: false
				},{
					data: <?php echo json_encode($newdeath); ?>,
					label: 'New Death',
        			borderColor: 'rgba(127, 255, 212, 1)',
					fill: false
				},{
					data: <?php echo json_encode($recovered); ?>,
					label: 'Total Recovered',
        			borderColor: 'rgba(0, 191, 255, 1)',
					fill: false
				},{
					data: <?php echo json_encode($active); ?>,
					label: 'Active Cases',
        			borderColor: 'rgba(112, 128, 144, 1)',
					fill: false
				}
			]
			},
			options: {
    title: {
      display: true,
      text: 'Covid-19 in the World per-region'
    }
  }
});
	</script>
</body>
</html>