<?php
    $con = mysqli_connect("localhost", "root", "", "db_komik");
    if (mysqli_connect_errno()) {
        echo "Failed to connect MySQL : " . mysqli_connect_error();
    }

    if (isset($_POST['str'])) {
        $str = $_POST['str'];
        $str_len = strlen($str);

        if ($str_len < 3) {
            $select = mysqli_query($con, "SELECT * FROM komik WHERE title like '$str%'");
        } else {
            $select = mysqli_query($con, "SELECT * FROM komik WHERE title like '%$str%'");
        }

        $arr_manga = array();
        while ($row = mysqli_fetch_array($select)) {
            $arr_manga[] = $row[1];
        }

        foreach ($arr_manga as $manga) {
            echo "<option value='$manga'>";
        }
    }

    mysqli_close($con);
?>