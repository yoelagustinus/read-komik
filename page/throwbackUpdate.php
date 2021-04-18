<?php
	$connect = mysqli_connect("localhost", "root", "", "db_komik");
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//MANGA ID
	$id = $_POST['id_manga'];
	$select = mysqli_query($connect, "SELECT * FROM komik WHERE id = '$id'");
	$row = mysqli_fetch_array($select);
	
	$name = "$row[1]";
	
	//CHAPTER NUMBER
	$volume = $_POST['volume'];
	$chapter = $_POST['chapter'];
	$nomor_chp = "Vol.$volume Chapter $chapter";
	
	//CHAPTER NAME, LINK, DATE
	$chapter_name = $_POST['nama_chapter'];
	$link = $_POST['link'];
	$date = date('Y-m-d');
	
	$insert = "INSERT INTO update_chapter (nomor_chp, judul_chp, link, uploaded_time, manga_id) VALUES ('$nomor_chp', '$chapter_name', '$link', '$date', $id);";
	
	if (mysqli_query($connect, $insert)){
		echo "'$chapter_name' has been updated to '$name'. <br>";
	} else {
		echo "Error updating '$name': " . "<br>";
		echo "$id <br>";
		echo "$nomor_chp <br>";
		echo "$chapter_name <br>";
		echo "$link <br>";
		echo "$date <br>";
	}
	
	echo "<a href='addchaptermanga.php'>Back</a>";
?>