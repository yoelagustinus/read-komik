<?php
	$connect = mysqli_connect("localhost", "root", "", "db_komik");
    if (mysqli_connect_errno()) {
        echo "Failed to connect MySQL : " . mysqli_connect_error();
    }
	
	$db_name = "db_komik";
	$title = $_POST['mangaName'];
	$author = $_POST['author'];
	$tags = implode(', ', $_POST['checked']);
	$getDate = $_POST['new_date_komik'];
	$rating = 0;
	$banyakRating = 0;
	
	//COVER
	if ($_FILES["mangaCover"]["error"] > 0){
		echo "Error code: " . $_FILES["mangaCover"]["error"] . "<br>";
	} else {
		$pathCover = "../db_komik/cover/" . $_FILES["mangaCover"]["name"];
		
		if (file_exists("cover/" . $_FILES["mangaCover"]["name"])){
			echo $_FILES["mangaCover"]["name"] . " already exists. <br>";
		} else {
			move_uploaded_file($_FILES["mangaCover"]["tmp_name"], $pathCover);
		}
	}
	
	//SYNOPSIS
	$pathSynopsis = "../db_komik/synopsis/$title.txt";
	$file = fopen($pathSynopsis, 'w');
	$getSynopsis = $_POST['sinopsis'];
	
	$write = fwrite($file, "$getSynopsis");
	
	fclose($file);
	
	//INSERT DATA
	$insert = "INSERT INTO komik (title, author, tags, rating, banyakRating, synopsis, thumbnail, date) 
	VALUES ('$title', '$author', '$tags', $rating, $banyakRating, '$pathSynopsis', '$pathCover', '$getDate');";
	
	if (mysqli_query($connect, $insert)){
		echo "'$title' successfully inserted to $db_name. <br>";
	} else {
		echo "Failed.";
	}
	
	echo '<a href="formAddManga.php">Back to form.</a>';
	
	mysqli_close($connect);
?>