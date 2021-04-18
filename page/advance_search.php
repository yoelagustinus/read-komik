<!DOCTYPE html>

<html>

<head>
    <title>Advance Search</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="../style/css/adv_src.css">
    <script src="../style/js/main.js"></script>
</head>

<body style="height: 1500px">
    <?php
        session_start();

        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        } else {
            $type = "all";
        }

        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        } else {
            $category = "all";
        }

        if (empty($_SESSION['umur']) || $_SESSION['umur'] < 18) {
            if ($category == 21) {
                $category = "all";
            }
        }

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $con = mysqli_connect("localhost", "root", "", "db_komik");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to database : " . mysqli_connect_error();
        }

        if ($category == "all") {
            if ($type == "top") {
                $select = "SELECT * FROM komik ORDER BY rating DESC";
                $count = "SELECT COUNT(*) FROM komik ORDER BY rating DESC";
            } else if ($type == "newest") {
                $select = "SELECT * FROM komik ORDER BY id DESC";
                $count = "SELECT COUNT(*) FROM komik ORDER BY id DESC";
            } else if ($type == "latest") {
                $select = "SELECT DISTINCT manga_id FROM update_chapter ORDER BY id DESC";
                $count = "SELECT COUNT(DISTINCT manga_id) FROM update_chapter ORDER BY id DESC";
            } else {
                $select = "SELECT * FROM komik";
                $count = "SELECT COUNT(*) FROM komik";
            }
        } else {
            if ($type == "top") {
                $select = "SELECT * FROM komik WHERE tags like '%$category%' ORDER BY rating DESC";
                $count = "SELECT COUNT(*) FROM komik WHERE tags like '%$category%' ORDER BY rating DESC";
            } else if ($type == "newest") {
                $select = "SELECT * FROM komik WHERE tags like '%$category%' ORDER BY id DESC";
                $count = "SELECT COUNT(*) FROM komik WHERE tags like '%$category%' ORDER BY id DESC";
            } else if ($type == "latest") {
                $select = "SELECT DISTINCT manga_id FROM update_chapter ORDER BY id DESC";
                $count = "SELECT COUNT(DISTINCT manga_id) FROM update_chapter ORDER BY id DESC";
            } else {
                $select = "SELECT * FROM komik WHERE tags like '%$category%'";
                $count = "SELECT COUNT(*) FROM komik WHERE tags like '%$category%'";
            }
        }

        $select_query = mysqli_query($con, $select);
        $count_query = mysqli_query($con, $count);
        $fetch_count = mysqli_fetch_array($count_query);
        $banyak_manga = $fetch_count[0];
    ?>

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
        <div id="left_side" class="main">
            <div class="top"><?php echo "Manga >> Category: $category >> $type"; ?></div>

            <div class="manga-container">
                <?php
                    $max_manga = 12;
                    $banyak_page = round(($banyak_manga / $max_manga) + 0.49);
                    $counter_manga = ($page - 1) * $max_manga;

                    for ($i = 0; $i < $counter_manga; $i++) {
                        $manga = mysqli_fetch_array($select_query);
                    }

                    $counter = 0;

                    if ($type == "latest") {
                        while ($counter < $max_manga && $no_manga = mysqli_fetch_array($select_query)) {
                            if ($category == "all") {
                                $select_manga = mysqli_query($con, "SELECT * FROM komik WHERE id = '$no_manga[0]'");
                            } else {
                                $select_manga = mysqli_query($con, "SELECT * FROM komik WHERE id = '$no_manga[0]' AND tags like '%$category%'");
                            }

                            if ($manga = mysqli_fetch_array($select_manga)) {
                                echo "<div class=\"manga\">";
                                    echo "<a href=\"manga.php?ComicName=$manga[1]\"> <div class=\"manga_img\"><img src=\"$manga[7]\"></div> </a>";
                                    echo "<div class=\"manga_desc\">";
                                        echo "<a href=\"manga.php?ComicName=$manga[1]\"> <b>$manga[1]</b> </a>";
                                        echo "<div class=\"sipnosis\">";
                                            $sipnosis = fopen($manga[6], 'r');
                                            while ($line = fgets($sipnosis)) {
                                                echo $line;
                                            }
                                            fclose($sipnosis);
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
        
                                $counter += 1;
                            }
                        }
                    } else {
                        while ($counter < $max_manga && $manga = mysqli_fetch_array($select_query)) {
                            echo "<div class=\"manga\">";
                                 echo "<a href=\"manga.php?ComicName=$manga[1]\"> <div class=\"manga_img\"><img src=\"$manga[7]\"></div> </a>";
                                 echo "<div class=\"manga_desc\">";
                                     echo "<a href=\"manga.php?ComicName=$manga[1]\"> <b>$manga[1]</b> </a>";
                                     echo "<div class=\"sipnosis\">";
                                        $sipnosis = fopen($manga[6], 'r');
                                        while ($line = fgets($sipnosis)) {
                                            echo $line;
                                        }
                                        fclose($sipnosis);
                                    echo "</div>";
                                 echo "</div>";
                            echo "</div>";
    
                            $counter += 1;
                        }
                    }
                ?>
            </div>

            <div class="pagination_container">
                <?php
                    if ($banyak_page > 1) {
                        for ($i = 1; $i <= $banyak_page; $i++) {
                            if ($i != $page) {
                                echo "<a class=\"pagination\" href=\"advance_search.php?type=$type&category=$category&page=$i\">$i</a>";
                            }
                        }
                    }
                ?>
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
                        <td><a href="advance_search.php?type=latest&category=<?php echo "$category";?>">Latest</a></td>
                        <td><a href="advance_search.php?type=newest&category=<?php echo "$category";?>">Newest</a></td>
                        <td><a href="advance_search.php?type=top&category=<?php echo "$category";?>">Top View</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=01">Action</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=02">Adventure</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=03">Game</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=04">Comedy</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=05">Demons</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=06">Mystery</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=07">Fantasy</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=08">Historical</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=09">Horror</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=10">Romance</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=11">School</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=12">Matrial Arts</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=13">Shoujo</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=14">Shounen</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=15">Space</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=16">Sports</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=17">Super-Power</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=18">Slice Of Life</a></td>
                    </tr>
                    <tr>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=19">Military</a></td>
                        <td><a href="advance_search.php?type=<?php echo "$type";?>&category=20">Thriller</a></td>
                        <?php
                        if (isset($_SESSION['umur']) && $_SESSION['umur'] >= 18) {
                            echo "<td><a href=\"advance_search.php?type=\"$type\"&category=21\">Ecchi</a></td>";
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