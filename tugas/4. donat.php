<?php
include('koneksi.php');
	$query = mysqli_query($koneksi,"select sum(jumlah) as jumlah_covid, sum(newcase) as newcase, sum(totaldeath) as totaldeath, sum(newdeath) as newdeath, sum(recovered) as recovered, sum(active) as active from data_covid");
	$row = 	$query->fetch_array();
	$jumlah_covid[] = $row['jumlah_covid'];
	$newcase[] = $row['newcase'];
	$totaldeath[] = $row['totaldeath'];
	$newdeath[] = $row['newdeath'];
	$recovered[] = $row['recovered'];
	$active[] = $row['active'];
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
			type: 'doughnut',
			data: {
				labels: ['Total Cases','New Cases','Total Death', 'New Death', 'Total Recovered', 'Active Cases'],
				datasets: [{ 
					data: [<?php 
						echo json_encode($jumlah_covid); 
						echo ', '; 
						echo json_encode($newcase); 
						echo ', '; 
						echo json_encode($totaldeath);
						echo ', '; 
						echo json_encode($newdeath); 
						echo ', '; 
						echo json_encode($recovered);
						echo ', '; 
						echo json_encode($active);
						   ?>],
					label: 'Total Cases', 
        			backgroundColor:[ 
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(127, 255, 212, 1)',
						'rgba(0, 191, 255, 1)',
						'rgba(112, 128, 144, 1)'
					]
				}
			]
			},
			options: {
    title: {
      display: true,
      text: 'Total covid-19 di 10 negara'
    }
  }
});
	</script>
</body>
</html>