<?php
$host ='remotemysql.com:3306';
$user ='fwohgrH6rz';
$pas ='kSJwUt7vuJ';
$database='fwohgrH6rz';

$koneksi = mysqli_connect($host,$user,$pas,$database);

if (!$koneksi)
{
	echo "koneksi ke MYSQL gagal....";
}
?>