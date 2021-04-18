<!DOCTYPE html>

<html>

<head>
    <title><?php echo $_GET['ComicName'];?> - Manga</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="../style/css/manga.css">
    <script src="../style/js/main.js"></script>
    <script src="../style/js/manga.js"></script>
</head>

<body style="height: 1500px;" onload="star_rating_out()">
    <?php
		$connect = mysqli_connect("localhost", "root", "", "db_komik");
		if (mysqli_connect_errno()) {
			echo "Failed to connect MySQL : " . mysqli_connect_error();
		}
		
		$mangaName = $_GET['ComicName'];
		
		$select = mysqli_query($connect, "SELECT * FROM komik WHERE title = '$mangaName'");
		$row = mysqli_fetch_array($select);
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

    <div class="big_container" style="height: 85%;"> 
        <div id="left_side" class="main">
            <div class="manga">
				<?php
					echo "<img src='../db_komik/$row[7]'>";
				?>
                <div class="manga_desc">
					<?php
						echo "<span id='manga_title'>$row[1]</span> . " . "<br>" . "<br>" . 
						"<span class='icon fa fa-user'></span> " . "<span class='bold'>Author(s) : </span>$row[2]</br>";
					?>
                    <span class="icon fa fa-files-o"></span> <span class="bold">Genres : </span> 
					<?php 
						$tags = explode(", ", $row[3]);
						$size = count($tags);
						
						for ($i = 0; $i < $size; $i++){
							if ($tags[$i][0] == '0'){
								$tag = $tags[$i][1];
							} else {
								$tag = $tags[$i];
							}
							$getTags = mysqli_query($connect, "SELECT * FROM tags WHERE id = $tag");
							while ($print = mysqli_fetch_array($getTags)){
								echo "<a href=\"advance_search.php?type=top&category=$tags[$i]\">$print[1]</a>";
							}
							
							if ($i != $size - 1) {
								echo ", ";
							}
						}
					?> <br>
                    <span class="icon fa fa-calendar"></span> <span class="bold">First Published : </span> <?php echo "$row[8]"; ?> <br>
                    <span class="bold">Rating : </span>
					<?php
						$rating = $row[4];
						$rating_int = (int) $rating;
						for ($i = 1; $i <= $rating_int; $i++) {
							echo "<span class=\"fa fa-star checked\"></span>";
						}
						
						if ($rating - $rating_int != 0) {
							$rating_int += 1;
							echo "<span class=\"fa fa-star-half-o checked\"></span>";
						}
						
						for ($i = $rating_int; $i < 5; $i++) {
							echo "<span class=\"fa fa-star not-checked\"></span>";
						}
						
						echo " ($rating / 5)";
					?>
                </div>

                <div class="manga_sipnosis">
					<?php
						echo "<h4>Synopsis :</h4>";
						$get = fopen("$row[6]", "r");
						
						while($line = fgets($get)){
							echo $line;
						}
						
						fclose($get);
					?>
                </div>
            </div>

            <div class="manga_chapter">
                <table border="0">
                    <thead>
                        <tr> <th class="chapter">Chapters</th> <th class="time">Time Uploaded</th> </tr>
                    </thead>

                    <tbody id="chapter_list">
						<?php
						$selectChapter = mysqli_query($connect, "SELECT * FROM update_chapter WHERE manga_id = $row[0] ORDER BY id DESC");
							while ($lines_chp = mysqli_fetch_array($selectChapter)){
								if ($lines_chp[3] == false){
									echo "No chapters.";
								}
								echo "<tr> 
										<td class='chapter'><a href='$lines_chp[3]'>$lines_chp[1] - $lines_chp[2]</a></td>
										<td class='time'>$lines_chp[4]</td>
									</tr>";
							}
						?>
					</tbody>
                </table>
            </div>
			
            <div class="manga_comment">
                <div class='user_comment'>
                    <div class="comment">
                        <?php
                            $sudah_comment = false;
							$selectComment = mysqli_query($connect, "SELECT * FROM comment WHERE id_manga = '$row[0]'");
							while ($lines = mysqli_fetch_array($selectComment)){
								$selectUser = mysqli_query($connect, "SELECT * FROM data_user WHERE ID = '$lines[1]'");
								$rowuser = mysqli_fetch_array($selectUser);
								
								echo "<a href=\"userprofile.php?username=$rowuser[1]\"> <span class=\"user\"> <b>$rowuser[3]</b> </span> </a>";
								echo "<span class=\"date_comment\">$lines[4]</span>";
								echo "<p>$lines[3]</p>";
								
								if (isset($_SESSION['id_user']) && $lines[1] == $_SESSION['id_user']) {
									$sudah_comment = true;
								}
							}
						?>
                    </div>
                </div>
				
                <?php
                    if ($sudah_comment == false && isset($_SESSION['login'])) {
                        echo "<form method=\"post\" action=\"throwbackComment.php?idKomik=$row[0]&namaKomik=$row[1]\">";
                        echo "<span id=\"text\">Rate the manga: </span>";
                        echo "<input name=\"manga_rating\" id=\"rad1\" type=\"radio\" value=\"1\"> <label for=\"rad1\" class=\"fa fa-star rating\" onmouseover=\"star_rating_hover(0)\" onmouseout=\"star_rating_out()\"></label>";
                        echo "<input name=\"manga_rating\" id=\"rad2\" type=\"radio\" value=\"2\"> <label for=\"rad2\" class=\"fa fa-star rating\" onmouseover=\"star_rating_hover(1)\" onmouseout=\"star_rating_out()\"></label>";
                        echo "<input name=\"manga_rating\" id=\"rad3\" type=\"radio\" value=\"3\" checked> <label for=\"rad3\" class=\"fa fa-star rating\" onmouseover=\"star_rating_hover(2)\" onmouseout=\"star_rating_out()\"></label>";
                        echo "<input name=\"manga_rating\" id=\"rad4\" type=\"radio\" value=\"4\"> <label for=\"rad4\" class=\"fa fa-star rating\" onmouseover=\"star_rating_hover(3)\" onmouseout=\"star_rating_out()\"></label>";
                        echo "<input name=\"manga_rating\" id=\"rad5\" type=\"radio\" value=\"5\"> <label for=\"rad5\" class=\"fa fa-star rating\" onmouseover=\"star_rating_hover(4)\" onmouseout=\"star_rating_out()\"></label>";

                        echo "<textarea name=\"comment\" placeholder=\"Your comment here\"></textarea>";
                        echo "<input type=\"submit\" name=\"submitComment\" value=\"Submit\">";
                        echo "</form>";
                    }
                ?>
            </div>
        </div>

        <div id="right_side" class="main">
            <div class="notice">
                <h3>TOP MANGA</h3>

                <ol>
                    <?php
                    $select_top_manga = mysqli_query($connect, "SELECT * FROM komik ORDER BY rating DESC");
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
                $select_newest_manga = mysqli_query($connect, "SELECT * FROM komik ORDER BY id DESC");
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