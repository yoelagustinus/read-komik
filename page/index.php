<!DOCTYPE html>

<html>

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="../style/css/home.css">
    <script src="../style/js/main.js"></script>
    <script src="../style/js/home.js"></script>
</head>

<body onload="plusDivs(0)" style="height: 1800px;">
    <?php
    $con = mysqli_connect("localhost", "root", "", "db_komik");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to database : " . mysqli_connect_error();
    }
    ?>

    <div class="nav" id="nav">
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

    <div class="big_container">
        <div id="slide_show">
            <div class="button prev" onClick="plusDivs(-1)">&#10094;</div>
            <div class="button next" onClick="plusDivs(1)">&#10095;</div>

            <?php
            $select_slide_manga = mysqli_query($con, "SELECT * FROM komik ORDER BY rating DESC");
            $counter_slide = 0;

            while ($counter_slide < 10 && $get_slide = mysqli_fetch_array($select_slide_manga)) {
                echo "<div id=\"slide_img\" class=\"img_container\" style=\"background-image: url(" . $get_slide[7] . ");\">";
                echo "<div class=\"text_container\">";
                echo "<a href=\"manga.php?ComicName=$get_slide[1]\">$get_slide[1]</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

        <div id="left_side" class="main">
            <div class="top"><b>RECENTLY UPDATED MANGA</b></div>

            <div class="manga-container">
                <?php
                    $select_recently_updated_manga = mysqli_query($con, "SELECT DISTINCT manga_id FROM update_chapter ORDER BY id DESC");
                    $counter_updated = 0;

                    while ($counter_updated < 20 && $get_updated_id = mysqli_fetch_array($select_recently_updated_manga)) {
                        $select_recent_manga = mysqli_query($con, "SELECT * FROM komik WHERE id = $get_updated_id[0]");
                        $get_recent_manga = mysqli_fetch_array($select_recent_manga);
                        $select_update = mysqli_query($con, "SELECT * FROM update_chapter WHERE manga_id = $get_updated_id[0] ORDER BY id DESC");
                        $counter_chapter = 0;

                        echo "<div class=\"manga\">";
                        echo "<div class=\"manga_img\"><a href=\"manga.php?ComicName=$get_recent_manga[1]\"><img src=\"$get_recent_manga[7]\"></a></div>";
                        echo "<div class=\"manga_desc\">";
                        echo "<a href=\"manga.php?ComicName=$get_recent_manga[1]\"> <b>$get_recent_manga[1]</b> </a>";
                        echo "<table border=\"0\">";
                        while ($counter_chapter < 3 && $get_update = mysqli_fetch_array($select_update)) {
                            echo "<tr>";
                            echo "<td><a href=\"$get_update[3]\">$get_update[1]</a></td>";
                            echo "<td>$get_update[4]</td>";
                            echo "</tr>";
                            $counter_chapter += 1;
                        }
                        echo "</table>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>

                <a class="more" href="advance_search.php?type=latest">
                    <div>More</div>
                </a>

            </div>
        </div>

        <div id="right_side" class="main">
            <div class="notice">
                <h3>TOP MANGA</h3>

                <ol>
                    <?php
                    $select_top_manga = mysqli_query($con, "SELECT * FROM komik ORDER BY rating DESC");
                    $counter_top = 0;

                    while ($counter_top < 10 && $get_top_manga = mysqli_fetch_array($select_top_manga)) {
                        echo "<a href=\"manga.php?ComicName=$get_top_manga[1]\">";
                        echo "<li>$get_top_manga[1]</li>";
                        echo "</a>";
                        $counter_top += 1;
                    }
                    ?>
                </ol>
            </div>

            <div class="notice">
                <h3>NEWEST MANGA RELEASES</h3>

                <?php
                $select_newest_manga = mysqli_query($con, "SELECT * FROM komik ORDER BY id DESC");
                $counter_newest = 0;

                while ($counter_newest < 10 && $get_newest_manga = mysqli_fetch_array($select_newest_manga)) {
                    echo "<a href=\"manga.php?ComicName=$get_newest_manga[1]\">";
                    echo "<div class=\"img_lastest\" style=\"background-image: url($get_newest_manga[7]);\"></div>";
                    echo "</a>";
                    $counter_newest += 1;
                }
                ?>

                <a class="more" href="advance_search.php?type=newest">
                    <div>More</div>
                </a>
            </div>

            <div class="notice">
                <h3>CATEGORIES</h3>

                <table border="0">
                    <tr>
                        <td><a href="advance_search.php?type=latest">Latest</a></td>
                        <td><a href="advance_search.php?type=newest">Newest</a></td>
                        <td><a href="advance_search.php?type=top">Top View</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?category=01">Action</a></td>
                        <td><a href="advance_search.php?category=02">Adventure</a></td>
                        <td><a href="advance_search.php?category=03">Game</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?category=04">Comedy</a></td>
                        <td><a href="advance_search.php?category=05">Demons</a></td>
                        <td><a href="advance_search.php?category=06">Mystery</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?category=07">Fantasy</a></td>
                        <td><a href="advance_search.php?category=08">Historical</a></td>
                        <td><a href="advance_search.php?category=09">Horror</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?category=10">Romance</a></td>
                        <td><a href="advance_search.php?category=11">School</a></td>
                        <td><a href="advance_search.php?category=12">Matrial Arts</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?category=13">Shoujo</a></td>
                        <td><a href="advance_search.php?category=14">Shounen</a></td>
                        <td><a href="advance_search.php?category=15">Space</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?category=16">Sports</a></td>
                        <td><a href="advance_search.php?category=17">Super-Power</a></td>
                        <td><a href="advance_search.php?category=18">Slice Of Life</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?category=19">Military</a></td>
                        <td><a href="advance_search.php?category=20">Thriller</a></td>
                        <?php
                        if (isset($_SESSION['umur']) && $_SESSION['umur'] >= 18) {
                            echo "<td><a href=\"advance_search.php?category=21\">Ecchi</a></td>";
                        } else {
                            echo "<td></td>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
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