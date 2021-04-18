Maaf, Bu Kent kita mengedit html dan css menggunakan Chrome dan ada html dan css yang harus koneksi ke internet.
Jadi, kita tidak tau gimana html dan css di browser lain dan kita merekomendasi menggunakan Chrome untuk melihat hasil terbaik kami.

Login sebagai Admin:
1.	Username: admin
	Password: admin
2.	Username: helloworld
	Password: hellotoo

Database:
Nama database: db_komik
	1. Table comment
		Structure: id_commment (int A.I.), id_user (int), id_manga (int), comment (text), date_submitted (date) 
	2. Table data_user
		Structure: ID (int A.I.), username (varchar), password (varchar), nickname (varchar), tanggal_lahir (date), profile_pic (varchar), text_profile (varchar), tag_preference (varchar), tipe (varchar)
	3. Table komik
		Structure: id (int A.I.), title (char), author (char), tags (char), rating (float), banyakRating (int), synopsis (text), thumbnail (text), date (date)
	4. Table tags
		Structure: id (int A.I.), genre (char)
	5. Table update_chapter
		Structure: id (int A.I.), nomor_chp (varchar), judul_chp (char), link (text), uploaded_time (date), manga_id (int)

File text: Kita menggunakan file text untuk menyimpan data sipnosis manga dan profile user

Gambar: Kita menyimpan gambar ke suatu folder dan path ke gambar kita simpan di database

Ajax: 
-	Kita menggunakan ajax di search bar setiap kita mengetik akan ada saran nama manga yang dicari
-	Kita juga menggunakan ajax di validasi username saat registrasi, kalau sudah ada yang menggunakan username tersebut akan diberikan peringatan dan kalau belum ada tanda checklist

Session: Kita gunakan untuk menyimpan sudah login atau belum beserta username dan nickname dari user yang sudah login

Cookie: Kita gunakan saat login gagal ataupun saat sign up gagal, maka ada peringatan kenapa gagal

Link: Kita banyak menggunakan konsep link untuk menampilkan isi dari page manga, user profile dan advance search

Navigasi:
+ Home -> bisa diakses siapapun
+ List Manga -> bisa diakses siapapun
+ Advance Search -> bisa diakses siapapun
+ Edit Profile -> hanya bisa diakses oleh Member dan Admin
+ Add Manga -> hanya bisa diakses oleh Admin
+ Add Chapter -> hanya bisa diakses oleh Admin
+ Search (search bar) -> bisa diakses siapapun
+ Login/Sign Up -> bisa diakses siapapun
+ Logout -> hanya bisa diakses oleh yang sudah login

Page: 
+ 	Home
	Di home, kita tampilkan slide-show yang diisikan melalui database dimana manga yang ditampilkan adalah manga dengan rating tertinggi.
	Ada logo yang kalau diclick, akan membawa kita ke navigasi.
	Bagian kiri home, ditampilkan manga dari database dimana manga yang tampil adalah manga yang paling baru diupdate ini menggunakan dua table, yaitu table update_chapter dan table komik.
	Kita menampilkan cover manga, nama manga serta chapter terakhir yang diupdate serta waktu update. Kalau kita menclick gambar atau nama manga, kita akan dipindahkan ke halaman manga tersebut. Akan tetapi kalau kita menclick chapternya, kitaakan dipindahkan ke tempat dimana kita bisa membaca chapter tersebut.
	Bagian kiri ada beberapa link yang paling atas menunjukkan manga yang ratingnya tertinggi, yang tengah menunjukkan serial manga yang paling baru keluar(manga yang diadd terakhir) dan yang paling bawah
	adalah link category yang akan melink kita ke page advance search.

+	List Manga
	Di list manga, kita menampilkan list nama yang sudah diurutkan sesuai huruf depan nama manga. Kita mengisi page ini menggunakan database.
	Bagian kiri list manga sama memiliki fungsi yang sama dengan bagian kiri home.

+	Advance Search
	Di advance search, kita menampilkan manga dengan category dan diurutkan menurut type yang sudah dipilih oleh user. Kita mendapatkan data apa yang dimenta user melalui link dan mendapatkan data hasil dari database.
	Ada 21 category yang bisa dipilih dari Action sampai Ecchi, tetapi category Ecchi (R-18) tidak bisa diakses oleh user yang tidak login dan juga yang belum 18 tahun.
	Ada 3 type: latest, newest dan top. Dimana latest menampilkan manga menurut kapan terakhir kali chapter dari manga diupdate. 
	Kalau newest, menampilkan manga menurut urutan kapan manga itu diadd/ditambah, yang paling baru ditambah manganya akan ditampilkan pertama.
	Sedangkan top, menampilkan manga menurut besar rating secara dari besar dahulu baru ke kecil.
	Kita menampilkan cover manga, nama manga serta sipnosis dari manga. Dimana kita bisa menclick cover atau nama manga untuk pindah ke page manga tersebut.
	Di advance search ini kita menerapkan pagination, dimana kalau manga yang ditampilkan lebih dari 12, akan ada link ke page selanjutnya

+ 	Manga
	Di manga, kita menampilkan manga yang sudah diclick oleh user dari database. Kita mendapatkan nama manga yang sudah diclick oleh user melalui link. Kita menampilkan semua ini menggunakan lima table yang ada di satu databsae.
	Di page manga ini sendiri, kita menampilkan cover, judul, penulis, genre, tanggal pertama kali dipublish, rating, sipnosis, chapter dan linknya dan juga komen user atas manga tersebut.
	Data cover, judul, penulis, genre dalam bentuk id (untuk menampilkan nama genre kita koneksikan dengan table tags), tanggal pertama kali dipublish, rating dan sipnosis kita simpan di table komik. Data chapter, tanggal upload dan link kita simpan di table update_chapter.
	Data komentar, id user (untuk menampilkan nickname orang yang komentar, kita koneksikan dengan table data_user), tanggal komentar dan id manga yang dikomentar, kita simpan di table comment.
	Masalah komentar, kita hanya memperbolehkan satu user yang sudah login untuk komentar dan rating sekali untuk satu manga sedangkan yang belum login tidak bisa komentar dan rating manga tersebut.
	Kita bisa melihat profile orang yang sudah komentar di manga tersebut dengan menclick nickname dari orang yang komentar tersebut.
	
+	Edit Profile
	Di edit profile, kita menampilkan data user yang user inginkan dimana mempasing data menggunakan link.
	Untuk menampilkan data username, nickname, password, birthday, profile text, manga preference dan foto profile user, kita menggunakan database dimana nama username sama dengan data yang sudah dilempar dari link.
	Apabila user lain melihat profile user lainnya, user tersebut hanya bisa melihat saja. Akan tetapi saat user melihat profile usernya sendiri, user tersebut bisa mengganti nilai-nilai dari profile tersebut.
	
+	Add Manga
	Page add manga hanya bisa diakses oleh Admin. Di sini kita bisa menambahkan manga dengan mengisi form yang sudah disediakan.
	Kita harus mengisi semua input supaya bisa submit. Di sini kita diminta mengisi nama manga, penulis manga, sipnosis, cover, tanggal released dan genre manga.
	
+	Add Chapter
	Page add chapter hanya bisa diakses oleh Admin. Di sini kita bisa menambahkan chapter dari suatu manga yang sudah ditambahkan.
	Kita harus memilih nama manga (select option dari database), volume, chapter, judul chapter dan link untuk membaca manga tersebut.
	
+	Search
	Search bisa diakses melalui search bar yang ada di navigasi dimana kalau kita mengetik, akan ada autocomplete nama manga yang sudah ada di database(kita menggunakan ajax utnuk mendapatkan option untuk autocomplete).
	Apabila kita mengetik 1-2 huruf hanya akan ditampilkan nama manga yang depannya huruf tersebut, tetapi kalau sudah 3 atau lebih huruf akan ditampilkan nama mengandung kata tersebut mau di bagian depan nama, tengah maupun belakang.
	Di sini kita juga menerapkan pagination kalau manga yang ditampilkan harusnya lebih dari 10.
	Di page ini, kita menampilkan cover, nama, genre, rating dan sipnosis manga dari hasil pencarian.
	
+	Login/Sign Up
	Login dan sign up kita masukkan ke dalam satu page. Di login, kita pertama validasi kosong atau tidak inputnya apabila kosong dia tidak boleh lanjut. Sesudah itu, kita validasi yang kedua menggunakan php dengan mengecek apabila username dan password ada di database. Apabila kedua-duanya sesuai dengan yang ada di database
	kita akan berhasil masuk, tetapi kalau tidak kita akan kembali ke page login dan diberitahu bahwa username/password tidak ada (kita menggunakan cookie untuk mengecek apabila sudah login dan gagal).
	Di sign up kita diharuskan untuk mengisi username, password, nickname dan tanggal ulang tahun, kalau tidak tidak boleh masuk. Kita menggunakan ajax untuk mengecek apabila username sudah terpakai oleh orang lain dan akan ada peringatannya.
	Apabila kita tetap menggunakan username yang dilarang, saat kita submit, kita akan dikembalikan ke page login dengan ada peringatan lagi (kita menggunakan cookie juga di sini). Dan kalau profile picture kita tidak isi, foto akan diisi dengan foto default.
	Untuk menyimpan bahwa kita login atau tidak, kita menggunakan session untuk menyimpan data bahwa kita sudah login atau belum.