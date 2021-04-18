<?php
	session_start();
	$connect = mysqli_connect("localhost", "root", "", "db_komik");
	if (mysqli_connect_errno()) {
        echo "Failed to connect MySQL : " . mysqli_connect_error();
    }
	
	$id = $_GET['idKomik'];
	$rating = $_POST['manga_rating'];
	
	$select = mysqli_query($connect, "SELECT * FROM komik WHERE id = '$id'");
	$get = mysqli_fetch_array($select);
	
	$old_rating = $get[4];
	$banyakRating = $get[5];
	$new_rating = round((($old_rating * $banyakRating) + $rating) / ($banyakRating + 1), 1);
	$banyakRating = $banyakRating + 1;
	
	//UPDATE RATING
	$update = "UPDATE komik SET rating='$new_rating', banyakRating = '$banyakRating' WHERE id='$id'";
	
	if (mysqli_query($connect, $update)){
		echo "Rating updated. " . "<br>";
	} else {
		echo "Failed to record ratings: " . "<br>";
	}
	
	mysqli_close($connect);
	
	//COMMENT
	$connect2 = mysqli_connect("localhost", "root", "", "db_komik");
	if (mysqli_connect_errno()) {
        echo "Failed to connect MySQL : " . mysqli_connect_error();
    }
	
	$id = $_GET['idKomik'];
	$nama = $_GET['namaKomik'];
	$comment = $_POST['comment'];
	$date = date("Y-m-d");
	
	$selectUser = mysqli_query($connect2, "SELECT * FROM data_user WHERE username = '".$_SESSION['username']."'");
	$row = mysqli_fetch_array($selectUser);
	
	$insert = "INSERT INTO comment (id_user, id_manga, comment, date_submitted) VALUES ($row[0], '$id', '$comment', '$date');";
	
	if (mysqli_query($connect2, $insert)){
		echo "Comment inserted.";
	} else {
		echo "Failed to insert comment: ";
	}
	
	mysqli_close($connect2);
	
	header("location:manga.php?ComicName=$nama");
?>