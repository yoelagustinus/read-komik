<!DOCTYPE html>

<html>

<head>
    <title>Add Manga</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="../style/css/addManga.css">
    <script src="../style/js/main.js"></script>
</head>

<body style="height: 1200px;">
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
        <div id="input_newkomik">

            <form enctype="multipart/form-data" id="form_input_new_komik" method="post" action="throwbackAddManga.php">
                <h2>Input New Form Komik</h2>

                <table>
                    <tr>
                        <td>Judul Manga</td>
                        <td> : <input type="text" name="mangaName" value="" required="required" style="background-color: lightgoldenrodyellow; width: 50%;"></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td> : <input type="text" name="author" value="" required="required" style="background-color: lightgoldenrodyellow; width: 50%;"></td>
                    </tr>
                    <tr>
                        <td>Sinopsis Manga</td>
                        <td> : <textarea type="text" name="sinopsis" id="sin" value="" required="required" style="background-color: lightgoldenrodyellow"></textarea></td>
                    </tr>
                    <tr>
                        <td>Cover</td>
                        <td> : <input type="file" name="mangaCover" value="" required="required" style="background-color: lightgoldenrodyellow;"></td>
                    </tr>
                    <tr>
                        <td>Released Date</td>
                        <td> : <input type="date" name="new_date_komik" value="" required="required" style="background-color: lightgoldenrodyellow;"></td>
                    </tr>
                    <tr>
                        <td>Genre</td>
                        <td>
                            <div class="checkbox_container">
                                <ul>
                                <li><input id="chk1" name= "checked[]" type="checkbox" value="01"><label for="chk1">Action</label>
                                <li><input id="chk2" name= "checked[]" type="checkbox" value="02"><label for="chk2">Adventure</label>
                                <li><input id="chk3" name= "checked[]" type="checkbox" value="03"><label for="chk3">Game</label>
                                <li><input id="chk4" name= "checked[]" type="checkbox" value="04"><label for="chk4">Comedy</label>
                                <li><input id="chk5" name= "checked[]" type="checkbox" value="05"><label for="chk5">Demons</label>
                                <li><input id="chk6" name= "checked[]" type="checkbox" value="06"><label for="chk6">Mystery</label>
                                <li><input id="chk7" name= "checked[]" type="checkbox" value="07"><label for="chk7">Fantasy</label>
                                <li><input id="chk8" name= "checked[]" type="checkbox" value="08"><label for="chk8">Historical</label>
                                <li><input id="chk9" name= "checked[]" type="checkbox" value="09"><label for="chk9">Horror</label>
                                <li><input id="chk10" name= "checked[]" type="checkbox" value="10"><label for="chk10">Romance</label>
                                <li><input id="chk11" name= "checked[]" type="checkbox" value="11"><label for="chk11">School</label>
                                <li><input id="chk12" name= "checked[]" type="checkbox" value="12"><label for="chk12">Martial Arts</label>
                                <li><input id="chk13" name= "checked[]" type="checkbox" value="13"><label for="chk13">Shoujo</label>
                                <li><input id="chk14" name= "checked[]" type="checkbox" value="14"><label for="chk14">Shounen</label>
                                <li><input id="chk15" name= "checked[]" type="checkbox" value="15"><label for="chk15">Space</label>
                                <li><input id="chk16" name= "checked[]" type="checkbox" value="16"><label for="chk16">Sports</label>
                                <li><input id="chk17" name= "checked[]" type="checkbox" value="17"><label for="chk17">Super Power</label>
                                <li><input id="chk18" name= "checked[]" type="checkbox" value="18"><label for="chk18">Slice of Life</label>
                                <li><input id="chk19" name= "checked[]" type="checkbox" value="19"><label for="chk19">Military</label>
                                <li><input id="chk20" name= "checked[]" type="checkbox" value="20"><label for="chk20">Thriller</label>
                                <li><input id="chk21" name= "checked[]" type="checkbox" value="21"><label for="chk21">Ecchi</label>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="submit" value="Submit" style="width: 10%; background-color: lightgoldenrodyellow;">
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