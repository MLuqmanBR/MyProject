<?php
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'cic');
    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else {
    $report_number = $_POST['report_number'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $regd_no = $_SESSION['regd_no'];
    $license = $_SESSION['license'];
    if (!empty($report_number) && !empty($location) && !empty($date)) {
        $sql = "insert into accident(report_number, regd_no, date, location) values('$report_number', '$regd_no', '$date', '$location')";
        mysqli_query($con, $sql);
        $query = "SELECT * FROM accident WHERE report_number='$report_number' && location='$location'";
        $data = mysqli_query($con, $query);
        $num = mysqli_num_rows($data);
        if ($num == 1) {
            $query = "update person set report_number = '$report_number' where license = '$license'";
            mysqli_query($con, $query);
            header('Location: ./claim-success.html');
        }
        else {
            header('location: ./claim-fail.html');
        }
    }
}
?>