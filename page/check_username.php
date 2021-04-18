<?php
    $connect = mysqli_connect("localhost", "root", "", "db_komik");
    if (mysqli_connect_errno()) {
        echo "Failed to connect MySQL : " . mysqli_connect_error();
    }

    if (isset($_POST['str'])) {
        $query = mysqli_query($connect, "SELECT COUNT(*) FROM data_user WHERE username = '" . $_POST['str'] . "'");
        $check = mysqli_fetch_array($query);

        if ($check[0] == 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    mysqli_close($connect);
?>