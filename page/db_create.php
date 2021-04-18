<?php
	//CREATE DATABASE
	$connect = mysqli_connect("localhost", "root", "");
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL" . mysqli_connect_error();
	}
	
	$name = "db_komik";
	$db = "CREATE DATABASE $name";
	
	if (mysqli_query($connect, $db)){
		echo "Database '$name' has been created. <br>";
	} else {
		echo "Error creating database: " . mysqli_error($connect) . "<br>";
	}
	
	mysqli_close($connect);
	
	//CREATE TABLE KOMIK
	$connect2 = mysqli_connect("localhost", "root", "", "db_komik");
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$name = "komik";
	$table = "CREATE TABLE $name (
		id INT NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id), 
		title Char(50), 
		author Char(50), 
		tags Char(30), 
		rating INT, 
		banyakRating INT, 
		synopsis Text, 
		thumbnail Text,
		date DATE
	);";
	
	if (mysqli_query($connect2, $table)){
		echo "Table '$name' is successfully created." . "<br>";
	} else {
		echo "Error creating table: " . mysqli_error($connect2) . "<br>";
	}
	
	mysqli_close($connect2);
	
	//CREATE TABLE GENRE (TAGS)
	$connect3 = mysqli_connect("localhost", "root", "", "db_komik");
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL" . mysqli_connect_error();
	}
	
	$name = "tags";
	$table = "CREATE TABLE $name (
		id INT NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id), 
		genre Char(50)
	);";
	
	if (mysqli_query($connect3, $table)){
		echo "Table '$name' is successfully created. <br>";
	} else {
		echo "Error creating table: " . mysqli_error($connect3) . "<br><br>";
	}
	
	$arr_genre = array (
	'Action', 'Adventure', 'Game', 'Comedy', 'Demons', 
	'Mystery', 'Fantasy', 'Historical', 'Horror', 'Romance', 
	'School', 'Martial Arts', 'Shoujo', 'Shounen', 'Space', 
	'Sports', 'Super Power', 'Slice of Life', 'Military', 'Thriller', 
	'Ecchi');
	
	for ($i = 0; $i < count($arr_genre); $i++){
		$insert = "INSERT INTO tags (genre) VALUES ('$arr_genre[$i]');";
		
		if (mysqli_query($connect3, $insert)){
			echo "Genre $arr_genre[$i] has been auto-generated into '$name'" . "<br>";
		} else {
			echo "Failed to generate.";
		}
	}
	echo "<br>";
	
	mysqli_close($connect3);
	
	//CREATE COMMENT TABLE
	$connect4 = mysqli_connect("localhost", "root", "", "db_komik");
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL" . mysqli_connect_error();
	}
	
	$name = "comment";
	$table = "CREATE TABLE $name (
		id_comment INT NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id_comment), 
		id_user INT, 
		id_manga INT, 
		comment TEXT, 
		date_submitted DATE
	);";
	
	if (mysqli_query($connect4, $table)){
		echo "Table '$name' is successfully created. <br>";
	} else {
		echo "Error creating table: " . mysqli_error($connect4) . "<br><br>";
	}
	
	mysqli_close($connect4);
	
	//CREATE UPDATE TABLE
	$connect5 = mysqli_connect("localhost", "root", "", "db_komik");
	
	if(mysqli_connect_errno()){
		echo "Failed to onnect to MySQL" . mysqli_connect_error();
	}
	
	$name = "update_chapter";
	$table = "CREATE TABLE $name (
		id INT NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY (id), 
		nomor_chp VARCHAR(50), 
		judul_chp Char(50), 
		link TEXT, 
		uploaded_time DATE, 
		manga_id INT
	);";
	
	if (mysqli_query($connect5, $table)){
		echo "Table '$name' is successfully created. <br>";
	} else {
		echo "Error creating table: " . mysqli_error($connect5) . "<br><br>";
	}
	
	mysqli_close($connect5);
	
	echo "<a href='index.php'>Go to home page</a>";
?>