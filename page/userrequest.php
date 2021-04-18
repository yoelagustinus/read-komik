<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "db_komik");
    $sql = "SELECT * FROM data_user WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $username = $_POST['new_username'];
    $pass = md5($_POST['new_pass'],true);
    $nick = $_POST['new_nickname'];
    $text_profile = $_POST['new_text_profile'];
    
    $file_path_profile = $username.$date."profil.txt";
    $file_profile = fopen($file_path_profile, "w");
    fwrite($file_profile, $text_profile);
    fclose($file_profile);
    
    if ($_FILES["new_photo"]["error"] > 0) {
        $file_path_photo = "../img/default_user_img.png";
    } else {
        $file_path_photo = "../db_komik/userprofilepic/" . $_FILES["new_photo"]["name"];

        if (file_exists("../db_komik/userprofilepic/" . $_FILES["new_photo"]["name"])) {
            echo $_FILES["new_photo"]["name"] . " already exists. <br>";
        } else {
            move_uploaded_file($_FILES["new_photo"]["tmp_name"], $file_path_photo);
        }
    }

    $sql = "UPDATE data_user set username = '$username' and password = '$pass' and nickname = '$nick' and text_profile = '$file_path_profile' and profile_pic = '$file_path_photo' WHERE username = '".$_SESSION['username']."'";
    mysqli_query($con, $sql);
    
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $pass;
    $_SESSION['tipe'] = $row[7];
    $_SESSION['nickname'] = $nick;
    $birth = explode("-", $row[4]);
    $_SESSION['umur'] = 2019 - $birth[0];
    $_SESSION['login'] = true;
    
    header("location: userprofile.php?username=$username");
    
    mysqli_close($con);
?>