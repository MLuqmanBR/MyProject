<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'cic');
    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else {
        $license = isset($_SESSION['license']) ? $_SESSION['license'] : '';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Car Insurance Company - Profile</title>
		<link rel="stylesheet" href="./profile.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<div class="heading">
			<div class="cname">Car&nbsp;Insurance&nbsp;Company</div>
			<div class="vvlink">
				<a href="./signout.php" class="link">Signout</a>
			</div>
		</div>
		<div class="wrapper">
			<form class="form" action="./claim.html">
            <div class="title">Personal Details</div>
            <?php
                $query = "SELECT * FROM person WHERE license='$license'";
                $data = mysqli_query($con, $query);
				while($row = mysqli_fetch_array($data)) {
					$name = $row['name'];
					$report_number = isset($row['report_number']) ? $row['report_number'] : 'NILL';
				}
            ?>
				<div class="input_field">
					<div class="label">Full&nbsp;Name:</div>
					<div class="details"><?php echo $name; ?></div>
				</div>
				<div class="input_field">
					<div class="label">License:</div>
					<div class="details"><?php echo "$license"; ?></div>
				</div>
                <div class="input_field">
					<div class="label">Report No.:</div>
					<div class="details"><?php echo $report_number; ?></div>
				</div>
				<div class="title">Car Details</div>
                <?php
                $query = "SELECT * FROM car WHERE license='$license'";
                $data = mysqli_query($con, $query);
				while($row = mysqli_fetch_array($data)) {
					$regd_no = $row['regd_no'];
					$model_id = $row['model_id'];
					$year = $row['year'];
				}
				$_SESSION['regd_no'] = $regd_no;
            ?>
				<div class="input_field">
					<div class="label">Regd.&nbsp;No.:</div>
					<div class="details"><?php echo $regd_no; ?></div>
				</div>
				<div class="input_field">
					<div class="label">Model:</div>
					<div class="details"><?php echo $model_id; ?></div>
				</div>
				<div class="input_field">
					<div class="label">Year:</div>
					<div class="details"><?php echo $year; ?></div>
				</div>
				<div class="input_field">
					<input
						type="submit"
						value="Claim Insurance"
						class="button"
					/>
				</div>
			</form>
		</div>
	</body>
</html>
