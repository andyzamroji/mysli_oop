<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'sekolah';

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_errno){
  echo "Gagal konek ke mysql" . $mysqli->connect_error;
}
//#insert biasa
 // $sql = "INSERT INTO murid (nama, alamat) VALUES ('siti','nganjuk');";
 // $sql .= "INSERT INTO murid (nama, alamat) VALUES ('is','jombang')";
//$mysqli->query($sql) >>>> single query
// $mysqli->multi_query($sql); //>>>> multi query
//#cek jika query berhasil
// if( $mysqli->query($sql) === TRUE ) {
//   echo " Berhasil ";
// }else {
//    echo "Gagal " . $mysqli->error;
//  }

//Escape Injection
//$nama = $mysqli->real_escape_string($_GET['user']);

//#prepare statement
// $statement = $mysqli->prepare('INSERT INTO murid (nama, alamat) VALUES (?,?)');
// $statement->bind_param('ss', $nama, $alamat);

//#mengisi data ke parameter dan mengeksekusi
// $nama = 'sujai';
// $alamat = 'krian';
// $statement->execute();
//
// $nama = 'sorjadi';
// $alamat = 'anginan';
// $statement->execute();

// $query = "SELECT * FROM murid";
// $result = $mysqli->query($query);
//
// if ( $result->num_rows > 0 ) {
//   while ($a = $result->fetch_object()) {
//     echo $a->nama . ' ' . $a->alamat . '<br>';
//   }
//   }else {
//     echo "Data tidak ditemukan";
// }

//#Query Edit
//$query = "UPDATE murid SET nama = 'andy' WHERE nama='roji' ";

//#QUery Delete
// $query = "DELETE FROM murid WHERE id = '3' ";
//
// if ( $mysqli->query($query) == TRUE ) {
//   echo "Data berhasil di hapus";
// } else {
//   echo "gagal hapus data";
// }


$nama_param = 'siti';
$murid = $mysqli->prepare("SELECT nama, alamat FROM murid WHERE nama=?");
$murid->bind_param('s', $nama_param);
$murid->execute();

$murid->bind_result($nama, $alamat);


while ($murid->fetch()) {
  echo $nama . ' - ' . $alamat . '<br>';
}

$mysqli->close();


 ?>
