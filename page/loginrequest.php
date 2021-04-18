<?php
    session_start();
    $username = $_POST['user'];
    $pass = md5($_POST['pass'],true);
    
    $con = mysqli_connect("localhost", "root", "", "db_komik");
    
    $sql = "SELECT * FROM data_user";
    $result = mysqli_query($con, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        if ($row[1] == $username && $row[2] == $pass) {
            $_SESSION['id_user'] = $row[0];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $pass;
            $_SESSION['tipe'] = $row[8];
            $_SESSION['nickname'] = $row[3];
            $birth = explode("-", $row[4]);
            $_SESSION['umur'] = date("Y") - $birth[0];
            $_SESSION['login'] = true;
            break;
        }
    }
    
    if ($_SESSION['login'] == false) {
        setcookie('login', 'false', time()+5);
        header('location:login.php');
    }else{
        header('location:index.php');
    }
    
    mysqli_close($con);
?>