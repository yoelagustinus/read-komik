<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="../style/css/login.css">
    <script src="../style/js/jquery-ui/jQuery.js"></script>
    <script src="../style/js/jquery-ui/jquery-ui.js"></script>
    <script src="../style/js/main.js"></script>
    <script src="../style/js/login.js"></script>
</head>

<body style="height: 1000px;">
    <div id="nav" class="nav">
        <ul>
            <a href="index.php">
                <li>Home</li>
            </a>
            <a href="List.php">
                <li>List Manga</li>
            </a>
            <a href="advance_search.php">
                <li style="font-size: 80%;">Advance Search</li>
            </a>
            <?php
                session_start();

                if (isset($_SESSION['login'])) {
                    echo "<a href=\"userprofile.php?username=" . $_SESSION['username'] . "\">";
                    echo "<li>Edit Profile</li>";
                    echo "</a>";
                    
                    if ($_SESSION['tipe'] == "Admin") {
                        echo "<a href=\"formAddManga.php\">";
                        echo "<li>Add Manga</li>";
                        echo "</a>";

                        echo "<a href=\"addchaptermanga.php\">";
                        echo "<li>Add Chapter</li>";
                        echo "</a>";
                    } else {
                        echo "<li></li>";
                        echo "<li></li>";
                    }
                } else {
                    echo "<li></li>";
                    echo "<li></li>";
                    echo "<li></li>";
                }
            ?>
            <li class="search">
                <form method="get" action="search.php">
                <input list="search_data" name="searching" type="text" placeholder="Search..." minlength="1" required="required" onkeyup="datalist(this.value)" autocomplete="off">
                    <datalist id="search_data"></datalist>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </li>
            <?php
                if (empty($_SESSION['login'])) {
                    echo "<a href=\"login.php\">";
                    echo "<li>Login</li>";
                    echo "</a>";
                } else {
                    echo "<a href=\"logout.php\">";
                    echo "<li>Logout</li>";
                    echo "</a>";
                }
            ?>
        </ul>
    </div>

    <div class="container">
        <!-- Tab Button -->
        <div class="tab">
            <button class="tab_button active" onclick="tabs(event, 'login')">Log In</button>
            <button class="tab_button" onclick="tabs(event, 'signup')">Sign Up</button>
        </div>

        <!-- Tab Content -->
        <div id="login" class="tab_content">
            <form id="login_form" method="post" action="loginrequest.php">
                <h2>Welcome Back</h2>

                <input type="text" name="user" placeholder="Username" required="required"> <br>
                <input type="password" name="pass" placeholder="Password" required="required"> <br>
                <input type="submit" value="Log in">
				
		        <?php
                    if (isset($_COOKIE['login'])) {
                        if($_COOKIE['login'] == 'false'){
                            echo "<br> <em style=\"color: #8b0000;\"> <span class=\"fa fa-times-circle\"></span> Username atau Password tidak ditemukan</em>";
                        }
                    }

                    if (isset($_COOKIE['username']) && $_COOKIE['username'] == "true") {
                        echo "<br> <em style=\"color: #8b0000;\"> <span class=\"fa fa-times-circle\"></span>Sign-Up gagal, Username sudah terpakai</em>";
                    }
                ?>
            </form>
        </div>
        
        <div id="signup" class="tab_content" style="display: none;">
            <form id="signup_form" name="sign_up_form" onsubmit="return validate_form()" method="post" action="registerrequest.php" enctype="multipart/form-data">
                <div id="first" class="signup_div">
                    <h2>Sign Up</h2>
                    
                    <input type="text" name="username" minlength="3" maxlength="20" placeholder="Username" required="required" onkeyup="check_username(this.value)"> <span id="req_username" style="color: #8b0000; display: none;">*</span>
                    <span id="checking" class="fa fa-spinner fa-pulse" style="display: none; color: black;"></span>
                    <em id="username_not_valid" style="color: #8b0000; display: none;"> <span class="fa fa-times-circle"></span>Username sudah terpakai</em>
                    <span id="username_valid" class="fa fa-check-circle" style="color: #026440; display: none;"></span>
                    <br>
                    <input type="password" name="password" maxlength="20" placeholder="Password" required="required"> <span id="req_password" style="color: #8b0000; display: none;">*</span> <br>
                    <input type="text" name="nickname" placeholder="Nickname" required="required"> <span id="req_nickname" style="color: #8b0000; display: none;">*</span> <br>
                    <input type="date" name="birthday" required="required"> <span id="req_birthday" style="color: #8b0000; display: none;">*</span> <br>
                    <button type="button" class="right_button" onclick="signup_page(1)">Next</button> <br>
                </div>

                <div id="second" class="signup_div">
                    <h2>Your Profile</h2>

                    <input type="file" name="profile_pic"> <br>
                    <textarea name="text_profile" placeholder="Tell about yourself..."></textarea> <br>
                    <button type="button" class="left_button" onclick="signup_page(0)">Prev</button>
                    <button type="button" class="right_button" onclick="signup_page(2)">Next</button> <br>
                </div>

                <div id="thrid" class="signup_div">
                    <h2>Last Step, Genre Preference</h2>

                    <div class="checkbox_container">
                        <ul>
                            <?PHP
                                $con = mysqli_connect("localhost", "root", "", "db_komik");
                                
                                $sql = "SELECT * FROM tags";
                                $result = mysqli_query($con, $sql);

                                while($row = mysqli_fetch_array($result)){
                                    if($row[1] != "Ecchi" && $row[0] < 10){
                                        echo "<li><input id='chk$row[0]' type='checkbox' name='tag[]' value='0$row[0]'><label for='chk$row[0]'>$row[1]</label>";
                                    }else if ($row[1] != "Ecchi"){
                                        echo "<li><input id='chk$row[0]' type='checkbox' name='tag[]' value='$row[0]'><label for='chk$row[0]'>$row[1]</label>";
                                    }
                                }

                                mysqli_close($con);
                            ?>
                        </ul>
                    </div>
                    <button type="button" class="left_button" onclick="signup_page(1)">Prev</button>
                    <input type="submit" class="right_button" value="Finish">
                </div>
            </form>
        </div>
    </div>

    <a href="#nav"><img class="logo" src="../img/logo.png"></a>
    
    <div class="footer">
        <div class="footer-kiri">
            <span class="fa fa-phone icon"> (022)2506636</span> 
            <span class="fa fa-map-marker icon"> Jl. Dipatu Ukur no.80-84, Lebagede, Coblong, Kota Bandung. Jawa Barat</span>
            <span class="fa fa-envelope icon"> mail.ithb.co.id</span>
        </div>

        <div class="footer-kanan">

            <p style="font-size: 15px;">About Web <br>
                This is the final assignment of Prog Website</p>
            <a href="https://www.instagram.com"><span class="fa fa-instagram icon"></span></a></tr>
            <a href="https://www.facebook.com/ithb.bandung/"><span class="fa fa-facebook icon"></span></a>
            <a href="https://twitter.com/"><span class="fa fa-twitter icon"></span></a>
        </div>
    </div>
</body>

</html>