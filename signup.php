<?php
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'cic');
    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else {
    $name = $_POST['name'];
    $license = $_POST['license'];
    $password = $_POST['password'];
    $regd_no = $_POST['regd_no'];
    $model_id = $_POST['model_id'];
    $year = $_POST['year'];
    $s = "select * from person where license = '$license'";
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        echo "Hello IF";
        header('Location: ./signup-fail.html');
    }
    else {
        if (!empty($name) && !empty($license) && !empty($password)) {
            $sql1 = "INSERT INTO person(license, password, name) values('$license', '$password', '$name')";
            mysqli_query($con, $sql1);
        }
            if (!empty($regd_no) && !empty($model_id) && !empty($year)) {
            $sql2 = "INSERT INTO car (regd_no, license, model_id, year) values('$regd_no', '$license', '$model_id', '$year')";
            mysqli_query($con, $sql2);
            }
        header('Location: ./signup-success.html');
    }
}
?>