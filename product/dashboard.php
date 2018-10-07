<!DOCTYPE html>
<html lang="en">
	<head>
		
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/style.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<style>
			* {
				margin: 0;
			}
			html, body {
				height: 100%;
			}
			.row1{
			    background-color: orange;
			}

			.row2{
			    background-color: blue;
			}
			.container-fluid {
				display: flex;
				flex-direction: column;
				height: 100%;
			}
			.row:last-child {
	  			flex: 1;
			}
		</style>
	</head>
	<body>
		<?php include "includes/page-top.inc.php"; ?>
		<div class="container-fluid">
			<div class="row" style="height: 100%;">
				<div class="col-md-6">
					<div class="row" style="height: 50%; background-color: red">
						<div class="col-md-12">
							Timetable
						</div>
					</div>
					<div class="row" style="height: 50%; background-color: green">
						<div class="col-md-12">
							<input class="daterangepicker-field" id="daterangepicker-field" />
							<script type="text/javascript">
								$("#daterangepicker-field").datepicker({
								    format: 'mm/dd/yyyy',
    								startDate: '-3d'
								})
							
							</script>
						</div>
					</div>
				</div>
				<div class="col-md-6" style="background-color: black">
					Todolist
				</div>	
			</div>
		</div>

	</body>
</html>