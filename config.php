<?php 
			$koneksi = mysqli_connect("remotemysql.com:3306","fwohgrH6rz","kSJwUt7vuJ","fwohgrH6rz");
			function query($query) {
		global $koneksi;
		$hasil = mysqli_query($koneksi, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($hasil)) {
			$rows[] = $row;
		return $rows;

		}
			    
			}
?>