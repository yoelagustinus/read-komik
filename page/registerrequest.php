<?php
    session_start();
    $username = strtolower($_POST['username']);
    $pass = md5($_POST['password'], true);
    $nick = $_POST['nickname'];
    $birthday = $_POST['birthday'];
    $text_profile = $_POST['text_profile'];
    
    $con = mysqli_connect("localhost", "root", "", "db_komik");
    $sql = "SELECT * FROM data_user WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    
    if ($_FILES["profile_pic"]["error"] > 0) {
        $profile_pic = "../img/default_user_img.png";
    } else {
        $profile_pic = "../db_komik/userprofilepic/" . $_FILES["profile_pic"]["name"];

        if (file_exists("../db_komik/userprofilepic/" . $_FILES["profile_pic"]["name"])) {
            echo $_FILES["profile_pic"]["name"] . " already exists. <br>";
        } else {
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic);
        }
    }

    if  ($row[1] == $username) {
        setcookie('username', 'true', time()+5);
        header('location: login.php');
    }else{
        if (isset($_POST['tag'])) {
            $temp = $_POST['tag'];
            $tag = implode("|" , $temp);
            $date = date ("d-m-y-h-i");
        
            $file_path_profile = "../db_komik/userprofile/".$username.$date."profil.txt";
            $file_profile = fopen($file_path_profile, "w");
            fwrite($file_profile, $text_profile);
            fclose($file_profile);
            
            $sql = "INSERT INTO data_user (username, password, nickname, tanggal_lahir, profile_pic, text_profile, tag_preference, tipe) VALUES ('$username', '$pass', '$nick', '$birthday', '$profile_pic', '$file_path_profile', '$tag', 'Member')";
            mysqli_query($con, $sql);
        }else{
            $temp = $_POST['tag'];
            $tag = "";
            $date = date ("d-m-y-h-i");
        
            $file_path_profile = "../db_komik/userprofile/".$username.$date."profil.txt";
            $file_profile = fopen($file_path_profile, "w");
            fwrite($file_profile, $text_profile);
            fclose($file_profile);
            
            $sql = "INSERT INTO data_user (username, password, nickname, tanggal_lahir, profile_pic, text_profile, tag_preference, tipe) VALUES ('$username', '$pass', '$nick', '$birthday', '$profile_pic', '$file_path_profile', '$tag', 'Member')";
            mysqli_query($con, $sql);
        }

        $select = mysqli_query($con, "SELECT * FROM data_user WHERE username = '$username'");
        $fetch_select = mysqli_fetch_array($select);

        $_SESSION['id_user'] = $fetch_select[0];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $pass;
        $_SESSION['nickname'] = $nick;
        $_SESSION['login'] = true;
        $_SESSION['tipe'] = "Member";
        $_SESSION['umur'] = date("Y") - $birthday[2];
        header('location:index.php');    
    }
    
    mysqli_close($con);
?>