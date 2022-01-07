# Skripsi

RANCANG BANGUN SISTEM PAKAR IDENTIFIKASI PENYAKIT TANAMAN JAMBU AIR DENGAN IMPLEMENTASI METODE CERTAINTY FACTOR BERBASIS WEBSITE

## Berikut Tampilan Sistem Pakar

![image](https://user-images.githubusercontent.com/97314141/148609372-d015cbd7-7b79-42da-93b8-29a49e29e761.png)
![image](https://user-images.githubusercontent.com/97314141/148609409-b25f7e2c-7f8e-42e9-ac0d-7124c13f58a9.png)
![image](https://user-images.githubusercontent.com/97314141/148609419-abcda673-12c5-462f-9e45-6ab997a7c644.png)
![image](https://user-images.githubusercontent.com/97314141/148609440-aedd1471-842d-4afd-973a-92814f9e6f6c.png)
![image](https://user-images.githubusercontent.com/97314141/148609451-72198853-f144-4dae-b4f7-1973ac09e69c.png)
![image](https://user-images.githubusercontent.com/97314141/148609463-6ef21fea-a371-488c-8d7a-b085019a97cb.png)
![image](https://user-images.githubusercontent.com/97314141/148609485-8b1ea4f1-4c1c-46ab-8d3f-f07a4b98f833.png)

## Configure

Gunakan XAMPP versi PHP 3.2.2(*) & phpMyAdmin 5.6.20 : setting nama database anda di file config.php

```terminal
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_spcf";

mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Maaf, Database tidak bisa dibuka");
?>
```
## Data Yang Digunakan

Berikut ini adalah data-data yang digunakan dalam pembuatan sistem pakar indentifikasi penyakit tanaman jambu air

### Data Hama dan Penyakit
|No.|	Kode|	Hama dan Penyakit|
|---|-----|------------------|
|1|	P001|	Lalat Buah|
|2|	P002| Ulat Kupu-Kupu Gajah|
|3|	P003|	Ulat Pagoda|
|4|	P004|	Tungau|
|5|	P005|	Benalu|
|6|	P006|	Kutu Putih|
|7|	P007|	Penggerek Batang|
|8|	P008|	Kelelawar| 
|9|	P009|	Antraknosa|

### Data Gejala
|No.|	Kode|	Gejala|
|---|-----|-------|
|1|	G001|	Buah menjadi busuk dan lunak|
|2|	G002|	Buah sering berguguran|
|3|	G003|	Daun terlihat ada seperti serbuk putih|
|4|	G004|	Daun terlihat berlubang-lubang dan keriting|
|5|	G005|	Permukaan daun berubah menjadi warna kuning|
|6|	G006|	Rasa buah tidak manis|
|7|	G007|	Daun menggulung|
|8|	G008|	Daun menjadi rusak karena digerogoti|
|9|	G009|	Buah menjadi kecoklatan|
|10|	G010|	Daun sering berguguran|
|11|	G011|	Pada biji buah terdapat bintik-bintik berwarna kehitaman|
|12|	G012|	Kulit buah terlihat terkelupas|
|13|	G013|	Pada dahan terlihat berlubang|
|14|	G014|	Pada daun terdapat kutil-kutil menggembung|
|15|	G015|	Pertumbuhan tanaman terhambat|
|16|	G016|	Buah mengering|
|17|	G017|	Batang berlubang|
|18|	G018|	Daun mengering|
|19|	G019|	Tanaman menjadi layu|
|20|	G020|	Kulit luar buah terdapat lubang kecil sehingga kulit buah tidak mulus|  
|21|	G021|	Pada permukaan daun terdapat benang-benang halus seperti sarang laba-laba|
|22|	G022|	Pada batang terdapat benang-benang halus seperti sarang laba-laba|
|23|	G023|	Batang terlihat mengeluarkan getah|
|24|	G024|	Daun memiliki bercak berwarna hitam pada daun-daun tua|
|25|	G025|	Kulit batang terlihat terkelupas|
|26|	G026|	Pucuk daun menjadi kecil dan keriput|
|27|	G027|	Buah menjadi kerdil|
|28|	G028|	Tunas mengering dan mati|
|29|	G029|	Pada batang terlihat ada seperti serbuk putih|
|30|	G030|	Daun mengkerut|
|31|	G031|	Tanaman mulai gundul|
|32|	G032|	Daun tidak lagi berwarna hijau dan buram|

### Data Solusi Penanganan Penyakit
|No.|	Hama dan Penyakit|	Solusi|
|---|------------------|--------|
|1|	Lalat Buah|	•	Membungkus buah yang masih ada di pohon dengan plastik sewaktu masih pecah bunga.| 
|||•	Melakukan penyemprotan pestisida seperti Petrogenol, Alika.|
|||•	Membuat perangkap dari botol bekas untuk memancing dan menangkap lalat buah masuk yang berisi cairan Metil Eugenol.| 
|||•	Memasang perangkap menggunakan lem.|
|2|	Ulat Kupu-Kupu Gajah|	•	Mengumpulkan telur, kepompong, dan ulat kupu-kupu gajah menjadi satu, lalu dibuang dan dibakar.|
|||•	Bisa melakukan penyemprotan menggunakan pestisida namun hal ini tidak disarankan.|
|3|	Ulat Pagoda|	•	Melakukan penyemprotan insektisida pada daun muda seperti Decis, Agrimec, dan Alfamex. |
|||•	Membersihkan tanaman dari rumput-rumput liar dan gulma serta melakukan penyiangan.|
|4|	Tungau|	•	Melakukan penyemprotan Akarisida yang berbahan aktif dengan menambahkan pupuk daun seperti, Karbosulfan, Dikofol dan Permetrin. |
|||•	Melakukan penyemprotan insektisida nabati seperti bawang putih dicampurkan dengan deterjen.
|5|	Benalu|	•	Membersihkan tanaman dari rumput-rumput liar dan gulma serta melakukan penyiangan.|
|||•	Melakukan sanitasi lahan dan membersihkan tanaman jambu air dari tanaman pengganggu atau cendawan liar.|
|6|	Kutu Putih|	•	Membersihkan tanaman dari rumput-rumput liar dan gulma serta melakukan penyiangan. |
|||•	Pengendalian biologi menggunakan musuh alami (parasitoid: Anagyrus lopezi). |
|||•	Pengendalian dengan bahan kimia organik (ekstrak akar ubi kayu; minyak mimba; bawang putih dicampur deterjen). |
|||•	Memotong daun tanaman yang terserang atau terinfeksi, kemudian dibuang dan dibakar.|
|7|	Penggerek Batang|	•	Memotong batang tanaman yang terserang atau terinfeksi, kemudian dibuang dan dibakar.|
|||•	Menempelkan kapas yang telah direndam menggunakan pestisida, kemudian disumbatkan pada bagian yang berlubang.|
|||•	Menaburkan insektisida berbahan aktif karbofuran (furadan, kresnadan dll) disekitar perakaran dengan dosis 0,5 kg/ pohon, jika tanaman sudah 5 tahun atau lebih.|
|||•	Mengebor batang sedalam 10 mm dengan kemiringan 45 derajat, lalu masukkan larutan insektisida kedalam lubang tersebut. Setelah selesai tutup kembali lubang dengan parafin atau lilin.|
|8|	Kelelawar|	•	Membungkus buah yang masih ada di pohon dengan plastik sewaktu masih pecah bunga.| 
|9|	Antraknosa|	•	Memotong bagian tanaman yang terserang atau terinfeksi, kemudian dibuang dan dibakar.|
|||•	Melakukan penyemprotan fungisida seperti Dhitan M45 atau Vigran Blue.|
