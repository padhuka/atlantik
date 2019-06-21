<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    	$id_cuci = trim($_POST['id_cuci']);
        $id_cucihid = trim($_POST['id_cucihid']);
		$nama = trim($_POST['nama']);
        $namahid = trim($_POST['namahid']);  
        $harga_pokok = trim($_POST['hargapokok']);
        $harga_jual = trim($_POST['hargajual']); 
        $diskon = trim($_POST['diskon']); 
        $ppn = trim($_POST['ppn']); 
		 #cek id_cucisurat
        //$sqlcek = "SELECT * FROM t_cuci WHERE (id_cuci='$id_cuci' AND id_cuci<>'$id_cucihid') OR (nama='$nama' AND nama<>'$namahid')";
        $sqlcek = "SELECT * FROM t_cuci WHERE id_cuci='$id_cuci' AND id_cuci<>'$id_cucihid'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);
        if ($row){
            echo 'y';
        }else{
		        $sqltbemp = "UPDATE t_cuci SET id_cuci='$id_cuci',nama='$nama',harga_pokok='$harga_pokok',harga_jual='$harga_jual',diskon='$diskon', ppn='$ppn' WHERE id_cuci='$id_cuci'";
        		mysql_query($sqltbemp);
           // echo 'n';
        }
?>