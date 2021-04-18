<!DOCTYPE html>

<html>

<head>
    <title>Add Chapter</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="../style/css/AddChapter.css">
    <script src="../style/js/main.js"></script>
</head>

<body style="height: 800px;">
    <?php
		$connect = mysqli_connect("localhost", "root", "", "db_komik");
		if (mysqli_connect_errno()) {
			echo "Failed to connect MySQL : " . mysqli_connect_error();
        }
        
		$select = mysqli_query($connect, "SELECT * FROM komik");
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
        
    <div class="container">
        <div id="update_manga">
            
            <form id="form_update_manga" method="post" action="throwbackUpdate.php">
                <h2> Update Manga</h2>

                <table>
                    <tr>
                        <td>Judul Manga </td>
                        <td> : 
                            <?php
                                echo "<select name=\"id_manga\" required=\"required\">";
                                while ($rows = mysqli_fetch_array($select)) {
                                    echo "<option value=\"$rows[0]\">$rows[1]</option>";
                                }
                                echo "</select>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Volume Chapter </td>
                        <td> : <input type="number" name="volume"> </td>
                    </tr>
                    <tr>
                        <td>Nomor Chapter </td>
                        <td> : <input type="number" step="0.5" name="chapter" required="required"> </td>
                    </tr>
					<tr>
                        <td>Judul Chapter </td>
                        <td> : <input type="text" name="nama_chapter"></td>
                    </tr>
					<tr>
						<td>Link Chapter</td>
						<td> : <input type="text" name="link"  required="required"> </td>
					</tr>
                </table>

                <input type="submit" value="Submit">
            
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