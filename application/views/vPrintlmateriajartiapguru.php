<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			
			@page { margin: 25px; }

			body{

				font-family: Helvetica;
				margin: 0px 10px;
			}

			table{		
				
				font-size: 11px;
				border-collapse:collapse;			
			}

			td, th{
			padding: 5px;
			}

			.border {
				border: 1px solid #080808;
			}

			.noborders td {
				border:0;
			}

			.main-title, .main-title-small{

				font-family: Times New Roman; 
				color: red;
				font-weight: bold;
				font-size: 32px;
			}

			.main-title-small{

				font-size: 24px;
			}

			.title-2{

				font-size: 16px;
				font-weight: bold;
			}

			.title-3{

				font-size: 12px;
				font-weight: bold;			
			}

			.tb-item td{

				padding: 2px;
			}

			.tb-item th{

				font-size: 12px;
			}

			/*cell border css*/
			.border-full{
				
				border-top: 1px solid black;
				border-right: 1px solid black;
				border-bottom: 1px solid black;
				border-left: 1px solid black;
			}

			.border-rl{
				
				border-right: 1px solid black;			
				border-left: 1px solid black;
			}

			.border-rbl{
				
				border-right: 1px solid black;
				border-bottom: 1px solid black;
				border-left: 1px solid black;
			}
			
			.grid-container {
			display: grid;
			grid-template-columns: auto auto auto;
			background-color: #FFFFFF;
			padding: 1px;
			}
			.grid-item {
			border: 1px solid rgba(0, 0, 0, 0.8);
			padding: 2px;
			font-size: 30px;
			text-align: left;
			}

		</style>
		<title>MATERI AJAR TIAP GURU TAHUN <?PHP echo $tahun_ajar?> SEMESTER <?php echo $semester?></title>
	</head>
	<?php 
		if (isset($materiajar)) {
			if ($materiajar==''){
				$data = "Tidak Ada Data";
			}else{
				$data =$materiajar;
			}
			echo $data;
		}
	?>

</html>