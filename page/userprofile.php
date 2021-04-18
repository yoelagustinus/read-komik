<!DOCTYPE html>

<html>

<head>
    <title><?php echo $_GET['username'];?> - Profile</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="../style/css/user_profile.css">
    <script src="../style/js/main.js"></script>
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

		<?PHP
            $con = mysqli_connect("localhost", "root", "", "db_komik");
            $sql = "SELECT * FROM data_user WHERE username = '" . $_GET['username'] . "'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
        ?>
        
        <form enctype="multipart/form-data" method="post" action="editrequest.php">
            <table border="0">
                <tr> 
                    <td rowspan="7" valign="top"> 
                        <div class="user_photo">
                            <img src="<?php echo $row[5]; ?>">
                            <?php
                                if (isset($_SESSION['username']) && $_SESSION['username'] == $row[1]) {
                                    echo "<div class=\"change_photo\">";
                                    echo "Change profile picture: <br>";
                                    echo "<input name=\"old_photo\" type=\"hidden\" value=\"$row[5]\">";
                                    echo "<input name=\"new_photo\" type=\"file\">";
                                    echo "</div>";
                                }
                            ?>
                        </div> 
                    </td> 
                    <td></td>
                </tr>
                <tr> <th>Username</th> <td> : <input name="new_username" type="text" value="<?PHP echo $row[1]?>" readonly="readonly"></td></tr>
                <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] == $row[1]) {
                        echo "<tr> <th>Nickname</th> <td> : <input name=\"new_nickname\" type=\"text\" value=\"$row[3]\"></td></tr>";
                        echo "<tr> <th>New Password</th> <td> : <input name=\"new_pass\" type=\"password\" value=\"$row[2]\"></td></tr>";
                    } else {
                        echo "<tr> <th>Nickname</th> <td> : <input name=\"new_nickname\" type=\"text\" value=\"$row[3]\" readonly=\"readonly\"></td></tr>";
                        echo "<tr> <th>New Password</th> <td> : <input name=\"new_pass\" type=\"password\" value=\"$row[2]\" readonly=\"readonly\"></td></tr>";
                    }
                
                ?>
                <tr> <th>Birthday</th> <td> : <?PHP echo $row[4]; ?></td></tr>
                <tr> <th>Profile</th> <td>
                    <?php
                        if (isset($_SESSION['username']) && $_SESSION['username'] == $row[1]) {
                            echo "<textarea class=\"profile_textarea\" name=\"new_text_profile\">";
                        } else {
                            echo "<textarea class=\"profile_textarea\" name=\"new_text_profile\" readonly=\"readonly\">";
                        }

                        $file = fopen($row[6], 'r');
                        while ($line = fgets($file)) {
                            echo "$line";
                        }
                        echo "</textarea>";
                    ?>
                    </td>
                </tr>
                <tr> <th>Manga Preference</th> <td>
                    <div class="checkbox_container">
                        <ul>
                            <?PHP
                                $tag = explode("|", $row[7]);

                                $sql2 = "SELECT * FROM tags";
                                $query = mysqli_query($con, $sql2);
                                
                                while($row2 = mysqli_fetch_array($query)){
                                    $kondisi = "false";
                                    for($i = 0; $i < count($tag); $i++){
                                        if($tag[$i] == "0$row2[0]"){
                                            $kondisi = "true";
                                        }
                                    }
                                    
                                    if (isset($_SESSION['username']) && $_SESSION['username'] == $row[1]) {
                                        if ($kondisi == "true") {
                                            if($row2[0] < 10){
                                                echo "<li><input id='chk$row2[0]' type='checkbox' name='tag[]' value='0$row2[0]' checked><label for='chk$row2[0]'>$row2[1]</label></li>";
                                            }else{
                                                echo "<li><input id='chk$row2[0]' type='checkbox' name='tag[]' value='0$row2[0]' checked><label for='chk$row2[0]'>$row2[1]</label></li>";
                                            }
                                        }else{
                                            if($row[0] < 10){
                                                echo "<li><input id='chk$row2[0]' type='checkbox' name='tag[]' value='0$row2[0]'><label for='chk$row2[0]'>$row2[1]</label></li>";
                                            }else{
                                                echo "<li><input id='chk$row2[0]' type='checkbox' name='tag[]' value='0$row2[0]'><label for='chk$row2[0]'>$row2[1]</label></li>";
                                            }
                                        }
                                    } else {
                                        if ($kondisi == "true") {
                                            if($row2[0] < 10){
                                                echo "<li><input id='chk$row2[0]' type='checkbox' name='tag[]' value='0$row2[0]' checked onclick=\"return false\"><label for='chk$row2[0]'>$row2[1]</label></li>";
                                            }else{
                                                echo "<li><input id='chk$row2[0]' type='checkbox' name='tag[]' value='0$row2[0]' checked onclick=\"return false\"><label for='chk$row2[0]'>$row2[1]</label></li>";
                                            }
                                        }
                                    }
                                }
                            ?>
                        </ul>
                    </div> </td>
                </tr>
            </table>

            <?php
                if(isset($_SESSION['login']) && $_GET['username'] == $_SESSION['username']) {
                    echo "<input type=\"submit\" value=\"Save Change\">";
                }
            ?>
        </form>
	<?PHP
		mysqli_close($con);
	?>
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