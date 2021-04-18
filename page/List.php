<!DOCTYPE html>

<html>

<head>
    <title>Manga List</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="../style/css/list.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="height: 2500px;">
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

    <div class="big_container">
        
        <div id="left_side" class="main">
            <div class="top">Manga List</div>
            
            <div class="listManga"> |   
                <a href="#A">A</a> |
                <a href="#B">B</a> |
                <a href="#C">C</a> |
                <a href="#D">D</a> |
                <a href="#E">E</a> |
                <a href="#F">F</a> |
                <a href="#G">G</a> |
                <a href="#H">H</a> |
                <a href="#I">I</a> |
                <a href="#J">J</a> |
                <a href="#K">K</a> |
                <a href="#L">L</a> |
                <a href="#M">M</a> |
                <a href="#N">N</a> |
                <a href="#O">O</a> |
                <a href="#P">P</a> |
                <a href="#Q">Q</a> |
                <a href="#R">R</a> |
                <a href="#S">S</a> |
                <a href="#T">T</a> |
                <a href="#U">U</a> |
                <a href="#V">V</a> |
                <a href="#W">W</a> |
                <a href="#X">X</a> |
                <a href="#Y">Y</a> |
                <a href="#Z">Z</a> |
            </div>

            <div class="ListNya">
                <h3 id="A">A</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'a%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="B">B</h3>
                <?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'b%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="C">C</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'c%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>Clannad</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="D">D</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'd%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>Death Note</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="E">E</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'e%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="F">F</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'f%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="G">G</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'g%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="H">H</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'h%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="I">I</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'i%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="J">J</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'j%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="K">K</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'k%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="L">L</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'l%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="M">M</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'm%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="N">N</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'n%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="O">O</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'o%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="P">P</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'p%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="Q">Q</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'q%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="R">R</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'r%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="S">S</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 's%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="T">T</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 't%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="U">U</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'u%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="V">V</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'v%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="W">W</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'w%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="X">X</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'x%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="Y">Y</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'y%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
            <div class="ListNya">
                <h3 id="Z">Z</h3>
				<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
					$select = mysqli_query($connect, "SELECT * FROM komik WHERE title LIKE 'z%'");
					while($name = mysqli_fetch_array($select)){
						echo "<a href='manga.php?ComicName=$name[1]&'>$name[1]</a> <br>";
					}
					
					mysqli_close($connect);
				?>
            </div>
        </div>

        <div id="right_side" class="main">
            <div class="notice">
                <h3>TOP MANGA</h3>

                <ol>
					<?php
					$connect = mysqli_connect("localhost", "root", "", "db_komik");
					if (mysqli_connect_errno()) {
						echo "Failed to connect MySQL : " . mysqli_connect_error();
					}
					
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