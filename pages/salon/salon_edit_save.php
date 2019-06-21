<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    	$id_salon = trim($_POST['id_salon']);
        $id_salonhid = trim($_POST['id_salonhid']);
		$nama = trim($_POST['nama']);
        $namahid = trim($_POST['namahid']);  
        $harga_pokok = trim($_POST['hargapokok']);
        $harga_jual = trim($_POST['hargajual']); 
        $diskon = trim($_POST['diskon']); 
        $ppn = trim($_POST['ppn']); 
		 #cek id_salonsurat
        //$sqlcek = "SELECT * FROM t_salon WHERE (id_salon='$id_salon' AND id_salon<>'$id_salonhid') OR (nama='$nama' AND nama<>'$namahid')";
        $sqlcek = "SELECT * FROM t_salon WHERE id_salon='$id_salon' AND id_salon<>'$id_salonhid'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);
        if ($row){
            echo 'y';
        }else{
		        $sqltbemp = "UPDATE t_salon SET id_salon='$id_salon',nama='$nama',harga_pokok='$harga_pokok',harga_jual='$harga_jual',diskon='$diskon', ppn='$ppn' WHERE id_salon='$id_salon'";
        		mysql_query($sqltbemp);
           // echo 'n';
        }
?>