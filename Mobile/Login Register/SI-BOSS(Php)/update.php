<!-- SELECT * FROM user AS u INNER JOIN profile AS i ON u.id = i.id_profile; -->

<?php

include"connection.php";
$nama_user=$_GET['nama_user'];
$nik_user=$_GET['nik_user'];

$qry="update info set nik_user='$nik_user' where nama_user='nama_user'";
mysqli_query($connection.$qry);

?>