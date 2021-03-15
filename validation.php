<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'cic');
    $license = $_POST['license'];
    $password = $_POST['password'];
    $s = " select * from person where license = '$license' && password = '$password'";
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);
    if($num == 1) {
        $_SESSION['license'] = $license;
        header('location: ./profile.php');
    }
    else {
        header('location: ./index.html');
    }
?>